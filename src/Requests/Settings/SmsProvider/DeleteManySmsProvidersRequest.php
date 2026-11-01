<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the SMS Provider record or records supplied, if they are not currently in use: POST /settings/integration/sms/delete.
 *
 * Parameters: id.
 */
class DeleteManySmsProvidersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/sms/delete';
    }
}
