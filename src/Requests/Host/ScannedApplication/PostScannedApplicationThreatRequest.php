<?php

namespace spkm\FortiNac\Requests\Host\ScannedApplication;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the Threat Level override for a Scanned Application, allowing it to be marked safe or unsafe: POST /host/scanned-application/threat.
 *
 * Parameters: override, appID.
 */
class PostScannedApplicationThreatRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/scanned-application/threat';
    }
}
