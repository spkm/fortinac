<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantPolicy;

use spkm\FortiNac\Data\Policy\SupplicantPolicy;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Supplicant Policy record, updating instead if the supplied profile has a DBID of one that already exists: POST /policy/supplicant.
 */
class CreateSupplicantPolicyRequest extends WriteRequest
{
    protected ?string $dto = SupplicantPolicy::class;

    public function resolveEndpoint(): string
    {
        return '/policy/supplicant';
    }
}
