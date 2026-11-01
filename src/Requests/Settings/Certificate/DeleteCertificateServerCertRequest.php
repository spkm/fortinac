<?php

namespace spkm\FortiNac\Requests\Settings\Certificate;

use spkm\FortiNac\Requests\ActionRequest;
use spkm\FortiNac\Support\Path;

/**
 * Deletes server certificate at the specified target: POST /settings/security/certificate-server/{name}/deleteServerCert.
 */
class DeleteCertificateServerCertRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/security/certificate-server/'.Path::segment($this->name).'/deleteServerCert';
    }
}
