<?php

namespace spkm\FortiNac\Requests\Settings\FirewallTag;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\FirewallTag;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates a Firewall Tag record: POST /settings/integration/firewall-tag/{id}.
 */
class UpdateFirewallTagRequest extends WriteRequest
{
    protected ?string $dto = FirewallTag::class;

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
        return '/settings/integration/firewall-tag/'.$this->id;
    }
}
