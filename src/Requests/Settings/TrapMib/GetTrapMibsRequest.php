<?php

namespace spkm\FortiNac\Requests\Settings\TrapMib;

use spkm\FortiNac\Data\Settings\TrapMib;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all TrapMibs: GET /settings/integration/trap-mib.
 */
class GetTrapMibsRequest extends ListRequest
{
    protected ?string $dto = TrapMib::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/trap-mib';
    }
}
