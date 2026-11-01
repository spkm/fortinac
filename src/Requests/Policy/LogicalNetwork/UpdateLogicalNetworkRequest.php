<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetwork;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\LogicalNetwork;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an record: POST /policy/logical-network/{id}.
 */
class UpdateLogicalNetworkRequest extends WriteRequest
{
    protected ?string $dto = LogicalNetwork::class;

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
        return '/policy/logical-network/'.$this->id;
    }
}
