<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Supplicant Configuration records that reference this recrod: GET /policy/supplicant-configuration/{id}/usage.
 */
class GetSupplicantConfigurationUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/supplicant-configuration/'.$this->id.'/usage';
    }
}
