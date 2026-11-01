<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all AAA Server records in the database that match the provided filter: GET /settings/integration/aaa/count/all.
 */
class CountAllAaaServersRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa/count/all';
    }
}
