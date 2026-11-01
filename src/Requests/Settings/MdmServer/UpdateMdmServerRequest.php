<?php

namespace spkm\FortiNac\Requests\Settings\MdmServer;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\MdmServer;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an MDM record: POST /settings/integration/mdm/{id}.
 */
class UpdateMdmServerRequest extends WriteRequest
{
    protected ?string $dto = MdmServer::class;

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
        return '/settings/integration/mdm/'.$this->id;
    }
}
