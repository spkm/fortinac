<?php

namespace spkm\FortiNac;

use Illuminate\Support\LazyCollection;
use JsonException;
use LogicException;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Exceptions\ServerErrorException;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Support\Payload;

/**
 * Pages through a list with FortiNAC's start and count parameters, stopping at an empty or short page or once the
 * records fetched reach the total FortiNAC gave.
 */
class FortiNacPaginator extends Paginator
{
    protected ?int $perPageLimit = 100;

    protected ?string $lastPageFingerprint = null;

    protected ?Response $lastResponse = null;

    /** @var list<array<string, mixed>> */
    protected array $lastItems = [];

    public function __construct(Connector $connector, Request $request, ?int $perPage = null)
    {
        parent::__construct($connector, $request);

        if ($perPage !== null) {
            $this->perPageLimit = $perPage;
        }
    }

    /**
     * Every item on every page, as the request's models.
     *
     * @return LazyCollection<int, Data>
     */
    public function dtos(): LazyCollection
    {
        $request = $this->getOriginalRequest();
        $dto = $request instanceof FortiNacRequest ? $request->dtoClass() : null;

        if ($dto === null) {
            throw new LogicException(class_basename($request).' has no model; use collect() for its items as arrays.');
        }

        return $this->models($dto);
    }

    /**
     * Every item on every page as the given model.
     *
     * @template TModel of Data
     *
     * @param  class-string<TModel>  $model
     * @return LazyCollection<int, TModel>
     */
    public function models(string $model): LazyCollection
    {
        return $this->collect()->map(fn (array $item) => $model::from($item));
    }

    protected function applyPagination(Request $request): Request
    {
        if ($this->perPageLimit !== null) {
            $request->query()->add('count', $this->perPageLimit);
        }

        $request->query()->add('start', ($this->page - 1) * ($this->perPageLimit ?? 0));

        return $request;
    }

    protected function isLastPage(Response $response): bool
    {
        $items = $this->getPageItems($response, $response->getRequest());

        if ($items === [] || ($this->perPageLimit !== null && count($items) < $this->perPageLimit)) {
            return true;
        }

        try {
            $total = Payload::total($response);
        } catch (JsonException) {
            return true;
        }

        return $total !== null && $this->totalResults >= $total;
    }

    protected function onRewind(): void
    {
        $this->lastPageFingerprint = null;
        $this->lastResponse = null;
        $this->lastItems = [];
    }

    /**
     * @return list<array<string, mixed>>
     */
    protected function getPageItems(Response $response, Request $request): array
    {
        try {
            if (! Payload::succeeded($response)) {
                throw FortiNacApiException::fromResponse($response);
            }

            if ($response === $this->lastResponse) {
                return $this->lastItems;
            }

            $items = Payload::records($response);

            // An endpoint that ignores start would answer the same page forever: a repeated page is the end.
            $fingerprint = sha1((string) json_encode($items));
            $this->lastResponse = $response;
            $this->lastItems = $fingerprint === $this->lastPageFingerprint ? [] : $items;
            $this->lastPageFingerprint = $fingerprint;

            return $this->lastItems;
        } catch (JsonException) {
            throw new ServerErrorException($response);
        }
    }

    /**
     * How many pages there are, from the total FortiNAC gives with each page.
     */
    protected function getTotalPages(Response $response): int
    {
        try {
            $count = Payload::count($response);
        } catch (JsonException) {
            throw new ServerErrorException($response);
        }

        return $this->perPageLimit === null ? 1 : (int) ceil($count / $this->perPageLimit);
    }
}
