<?php

namespace spkm\FortiNac\Requests\Settings\SecurityEventParser;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Security Event Parser record by ID: DELETE /settings/integration/security-event-parser/{id}.
 */
class DeleteSecurityEventParserRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/security-event-parser/'.$this->id;
    }
}
