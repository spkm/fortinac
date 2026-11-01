<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use spkm\FortiNac\Data\Settings\AaaServerValidateById;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Validate connectivity to the AAA server matching the specified ID: GET /settings/integration/aaa/validate/{id}.
 */
class GetAaaServerValidateByIdRequest extends ItemRequest
{
    protected ?string $dto = AaaServerValidateById::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa/validate/'.$this->id;
    }
}
