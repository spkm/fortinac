<?php

namespace spkm\FortiNac\Resources\System;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\System\LicenseManagement\GetLicenseManagementRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * License Management, from FortiNac::system()->licenseManagement().
 *
 * @extends SingletonResource<Data>
 */
class LicenseManagementResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetLicenseManagementRequest($options);
    }
}
