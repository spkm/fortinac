<?php

namespace spkm\FortiNac\Requests\Host\Fingerprint;

use JsonSerializable;
use spkm\FortiNac\Data\Host\Fingerprint;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Fingerprint record: POST /host/fingerprint/{id}.
 */
class UpdateFingerprintRequest extends WriteRequest
{
    protected ?string $dto = Fingerprint::class;

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
        return '/host/fingerprint/'.$this->id;
    }
}
