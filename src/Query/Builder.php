<?php

namespace spkm\FortiNac\Query;

use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use InvalidArgumentException;
use LogicException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Exceptions\NotFoundException;
use spkm\FortiNac\FortiNacApiException;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\FortiNacPaginator;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Resources\BaseResource;
use spkm\FortiNac\Support\Payload;

/**
 * An Eloquent-style query over one FortiNAC collection. Each resource extends it, saying which requests list,
 * count, fetch, create, update and delete its records; the builder turns where(), orderBy() and the rest into
 * FortiNAC's filter, sortKey, sortDir, start and count parameters and the response into models.
 *
 * @template TData of Data
 *
 * @extends BaseResource<TData>
 */
abstract class Builder extends BaseResource
{
    protected Query $query;

    /**
     * @param  class-string<TData>|null  $dataClass  The model records are returned as; null for arrays.
     */
    public function __construct(FortiNacConnector $connector, ?string $dataClass)
    {
        parent::__construct($connector, $dataClass);

        $this->query = Query::make();
    }

    abstract protected function listRequest(Query $query): ListRequest;

    /**
     * The request that counts the matching records, when the collection has one.
     */
    protected function countRequest(Query $query): ?FortiNacRequest
    {
        return null;
    }

    protected function itemRequest(int|string $id): ?FortiNacRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $body
     * @param  array<string, mixed>  $options
     */
    protected function createRequest(array $body, array $options): ?FortiNacRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $body
     * @param  array<string, mixed>  $options
     */
    protected function updateRequest(int|string $id, array $body, array $options): ?FortiNacRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $options
     */
    protected function deleteRequest(int|string $id, array $options): ?FortiNacRequest
    {
        return null;
    }

    /**
     * A condition on a field: where('status', 0), where('creationTime', '>', now()), where('role', '!=', 'Guest').
     * Conditions are ANDed (each goes in its own filter parameter); FortiNAC matches a value as a whole, ignoring
     * case, and compares a date as a Unix timestamp in milliseconds. Only a record's own top-level fields filter;
     * a nested one such as ips.ip is ignored by FortiNAC.
     */
    public function where(string $field, mixed $operator = null, mixed $value = null): static
    {
        if (func_num_args() === 2 && ! $operator instanceof Operator) {
            [$operator, $value] = [Operator::Equal, $operator];
        }

        $this->query = $this->query->where($field, $operator ?? Operator::Equal, $value);

        return $this;
    }

    /**
     * Everything so far, OR this: a condition (orWhere('role', 'Staff')) or a group (orWhere(fn ($query) => ...)).
     * FortiNAC lists alternatives in one filter parameter and cannot nest an AND inside them, so every condition
     * on either side becomes an alternative.
     */
    public function orWhere(Closure|string $field, mixed $operator = null, mixed $value = null): static
    {
        if ($field instanceof Closure) {
            $this->query = $this->query->withFilter($this->query->filter()->or($this->group($field)));

            return $this;
        }

        $alternative = $this->fresh();
        func_num_args() === 2 ? $alternative->where($field, $operator) : $alternative->where($field, $operator, $value);
        $this->query = $this->query->withFilter($this->query->filter()->or($alternative->toFilter()));

        return $this;
    }

    public function whereNot(string $field, mixed $value): static
    {
        return $this->where($field, Operator::NotEqual, $value);
    }

    /**
     * Any of the values: an OR of a condition for each.
     *
     * @param  iterable<mixed>  $values
     */
    public function whereIn(string $field, iterable $values): static
    {
        $alternatives = [];

        foreach ($values as $value) {
            $alternatives[] = $this->fresh()->where($field, $value)->toFilter();
        }

        if ($alternatives === []) {
            throw new InvalidArgumentException('A whereIn condition needs at least one value.');
        }

        $this->query = $this->query->withFilter($this->query->filter()->and(Filter::make()->or(...$alternatives)));

        return $this;
    }

    /**
     * @param  array{mixed, mixed}  $range
     */
    public function whereBetween(string $field, array $range): static
    {
        [$from, $to] = $range;

        return $this->where($field, Operator::GreaterOrEqual, $from)->where($field, Operator::LessOrEqual, $to);
    }

    /**
     * The value has the given text somewhere in it, ignoring case: FortiNAC's =@ takes a pattern with * wildcards,
     * so the text is wrapped in them. For a pattern of your own, use where($field, '=@', 'LAB-*').
     */
    public function whereContains(string $field, string $value): static
    {
        return $this->where($field, Operator::Contains, '*'.$value.'*');
    }

    public function whereNotContains(string $field, string $value): static
    {
        return $this->where($field, Operator::NotContains, '*'.$value.'*');
    }

    public function orderBy(string $field, string $direction = 'asc'): static
    {
        $this->query = $this->query->orderBy($field, $direction);

        return $this;
    }

    public function orderByDesc(string $field): static
    {
        return $this->orderBy($field, 'desc');
    }

    /**
     * The position of the first record to return, counting from 0.
     */
    public function offset(int $offset): static
    {
        $this->query = $this->query->start($offset);

        return $this;
    }

    /**
     * How many records to return; FortiNAC returns them all when not told.
     */
    public function limit(int $limit): static
    {
        $this->query = $this->query->count($limit);

        return $this;
    }

    public function forPage(int $page, int $perPage): static
    {
        return $this->offset(($page - 1) * $perPage)->limit($perPage);
    }

    /**
     * The matching records: as many as limit() asked for, or all of them.
     *
     * @return Collection<int, TData>
     */
    public function get(): Collection
    {
        /** @var Collection<int, TData> */
        return Payload::items($this->send($this->query), $this->dataClass);
    }

    /**
     * Every matching record, fetched a page at a time.
     *
     * @return Collection<int, TData>
     */
    public function all(?int $perPage = null): Collection
    {
        return $this->lazy($perPage)->collect();
    }

    /**
     * The first matching record in sort order.
     *
     * @return TData|null
     */
    public function first(): mixed
    {
        return Payload::object($this->send($this->query->count(1)), $this->dataClass);
    }

    /**
     * How many records match: from the collection's count endpoint. A collection without one gives the total of a
     * list of one when nothing is filtered, and otherwise the length of the whole filtered list, since FortiNAC's
     * total takes no account of the filter.
     */
    public function count(): int
    {
        $request = $this->countRequest($this->query->withoutPaging());

        if ($request === null) {
            if ($this->query->filter()->isEmpty()) {
                return Payload::count($this->send($this->query->count(1)));
            }

            return count(Payload::records($this->send($this->query->withoutPaging())));
        }

        $response = $this->connector->send($request);

        if (! $response->successful() || ! Payload::succeeded($response)) {
            throw FortiNacApiException::fromResponse($response);
        }

        $value = Payload::scalar($response);

        return is_numeric($value) ? (int) $value : Payload::count($response);
    }

    public function exists(): bool
    {
        return $this->count() > 0;
    }

    /**
     * The record with the given id, or null when FortiNAC has none.
     *
     * @return TData|null
     */
    public function find(int|string $id): mixed
    {
        $request = $this->itemRequest($id);

        if ($request === null) {
            return $this->fresh()->where('id', $id)->first();
        }

        return $this->fetchOrNull($request);
    }

    /**
     * @return TData
     */
    public function findOrFail(int|string $id): mixed
    {
        $request = $this->itemRequest($id);

        if ($request === null) {
            $record = $this->find($id);

            if ($record === null) {
                throw new NotFoundException($this->send($this->fresh()->where('id', $id)->toQuery()->count(1)));
            }

            return $record;
        }

        $record = $this->fetch($request);

        if ($record === null) {
            throw new NotFoundException($this->connector->send($request));
        }

        return $record;
    }

    /**
     * Every matching record, fetched a page at a time as the loop reaches it.
     *
     * @return LazyCollection<int, TData>
     */
    public function lazy(?int $perPage = null): LazyCollection
    {
        $paginator = $this->paginate($perPage);
        $dataClass = $this->dataClass;

        return LazyCollection::make(function () use ($paginator, $dataClass) {
            try {
                foreach ($dataClass === null ? $paginator->collect() : $paginator->models($dataClass) as $item) {
                    yield $item;
                }
            } catch (RequestException $exception) {
                throw $exception instanceof FortiNacApiException ? $exception : FortiNacApiException::fromResponse($exception->getResponse());
            }
        });
    }

    /**
     * @return LazyCollection<int, TData>
     */
    public function cursor(?int $perPage = null): LazyCollection
    {
        return $this->lazy($perPage);
    }

    /**
     * A paginator over the matching records, for fetching pages one at a time yourself.
     */
    public function paginate(?int $perPage = null): FortiNacPaginator
    {
        return $this->connector->paginate($this->listRequest($this->query->withoutPaging()), $perPage);
    }

    /**
     * Create a record. FortiNAC answers with the record it stored, or with nothing.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options the operation documents.
     * @return TData|null
     */
    public function create(array|Data $attributes, array $options = []): mixed
    {
        return $this->fetch($this->createRequest($this->payloadOf($attributes), $options) ?? $this->undocumented('create'));
    }

    /**
     * Change a record. FortiNAC answers with the record as updated, or with nothing.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     * @return TData|null
     */
    public function update(int|string $id, array|Data $attributes, array $options = []): mixed
    {
        return $this->fetch($this->updateRequest($id, $this->payloadOf($attributes), $options) ?? $this->undocumented('update'));
    }

    /**
     * @param  array<string, mixed>  $options
     */
    public function delete(int|string $id, array $options = []): bool
    {
        $this->fetch($this->deleteRequest($id, $options) ?? $this->undocumented('delete'));

        return true;
    }

    /**
     * The request get() would send, for sending through the connector yourself.
     */
    public function toRequest(): ListRequest
    {
        return $this->listRequest($this->query);
    }

    public function toQuery(): Query
    {
        return $this->query;
    }

    public function toFilter(): Filter
    {
        return $this->query->filter();
    }

    /**
     * The query parameters get() would send.
     *
     * @return array<string, string|int>
     */
    public function toArray(): array
    {
        return $this->query->toArray();
    }

    protected function send(Query $query): Response
    {
        $response = $this->connector->send($this->listRequest($query));

        if (! $response->successful() || ! Payload::succeeded($response)) {
            throw FortiNacApiException::fromResponse($response);
        }

        return $response;
    }

    /**
     * A copy of this builder with no conditions, for building a group or an alternative.
     */
    protected function fresh(): static
    {
        $fresh = clone $this;
        $fresh->query = Query::make();

        return $fresh;
    }

    private function group(Closure $callback): Filter
    {
        $group = $this->fresh();
        $callback($group);

        return $group->toFilter();
    }

    private function undocumented(string $action): never
    {
        throw new LogicException("FortiNAC's API documents no way to $action these records.");
    }
}
