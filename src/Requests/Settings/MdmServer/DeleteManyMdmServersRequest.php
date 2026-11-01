<?php

namespace spkm\FortiNac\Requests\Settings\MdmServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of MDM records supplied under the id parameter: POST /settings/integration/mdm/delete.
 *
 * Parameters: ids.
 */
class DeleteManyMdmServersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/mdm/delete';
    }
}
