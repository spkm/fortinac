<?php

namespace spkm\FortiNac\Requests\Settings\PatchManagement;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\PatchManagement;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new PatchLink Patch Management server: POST /settings/integration/patch-management/patch-link/{id}.
 */
class PostPatchManagementPatchLinkByIdRequest extends WriteRequest
{
    protected ?string $dto = PatchManagement::class;

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
        return '/settings/integration/patch-management/patch-link/'.$this->id;
    }
}
