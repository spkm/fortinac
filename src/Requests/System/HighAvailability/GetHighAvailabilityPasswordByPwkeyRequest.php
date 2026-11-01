<?php

namespace spkm\FortiNac\Requests\System\HighAvailability;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured high availability password: GET /system/high-availability/password/{pwkey}.
 */
class GetHighAvailabilityPasswordByPwkeyRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function __construct(protected string $pwkey) {}

    public function resolveEndpoint(): string
    {
        return '/system/high-availability/password/'.rawurlencode($this->pwkey);
    }
}
