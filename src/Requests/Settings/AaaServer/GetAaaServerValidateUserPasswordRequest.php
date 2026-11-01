<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the password stored for the Validation Account user: GET /settings/integration/aaa/{id}/validate-user-password.
 */
class GetAaaServerValidateUserPasswordRequest extends ItemRequest
{
    protected bool $cacheable = false;

    protected string $responseShape = self::RAW;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa/'.$this->id.'/validate-user-password';
    }
}
