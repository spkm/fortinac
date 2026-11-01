<?php

namespace spkm\FortiNac\Requests\Dynamic\FirewallSession;

use JsonSerializable;
use spkm\FortiNac\Data\Dynamic\FirewallSession;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates a record: POST /dynamic/dynamic-connection/{id}.
 */
class UpdateFirewallSessionRequest extends WriteRequest
{
    protected ?string $dto = FirewallSession::class;

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
        return '/dynamic/dynamic-connection/'.$this->id;
    }
}
