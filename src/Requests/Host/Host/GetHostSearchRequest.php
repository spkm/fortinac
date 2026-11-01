<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns all Host Records which match the supplied filter, searching Hosts, Users, and Adapters: GET /host/search.
 *
 * Parameters: filter, start, count, sortKey, sortDir.
 */
class GetHostSearchRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: filter, start, count, sortKey, sortDir
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/host/search';
    }
}
