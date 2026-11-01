<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use spkm\FortiNac\Data\Settings\AaaServer;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all AAA Server records which match the supplied filter: GET /settings/integration/aaa.
 */
class GetAaaServersRequest extends ListRequest
{
    protected ?string $dto = AaaServer::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa';
    }
}
