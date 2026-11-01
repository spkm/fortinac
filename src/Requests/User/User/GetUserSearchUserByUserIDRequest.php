<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Data\User\UserSearch;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Retrieves user info from directory: GET /user/search-user-by-userID.
 *
 * Parameters: userID, createNCMUser.
 */
class GetUserSearchUserByUserIDRequest extends ItemRequest
{
    protected ?string $dto = UserSearch::class;

    /**
     * @param  array<string, mixed>  $options  Query options: userID, createNCMUser
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/user/search-user-by-userID';
    }
}
