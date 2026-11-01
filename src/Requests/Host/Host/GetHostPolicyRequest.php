<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the policy info for a Host Record based on the provided id: GET /host/{id}/policy.
 *
 * Parameters: id.
 */
class GetHostPolicyRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function __construct(protected int $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/host/'.$this->id.'/policy';
    }
}
