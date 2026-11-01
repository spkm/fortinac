<?php

namespace spkm\FortiNac\Query;

use InvalidArgumentException;
use spkm\FortiNac\Support\QueryString;
use Stringable;

/**
 * The query string of a list request, built up immutably: filter (one parameter per ANDed clause), sortKey and
 * sortDir, start (the first record's position) and count (how many records). FortiNAC returns every record when
 * not told otherwise.
 */
final class Query implements Stringable
{
    private Filter $filter;

    private ?string $sortKey = null;

    private ?string $sortDir = null;

    private ?int $start = null;

    private ?int $count = null;

    public function __construct(?Filter $filter = null, string $dateFormat = 'Uv')
    {
        $this->filter = $filter ?? Filter::make($dateFormat);
    }

    public static function make(string $dateFormat = 'Uv'): self
    {
        return new self(null, $dateFormat);
    }

    public function filter(): Filter
    {
        return $this->filter;
    }

    public function withFilter(Filter $filter): self
    {
        $query = clone $this;
        $query->filter = $filter;

        return $query;
    }

    /**
     * A condition on a field, ANDed with the ones before it.
     */
    public function where(string $field, Operator|string $operator, mixed $value = null): self
    {
        return $this->withFilter($this->filter->where($field, $operator, $value));
    }

    public function orderBy(string $field, string $direction = 'asc'): self
    {
        $direction = strtolower($direction);

        if (! in_array($direction, ['asc', 'desc'], true)) {
            throw new InvalidArgumentException('Sort direction must be "asc" or "desc", not "'.$direction.'".');
        }

        $query = clone $this;
        $query->sortKey = $field;
        $query->sortDir = strtoupper($direction);

        return $query;
    }

    public function start(?int $start): self
    {
        if ($start !== null && $start < 0) {
            throw new InvalidArgumentException('The start cannot be negative.');
        }

        $query = clone $this;
        $query->start = $start;

        return $query;
    }

    public function count(?int $count): self
    {
        if ($count !== null && $count < 1) {
            throw new InvalidArgumentException('The count must be at least 1.');
        }

        $query = clone $this;
        $query->count = $count;

        return $query;
    }

    /**
     * The query without its paging, for a paginator to page itself.
     */
    public function withoutPaging(): self
    {
        return $this->start(null)->count(null);
    }

    public function getSortKey(): ?string
    {
        return $this->sortKey;
    }

    public function getSortDir(): ?string
    {
        return $this->sortDir;
    }

    public function getStart(): ?int
    {
        return $this->start;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * The query parameters FortiNAC reads: filter is repeated for each ANDed clause, so it is a list when there
     * are several.
     *
     * @return array<string, string|int|list<string>>
     */
    public function toArray(): array
    {
        $query = [];

        if (! $this->filter->isEmpty()) {
            $clauses = $this->filter->toArray();
            $query['filter'] = count($clauses) === 1 ? $clauses[0] : $clauses;
        }

        if ($this->sortKey !== null) {
            $query['sortKey'] = $this->sortKey;
            $query['sortDir'] = $this->sortDir ?? 'ASC';
        }

        if ($this->start !== null) {
            $query['start'] = $this->start;
        }

        if ($this->count !== null) {
            $query['count'] = $this->count;
        }

        return $query;
    }

    /**
     * The query string as you would read it, unencoded, for logs and debugging.
     */
    public function __toString(): string
    {
        return urldecode(QueryString::encode($this->toArray()));
    }
}
