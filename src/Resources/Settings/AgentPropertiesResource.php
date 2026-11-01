<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\AgentProperties;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Settings\AgentProperties\GetAgentPropertiesRequest;
use spkm\FortiNac\Requests\Settings\AgentProperties\UpdateAgentPropertiesRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * Security Mgmnt Properties, from FortiNac::settings()->agentProperties().
 *
 * @extends SingletonResource<AgentProperties>
 */
class AgentPropertiesResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, AgentProperties::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetAgentPropertiesRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateAgentPropertiesRequest($body, $options);
    }
}
