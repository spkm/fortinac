<?php

namespace spkm\FortiNac\Requests\Dynamic\FirewallSession;

use JsonSerializable;
use spkm\FortiNac\Data\Dynamic\FirewallSessionPollingById;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates the firewall session polling configuration for the supplied device: POST /dynamic/dynamic-connection/polling/{id}.
 */
class PostFirewallSessionPollingByIdRequest extends WriteRequest
{
    protected ?string $dto = FirewallSessionPollingById::class;

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
        return '/dynamic/dynamic-connection/polling/'.$this->id;
    }
}
