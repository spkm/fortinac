<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantConfiguration;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\SupplicantConfiguration;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Supplicant Configuration record: POST /policy/supplicant-configuration/{id}.
 */
class UpdateSupplicantConfigurationRequest extends WriteRequest
{
    protected ?string $dto = SupplicantConfiguration::class;

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
        return '/policy/supplicant-configuration/'.$this->id;
    }
}
