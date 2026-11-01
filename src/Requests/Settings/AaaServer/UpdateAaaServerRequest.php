<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\AaaServer;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing AAA Server record in the database: POST /settings/integration/aaa/{id}.
 */
class UpdateAaaServerRequest extends WriteRequest
{
    protected ?string $dto = AaaServer::class;

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
        return '/settings/integration/aaa/'.$this->id;
    }
}
