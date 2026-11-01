<?php

namespace spkm\FortiNac\Requests\Settings\SecurityEventParser;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\SecurityEventParser;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates a Security Event Parser record: POST /settings/integration/security-event-parser/{id}.
 */
class UpdateSecurityEventParserRequest extends WriteRequest
{
    protected ?string $dto = SecurityEventParser::class;

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
        return '/settings/integration/security-event-parser/'.$this->id;
    }
}
