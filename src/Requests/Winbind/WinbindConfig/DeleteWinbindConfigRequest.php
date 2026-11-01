<?php

namespace spkm\FortiNac\Requests\Winbind\WinbindConfig;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes Winbind configuration object by ID: DELETE /winbind/config/{id}.
 */
class DeleteWinbindConfigRequest extends DeleteRequest
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
        return '/winbind/config/'.$this->id;
    }
}
