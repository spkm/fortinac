<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use spkm\FortiNac\Data\Settings\AaaServer;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new AAA Server record to the database: POST /settings/integration/aaa.
 */
class CreateAaaServerRequest extends WriteRequest
{
    protected ?string $dto = AaaServer::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa';
    }
}
