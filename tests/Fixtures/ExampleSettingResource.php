<?php

namespace spkm\FortiNac\Tests\Fixtures;

use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * @extends SingletonResource<ExampleData>
 */
class ExampleSettingResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, ExampleData::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new ExampleSettingRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new ExampleSettingUpdateRequest($body, $options);
    }
}
