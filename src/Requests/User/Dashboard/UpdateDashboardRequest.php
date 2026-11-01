<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use JsonSerializable;
use spkm\FortiNac\Data\User\Dashboard;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates a User Dashboard record: POST /user/dashboard/{id}.
 */
class UpdateDashboardRequest extends WriteRequest
{
    protected ?string $dto = Dashboard::class;

    protected string $responseShape = self::LIST;

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
        return '/user/dashboard/'.$this->id;
    }
}
