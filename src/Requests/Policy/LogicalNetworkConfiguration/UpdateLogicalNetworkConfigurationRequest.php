<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\LogicalNetworkConfiguration;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an logical network record: POST /policy/logical-network-configuration/{id}.
 */
class UpdateLogicalNetworkConfigurationRequest extends WriteRequest
{
    protected ?string $dto = LogicalNetworkConfiguration::class;

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
        return '/policy/logical-network-configuration/'.$this->id;
    }
}
