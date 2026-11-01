<?php

namespace spkm\FortiNac\Requests\Settings\MdmServer;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single MDM record by ID: DELETE /settings/integration/mdm/{id}.
 */
class DeleteMdmServerRequest extends DeleteRequest
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
        return '/settings/integration/mdm/'.$this->id;
    }
}
