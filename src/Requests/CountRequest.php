<?php

namespace spkm\FortiNac\Requests;

use Saloon\Enums\Method;
use spkm\FortiNac\Query\Query;

/**
 * A GET for how many records a collection has, or how many match a Query's filter. FortiNAC answers with the one
 * number.
 */
abstract class CountRequest extends FortiNacRequest
{
    protected Method $method = Method::GET;

    protected string $responseShape = self::SCALAR;

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
        $parameters = $this->parameters instanceof Query ? $this->parameters->withoutPaging()->toArray() : $this->parameters;
        unset($parameters['sortKey'], $parameters['sortDir'], $parameters['start'], $parameters['count']);

        return $parameters;
    }
}
