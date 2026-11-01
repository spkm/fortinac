<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantPolicy;

use spkm\FortiNac\Data\Policy\SupplicantPolicy;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Supplicant Policy records matching the supplied filter: GET /policy/supplicant.
 */
class GetSupplicantPoliciesRequest extends ListRequest
{
    protected ?string $dto = SupplicantPolicy::class;

    public function resolveEndpoint(): string
    {
        return '/policy/supplicant';
    }
}
