<?php

namespace spkm\FortiNac\Requests\Settings\WebServiceDefinition;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\WebServiceDefinition;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates a Web Service Definition record: POST /settings/security/web-service-definition/{id}.
 */
class UpdateWebServiceDefinitionRequest extends WriteRequest
{
    protected ?string $dto = WebServiceDefinition::class;

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
        return '/settings/security/web-service-definition/'.$this->id;
    }
}
