<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Download the gran log snapshot file: GET /system/debug/grabLogSnapshot-download.
 *
 * Parameters: hostName, type.
 */
class GetDebugGrabLogSnapshotDownloadRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: hostName, type
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/system/debug/grabLogSnapshot-download';
    }
}
