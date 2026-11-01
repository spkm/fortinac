<?php

namespace spkm\FortiNac\Requests\Policy\PortalPolicy;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\PortalPolicy;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an portal policy record. Request Parameter Id of the portal policy record: POST /policy/portal/{id}.
 */
class UpdatePortalPolicyRequest extends WriteRequest
{
    protected ?string $dto = PortalPolicy::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/portal/'.$this->id;
    }
}
