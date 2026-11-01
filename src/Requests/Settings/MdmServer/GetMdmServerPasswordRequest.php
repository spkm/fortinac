<?php

namespace spkm\FortiNac\Requests\Settings\MdmServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the configured password used to communicate with the MDM server: GET /settings/integration/mdm/{id}/password.
 */
class GetMdmServerPasswordRequest extends ItemRequest
{
    protected bool $cacheable = false;

    protected string $responseShape = self::SCALAR;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/mdm/'.$this->id.'/password';
    }
}
