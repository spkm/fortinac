<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use JsonSerializable;
use spkm\FortiNac\Data\User\CurrentSessionBookmark;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates a User Bookmark record: POST /user/current-session/bookmark/{id}.
 */
class PostCurrentSessionBookmarkByIdRequest extends WriteRequest
{
    protected ?string $dto = CurrentSessionBookmark::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/user/current-session/bookmark/'.$this->id;
    }
}
