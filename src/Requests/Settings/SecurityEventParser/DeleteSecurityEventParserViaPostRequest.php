<?php

namespace spkm\FortiNac\Requests\Settings\SecurityEventParser;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Security Event Parser record by ID: POST /settings/integration/security-event-parser/{id}/delete.
 */
class DeleteSecurityEventParserViaPostRequest extends ActionRequest
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
        return '/settings/integration/security-event-parser/'.$this->id.'/delete';
    }
}
