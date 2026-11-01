<?php

namespace spkm\FortiNac\Requests;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\FortiNac\Query\Query;

/**
 * A GET for the records of a collection, filtered, sorted and paged by a Query. FortiNAC answers every matching
 * record unless the query says how many; FortiNacPaginator pages through them.
 */
abstract class ListRequest extends FortiNacRequest implements Paginatable
{
    protected Method $method = Method::GET;

    protected string $responseShape = self::LIST;

    protected bool $cacheable = true;

    /** @var Query|array<string, mixed> */
    protected Query|array $parameters;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        $this->parameters = $query;
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->parameters instanceof Query ? $this->parameters->toArray() : $this->parameters;
    }
}
