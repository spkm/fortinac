<?php

namespace spkm\FortiNac\Requests\Settings\LogReceiver;

use spkm\FortiNac\Data\Settings\LogReceiver;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns the currently configured Log Receivers: GET /settings/integration/log-receiver.
 */
class GetLogReceiversRequest extends ListRequest
{
    protected ?string $dto = LogReceiver::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/log-receiver';
    }
}
