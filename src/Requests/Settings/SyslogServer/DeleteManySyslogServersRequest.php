<?php

namespace spkm\FortiNac\Requests\Settings\SyslogServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of syslog parser records supplied under the id parameter: POST /settings/integration/syslog/delete.
 *
 * Parameters: id.
 */
class DeleteManySyslogServersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/syslog/delete';
    }
}
