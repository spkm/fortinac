<?php

namespace spkm\FortiNac\Requests\Settings\Certificate;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Copies an uploaded certificate from one target to another: POST /settings/security/certificate-server/copy.
 *
 * Parameters: sourceCert, targetCert.
 */
class CopyCertificateRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/security/certificate-server/copy';
    }
}
