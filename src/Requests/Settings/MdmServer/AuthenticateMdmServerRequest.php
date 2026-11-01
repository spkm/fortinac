<?php

namespace spkm\FortiNac\Requests\Settings\MdmServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Authenticates against an MDM server and returns the refresh token. This is not required for all vendors: POST /settings/integration/mdm/authenticate.
 *
 * Parameters: mdmVendor, applicationID, identifier, appAccessKey, appRequest, appVersion, platformID, authCode.
 */
class AuthenticateMdmServerRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/mdm/authenticate';
    }
}
