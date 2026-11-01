<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns the count of all AAA Server records in the database that match the provided filter: GET /settings/integration/aaa/count.
 */
class CountAaaServersRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa/count';
    }
}
