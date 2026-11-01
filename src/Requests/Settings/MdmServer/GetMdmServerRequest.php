<?php

namespace spkm\FortiNac\Requests\Settings\MdmServer;

use spkm\FortiNac\Data\Settings\MdmServer;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of MDM records matching the supplied filter: GET /settings/integration/mdm/{id}.
 */
class GetMdmServerRequest extends ItemRequest
{
    protected ?string $dto = MdmServer::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/mdm/'.$this->id;
    }
}
