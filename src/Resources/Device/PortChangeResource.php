<?php

namespace spkm\FortiNac\Resources\Device;

use spkm\FortiNac\Data\Device\PortChange;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Device\PortChange\CountAllPortChangesRequest;
use spkm\FortiNac\Requests\Device\PortChange\CountPortChangesRequest;
use spkm\FortiNac\Requests\Device\PortChange\GetPortChangeRequest;
use spkm\FortiNac\Requests\Device\PortChange\GetPortChangesRequest;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Port, from FortiNac::device()->portChanges().
 *
 * @extends Builder<PortChange>
 */
class PortChangeResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, PortChange::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetPortChangesRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountPortChangesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetPortChangeRequest((int) $id);
    }

    /**
     * Returns the count of Port Change records in the database: GET /device/port-changes/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllPortChangesRequest);
    }
}
