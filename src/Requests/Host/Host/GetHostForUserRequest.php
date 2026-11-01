<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Data\Host\HostsForUser;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Host Records for the user object with the provided id: GET /host/for-user.
 *
 * Parameters: userID.
 */
class GetHostForUserRequest extends ItemRequest
{
    protected ?string $dto = HostsForUser::class;

    /**
     * @param  array<string, mixed>  $options  Query options: userID
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/host/for-user';
    }
}
