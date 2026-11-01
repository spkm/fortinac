<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Directory Agent Configuration records supplied under the id parameter: POST /settings/agent/directory-agent/delete.
 *
 * Parameters: id.
 */
class DeleteManyDirectoryAgentsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/delete';
    }
}
