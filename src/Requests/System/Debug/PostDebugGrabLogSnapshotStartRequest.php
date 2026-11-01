<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Start collecting a grab log snapshot: POST /system/debug/grabLogSnapshot-start.
 */
class PostDebugGrabLogSnapshotStartRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/system/debug/grabLogSnapshot-start';
    }
}
