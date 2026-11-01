<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the secret stored for the AAA server: GET /settings/integration/aaa/{id}/secret.
 */
class GetAaaServerSecretRequest extends ItemRequest
{
    protected bool $cacheable = false;

    protected string $responseShape = self::RAW;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa/'.$this->id.'/secret';
    }
}
