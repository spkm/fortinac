<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the status of an ongoing grab log snapshot collection: GET /system/debug/grabLogSnapshot-status.
 *
 * Parameters: hostName, type.
 */
class GetDebugGrabLogSnapshotStatusRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    /**
     * @param  array<string, mixed>  $options  Query options: hostName, type
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/system/debug/grabLogSnapshot-status';
    }
}
