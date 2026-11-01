<?php

namespace spkm\FortiNac\Requests;

use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Support\Path;

/**
 * A list request for a collection the package has no request for, as FortiNac::from('/path'); its records are
 * arrays.
 */
class AdhocListRequest extends ListRequest
{
    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $path, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return Path::path($this->path);
    }
}
