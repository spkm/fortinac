<?php

namespace spkm\FortiNac\Requests\Settings\Certificate;

use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all server and/or client CA certificates uploaded to this server: GET /settings/security/certificate-server.
 */
class GetCertificatesRequest extends ListRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/security/certificate-server';
    }
}
