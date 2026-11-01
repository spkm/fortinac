<?php

namespace spkm\FortiNac\Requests\Settings\Certificate;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Restarts the processes associated with the target certificate: POST /settings/security/certificate-server/restart.
 *
 * Parameters: target.
 */
class RestartCertificateRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/security/certificate-server/restart';
    }
}
