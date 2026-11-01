<?php

namespace spkm\FortiNac\Requests\Settings\Quarantine;

use spkm\FortiNac\Data\Settings\Quarantine;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the Quarantine properties: POST /settings/device/quarantine.
 *
 * Parameters: quarantineVlanSwitching.
 */
class UpdateQuarantineRequest extends ActionRequest
{
    protected ?string $dto = Quarantine::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/quarantine';
    }
}
