<?php

namespace spkm\FortiNac\Requests\Settings\MdmServer;

use spkm\FortiNac\Data\Settings\MdmServer;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of MDM records matching the supplied filter: GET /settings/integration/mdm.
 */
class GetMdmServersRequest extends ListRequest
{
    protected ?string $dto = MdmServer::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/mdm';
    }
}
