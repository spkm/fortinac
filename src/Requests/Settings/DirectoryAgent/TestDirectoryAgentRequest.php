<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Tests the Directory Agent Configurations using the supplied Username and Domain name: POST /settings/agent/directory-agent/test.
 *
 * Parameters: usrname, domain.
 */
class TestDirectoryAgentRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/test';
    }
}
