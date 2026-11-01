<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Data\Host\HostHealthHistory;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the health history of the Host Record with the supplied DBID: GET /host/{id}/health-history.
 */
class GetHostHealthHistoryRequest extends ItemRequest
{
    protected ?string $dto = HostHealthHistory::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/host/'.$this->id.'/health-history';
    }
}
