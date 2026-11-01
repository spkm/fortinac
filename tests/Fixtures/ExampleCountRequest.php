<?php

namespace spkm\FortiNac\Tests\Fixtures;

use spkm\FortiNac\Requests\CountRequest;

class ExampleCountRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/example/count';
    }
}
