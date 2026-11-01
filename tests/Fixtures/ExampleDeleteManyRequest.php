<?php

namespace spkm\FortiNac\Tests\Fixtures;

use spkm\FortiNac\Requests\WriteRequest;

class ExampleDeleteManyRequest extends WriteRequest
{
    protected string $responseShape = self::NONE;

    public function resolveEndpoint(): string
    {
        return '/example/delete';
    }
}
