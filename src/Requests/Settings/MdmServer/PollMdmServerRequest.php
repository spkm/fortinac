<?php

namespace spkm\FortiNac\Requests\Settings\MdmServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Polls and resynchronizes with an MDM service: POST /settings/integration/mdm/{id}/poll.
 */
class PollMdmServerRequest extends ActionRequest
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
        return '/settings/integration/mdm/'.$this->id.'/poll';
    }
}
