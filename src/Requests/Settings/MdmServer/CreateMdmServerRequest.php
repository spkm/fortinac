<?php

namespace spkm\FortiNac\Requests\Settings\MdmServer;

use spkm\FortiNac\Data\Settings\MdmServer;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new MDM record, updating instead if the supplied profile has a DBID of one that already exists: POST /settings/integration/mdm.
 */
class CreateMdmServerRequest extends WriteRequest
{
    protected ?string $dto = MdmServer::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/mdm';
    }
}
