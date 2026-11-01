<?php

namespace spkm\FortiNac\Requests\Host\Host;

use JsonSerializable;
use spkm\FortiNac\Data\Host\Host;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Returns the Host Record with the supplied DBID: POST /host/{id}.
 */
class UpdateHostRequest extends WriteRequest
{
    protected ?string $dto = Host::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/host/'.$this->id;
    }
}
