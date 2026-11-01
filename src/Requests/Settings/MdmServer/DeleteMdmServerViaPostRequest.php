<?php

namespace spkm\FortiNac\Requests\Settings\MdmServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single MDM record by ID: POST /settings/integration/mdm/{id}/delete.
 */
class DeleteMdmServerViaPostRequest extends ActionRequest
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
        return '/settings/integration/mdm/'.$this->id.'/delete';
    }
}
