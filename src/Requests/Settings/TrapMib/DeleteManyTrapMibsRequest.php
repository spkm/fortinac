<?php

namespace spkm\FortiNac\Requests\Settings\TrapMib;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Deletes Trap Objects supplied in the list: POST /settings/integration/trap-mib/delete.
 */
class DeleteManyTrapMibsRequest extends WriteRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/trap-mib/delete';
    }
}
