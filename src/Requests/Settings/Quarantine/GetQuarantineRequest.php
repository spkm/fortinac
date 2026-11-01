<?php

namespace spkm\FortiNac\Requests\Settings\Quarantine;

use spkm\FortiNac\Data\Settings\Quarantine;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured Quarantine Properties: GET /settings/device/quarantine.
 */
class GetQuarantineRequest extends ItemRequest
{
    protected ?string $dto = Quarantine::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/quarantine';
    }
}
