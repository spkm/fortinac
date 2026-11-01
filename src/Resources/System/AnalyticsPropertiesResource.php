<?php

namespace spkm\FortiNac\Resources\System;

use spkm\FortiNac\Data\System\AnalyticsProperties;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\System\AnalyticsProperties\GetAnalyticsPropertiesRequest;
use spkm\FortiNac\Requests\System\AnalyticsProperties\UpdateAnalyticsPropertiesRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * Analytics, from FortiNac::system()->analytics().
 *
 * @extends SingletonResource<AnalyticsProperties>
 */
class AnalyticsPropertiesResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, AnalyticsProperties::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetAnalyticsPropertiesRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateAnalyticsPropertiesRequest([...$body, ...$options]);
    }
}
