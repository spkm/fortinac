<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use spkm\FortiNac\Data\Settings\AaaServer;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the AAA Server record with the supplied DBID: GET /settings/integration/aaa/{id}.
 */
class GetAaaServerRequest extends ItemRequest
{
    protected ?string $dto = AaaServer::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa/'.$this->id;
    }
}
