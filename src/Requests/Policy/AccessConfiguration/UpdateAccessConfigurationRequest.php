<?php

namespace spkm\FortiNac\Requests\Policy\AccessConfiguration;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\AccessConfiguration;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Access Configuration record: POST /policy/access-configuration/{id}.
 */
class UpdateAccessConfigurationRequest extends WriteRequest
{
    protected ?string $dto = AccessConfiguration::class;

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
        return '/policy/access-configuration/'.$this->id;
    }
}
