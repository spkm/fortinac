<?php

namespace spkm\FortiNac\Requests\Logging\ConnectionLogEntry;

use spkm\FortiNac\Data\Logging\ConnectionLogEntryTopUsersConnectedTime;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the top numbers of users by most connected time: GET /logging/connection/top/users/connected-time.
 *
 * Parameters: numUsers, filter.
 */
class GetConnectionLogEntryTopUsersConnectedTimeRequest extends ItemRequest
{
    protected ?string $dto = ConnectionLogEntryTopUsersConnectedTime::class;

    /**
     * @param  array<string, mixed>  $options  Query options: numUsers, filter
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/logging/connection/top/users/connected-time';
    }
}
