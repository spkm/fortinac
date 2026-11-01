<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the AAA Server record supplied, if it is not currently in use: DELETE /settings/integration/aaa/{id}.
 */
class DeleteAaaServerRequest extends DeleteRequest
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
        return '/settings/integration/aaa/'.$this->id;
    }
}
