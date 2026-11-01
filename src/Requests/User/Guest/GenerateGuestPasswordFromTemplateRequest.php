<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Generates a new password compliant with the guest template using the provided template Id: POST /user/guest/generate-password-from-template.
 *
 * Parameters: templateID.
 */
class GenerateGuestPasswordFromTemplateRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/guest/generate-password-from-template';
    }
}
