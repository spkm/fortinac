<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of all supported event types: GET /logging/event/supporting-info.
 */
class GetEventSupportingInfoRequest extends ListRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event/supporting-info';
    }
}
