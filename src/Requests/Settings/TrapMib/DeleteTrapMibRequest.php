<?php

namespace spkm\FortiNac\Requests\Settings\TrapMib;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes Trap MIBs supplied in the list: DELETE /settings/integration/trap-mib.
 */
class DeleteTrapMibRequest extends DeleteRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/trap-mib';
    }
}
