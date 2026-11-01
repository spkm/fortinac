<?php

namespace spkm\FortiNac\Requests\Settings\TrapMib;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Adds a new trap mib if a trap mib with the name does not exist and adds a new trap object to the trap mib if a trap mib already exists with the name: POST /settings/integration/trap-mib/add.
 *
 * Parameters: oid, label, entOid, ipOid, macOid, userOid, specificType, alarmCause, evtFormat, eventFormat, enterpriseOID, ipaddressOID, macaddressOID, userIDOID.
 */
class AddTrapMibRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/trap-mib/add';
    }
}
