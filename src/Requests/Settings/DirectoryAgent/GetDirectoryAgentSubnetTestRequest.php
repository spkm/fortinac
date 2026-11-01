<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Test if the supplied IP address exists in any configured IP ranges: GET /settings/agent/directory-agent/subnet/test.
 */
class GetDirectoryAgentSubnetTestRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/subnet/test';
    }
}
