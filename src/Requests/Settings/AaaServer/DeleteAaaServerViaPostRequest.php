<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the AAA server record supplied, if it is not currently in use: POST /settings/integration/aaa/{id}/delete.
 */
class DeleteAaaServerViaPostRequest extends ActionRequest
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
        return '/settings/integration/aaa/'.$this->id.'/delete';
    }
}
