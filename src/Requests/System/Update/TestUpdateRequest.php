<?php

namespace spkm\FortiNac\Requests\System\Update;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Tests the current System Update settings for auto-definition updates, product distribution, and agent distribution: POST /system/update/test.
 *
 * Parameters: testHost, testAutoDefDir, testProductDistDir, testAgentDistDir, testUser, testPassword, decodePW, protocol.
 */
class TestUpdateRequest extends ActionRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/system/update/test';
    }
}
