<?php

namespace spkm\FortiNac\Requests\Settings\Certificate;

use spkm\FortiNac\Data\Settings\CertificateCsrGenerate;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Generates a Certificate Signing Request for the upload target: POST /settings/security/certificate-server/csr/generate.
 */
class PostCertificateCsrGenerateRequest extends WriteRequest
{
    protected ?string $dto = CertificateCsrGenerate::class;

    public function resolveEndpoint(): string
    {
        return '/settings/security/certificate-server/csr/generate';
    }
}
