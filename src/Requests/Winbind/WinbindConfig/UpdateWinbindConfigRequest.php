<?php

namespace spkm\FortiNac\Requests\Winbind\WinbindConfig;

use JsonSerializable;
use spkm\FortiNac\Data\Winbind\WinbindConfig;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Update an existing Winbind configuration object: POST /winbind/config/{id}.
 */
class UpdateWinbindConfigRequest extends WriteRequest
{
    protected ?string $dto = WinbindConfig::class;

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
        return '/winbind/config/'.$this->id;
    }
}
