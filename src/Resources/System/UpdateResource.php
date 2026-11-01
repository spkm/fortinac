<?php

namespace spkm\FortiNac\Resources\System;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\System\Update\TestUpdateRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Update, from FortiNac::system()->update().
 *
 * @extends BaseResource<Data>
 */
class UpdateResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Tests the current System Update settings for auto-definition updates, product distribution, and agent distribution: POST /system/update/test.
     *
     * @param  array<string, mixed>  $options  Query options: testHost, testAutoDefDir, testProductDistDir, testAgentDistDir, testUser, testPassword, decodePW, protocol
     */
    public function test(array $options = []): mixed
    {
        return $this->fetch(new TestUpdateRequest($options));
    }
}
