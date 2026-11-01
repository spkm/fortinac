<?php

namespace spkm\FortiNac\Requests\Settings\Certificate;

use spkm\FortiNac\Requests\ActionRequest;
use spkm\FortiNac\Support\Path;

/**
 * Deletes trusted client root CA certificates by SHA1 fingerprint from the trust store at the specified target name: POST /settings/security/certificate-server/{name}/delete.
 *
 * Parameters: fingerprint.
 */
class DeleteCertificateViaPostRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: fingerprint
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/security/certificate-server/'.Path::segment($this->name).'/delete';
    }
}
