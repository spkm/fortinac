<?php

namespace spkm\FortiNac\Resources\System;

use spkm\FortiNac\Data\System\HighAvailability;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\System\HighAvailability\GetHighAvailabilityPasswordByPwkeyRequest;
use spkm\FortiNac\Requests\System\HighAvailability\GetHighAvailabilityRequest;
use spkm\FortiNac\Requests\System\HighAvailability\UpdateHighAvailabilityRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * High Availability, from FortiNac::system()->highAvailability().
 *
 * @extends SingletonResource<HighAvailability>
 */
class HighAvailabilityResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, HighAvailability::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetHighAvailabilityRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateHighAvailabilityRequest($body, $options);
    }

    /**
     * Returns the currently configured high availability password: GET /system/high-availability/password/{pwkey}.
     */
    public function passwordByPwkey(string $pwkey): mixed
    {
        return $this->fetch(new GetHighAvailabilityPasswordByPwkeyRequest($pwkey));
    }
}
