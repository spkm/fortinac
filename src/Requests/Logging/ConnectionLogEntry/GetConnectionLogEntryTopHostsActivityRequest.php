<?php

namespace spkm\FortiNac\Requests\Logging\ConnectionLogEntry;

use spkm\FortiNac\Data\Logging\ConnectionLogEntryTopHostsActivity;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the top numbers of hosts by most connection activity: GET /logging/connection/top/hosts/activity.
 *
 * Parameters: filter.
 */
class GetConnectionLogEntryTopHostsActivityRequest extends ItemRequest
{
    protected ?string $dto = ConnectionLogEntryTopHostsActivity::class;

    /**
     * @param  array<string, mixed>  $options  Query options: filter
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/logging/connection/top/hosts/activity';
    }
}
