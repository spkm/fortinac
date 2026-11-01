<?php

namespace spkm\FortiNac\Requests;

use spkm\FortiNac\Query\Query;

/**
 * A count request for a collection the package has no request for, as FortiNac::from('/path')->count(), sent to
 * /path/count.
 */
class AdhocCountRequest extends CountRequest
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
        return '/'.trim($this->path, '/').'/count';
    }
}
