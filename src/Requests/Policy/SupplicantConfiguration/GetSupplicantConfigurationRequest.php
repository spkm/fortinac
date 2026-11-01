<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantConfiguration;

use spkm\FortiNac\Data\Policy\SupplicantConfiguration;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Supplicant Configuration records matching the supplied filter: GET /policy/supplicant-configuration/{id}.
 */
class GetSupplicantConfigurationRequest extends ItemRequest
{
    protected ?string $dto = SupplicantConfiguration::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/supplicant-configuration/'.$this->id;
    }
}
