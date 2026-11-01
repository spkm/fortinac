<?php

namespace spkm\FortiNac\Requests\Settings\Certificate;

use spkm\FortiNac\Requests\ActionRequest;
use spkm\FortiNac\Support\Path;

/**
 * Uploads a certificate chain and optional private key to the specified target name. Uploading certificates to a trust store adds them to the list of trusted certificates: POST /settings/security/certificate-server/{name}.
 *
 * Parameters: targetType, privateKeyType, certs, privateKey.
 */
class UpdateCertificateRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: targetType, privateKeyType, certs, privateKey
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/security/certificate-server/'.Path::segment($this->name);
    }
}
