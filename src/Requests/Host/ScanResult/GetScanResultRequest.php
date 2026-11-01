<?php

namespace spkm\FortiNac\Requests\Host\ScanResult;

use spkm\FortiNac\Data\Host\ScanResult;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Return the Scan Result record that matches the supplied DBID: GET /host/scan/{id}.
 */
class GetScanResultRequest extends ItemRequest
{
    protected ?string $dto = ScanResult::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/host/scan/'.$this->id;
    }
}
