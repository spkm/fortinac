<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the number of used licenses per device and summaries of the results: GET /system/local-properties/license/concurrent.
 *
 * Parameters: host.
 */
class GetLocalPropertiesLicenseConcurrentRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: host
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/system/local-properties/license/concurrent';
    }
}
