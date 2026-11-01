<?php

namespace spkm\FortiNac\Requests\Logging\ConnectionLogEntry;

use spkm\FortiNac\Data\Logging\ConnectionLogEntry;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Network Session Event records with the supplied DBID: GET /logging/connection/{id}.
 */
class GetConnectionLogEntryRequest extends ItemRequest
{
    protected ?string $dto = ConnectionLogEntry::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/logging/connection/'.$this->id;
    }
}
