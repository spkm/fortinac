<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Reprofile the rogue devices with the supplied mac addresses: POST /adapter/reprofile-rogues.
 *
 * Parameters: mac.
 */
class ReprofileAdapterRoguesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/adapter/reprofile-rogues';
    }
}
