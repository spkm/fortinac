<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Settings\LogReceiver;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Settings\LogReceiver\DeleteManyLogReceiversRequest;
use spkm\FortiNac\Requests\Settings\LogReceiver\GetLogReceiversRequest;
use spkm\FortiNac\Requests\Settings\LogReceiver\UpdateLogReceiverRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Log Receiver, from FortiNac::settings()->logReceiver().
 *
 * @extends BaseResource<LogReceiver>
 */
class LogReceiverResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, LogReceiver::class);
    }

    /**
     * Returns the currently configured Log Receivers: GET /settings/integration/log-receiver.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, LogReceiver>
     */
    public function get(Query|array $query = []): Collection
    {
        return $this->fetch(new GetLogReceiversRequest($query));
    }

    /**
     * Adds or modifies a Log Receiver: POST /settings/integration/log-receiver.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function update(array|Data $attributes = [], array $options = []): ?LogReceiver
    {
        return $this->fetch(new UpdateLogReceiverRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Log Receiver: POST /settings/integration/log-receiver/delete.
     *
     * @param  array<string, mixed>  $options  Query options: dbid
     */
    public function deleteMany(array $options = []): bool
    {
        return $this->perform(new DeleteManyLogReceiversRequest($options));
    }
}
