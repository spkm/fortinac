<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Retrieves the agent info for a User based on the platform: GET /user/{id}/get-agent.
 *
 * Parameters: id, platform.
 */
class GetUserGetAgentRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    /**
     * @param  array<string, mixed>  $options  Query options: id, platform
     */
    public function __construct(protected int $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/user/'.$this->id.'/get-agent';
    }
}
