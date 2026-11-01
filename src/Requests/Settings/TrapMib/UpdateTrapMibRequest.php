<?php

namespace spkm\FortiNac\Requests\Settings\TrapMib;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Updates the trap object with mib file name change if supplied name is different from original name and updates the trap object with mib file name change if the supplied name is same as original name: POST /settings/integration/trap-mib/update.
 *
 * Parameters: oid, label, entOid, ipOid, macOid, userOid, specificType, alarmCause, evtFormat, eventFormat, enterpriseOID, ipaddressOID, macaddressOID, userIDOID.
 */
class UpdateTrapMibRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/trap-mib/update';
    }
}
