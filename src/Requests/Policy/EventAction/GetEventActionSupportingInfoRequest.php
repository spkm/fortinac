<?php

namespace spkm\FortiNac\Requests\Policy\EventAction;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the additional information needed to create a Security Rule: GET /policy/event-action/supporting-info.
 */
class GetEventActionSupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/event-action/supporting-info';
    }
}
