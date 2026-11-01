<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Imports hosts into database: POST /host/import-hosts.
 *
 * Parameters: file.
 */
class ImportHostHostsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/import-hosts';
    }
}
