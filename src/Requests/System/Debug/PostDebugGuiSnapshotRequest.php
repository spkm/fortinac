<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sends an e-mail to FortiNAC support using the configured SMTP server containing a provided snapshot from the GUI: POST /system/debug/gui/snapshot.
 *
 * Parameters: recipient, subject, message.
 */
class PostDebugGuiSnapshotRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/debug/gui/snapshot';
    }
}
