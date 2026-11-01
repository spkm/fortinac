<?php

namespace spkm\FortiNac\Requests\Settings\TrapMib;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Updates the Mib File Name with the supplied name: POST /settings/integration/trap-mib/mib-name.
 *
 * Parameters: oid, label, entOid, ipOid, macOid, userOid, specificType, alarmCause, evtFormat, eventFormat, enterpriseOID, ipaddressOID, macaddressOID, userIDOID.
 */
class PostTrapMibMibNameRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/trap-mib/mib-name';
    }
}
