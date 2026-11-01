<?php

namespace spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute;

use JsonSerializable;
use spkm\FortiNac\Data\Radius\RadiusDictionaryAttribute;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Update user-defined RADIUS dictionary entry by ID: POST /radius/dictionary/{id}.
 */
class UpdateRadiusDictionaryAttributeRequest extends WriteRequest
{
    protected ?string $dto = RadiusDictionaryAttribute::class;

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
        return '/radius/dictionary/'.$this->id;
    }
}
