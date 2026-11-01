<?php

namespace spkm\FortiNac\Requests\System\HighAvailability;

use spkm\FortiNac\Requests\ItemRequest;
use spkm\FortiNac\Support\Path;

/**
 * Returns the currently configured high availability password: GET /system/high-availability/password/{pwkey}.
 */
class GetHighAvailabilityPasswordByPwkeyRequest extends ItemRequest
{
    protected bool $cacheable = false;

    protected string $responseShape = self::SCALAR;

    public function __construct(protected string $pwkey) {}

    public function resolveEndpoint(): string
    {
        return '/system/high-availability/password/'.Path::segment($this->pwkey);
    }
}
