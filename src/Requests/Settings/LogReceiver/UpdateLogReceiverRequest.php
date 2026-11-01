<?php

namespace spkm\FortiNac\Requests\Settings\LogReceiver;

use spkm\FortiNac\Data\Settings\LogReceiver;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds or modifies a Log Receiver: POST /settings/integration/log-receiver.
 */
class UpdateLogReceiverRequest extends WriteRequest
{
    protected ?string $dto = LogReceiver::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/log-receiver';
    }
}
