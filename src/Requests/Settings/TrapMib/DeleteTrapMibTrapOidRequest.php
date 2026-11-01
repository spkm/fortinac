<?php

namespace spkm\FortiNac\Requests\Settings\TrapMib;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes Trap Objects supplied in the list: DELETE /settings/integration/trap-mib/trap-oid.
 */
class DeleteTrapMibTrapOidRequest extends DeleteRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/trap-mib/trap-oid';
    }
}
