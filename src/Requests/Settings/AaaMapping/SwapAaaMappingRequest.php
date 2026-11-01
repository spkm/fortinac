<?php

namespace spkm\FortiNac\Requests\Settings\AaaMapping;

use spkm\FortiNac\Data\Settings\AaaMappingSwapAaaMapping;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Swaps the priority of two RADIUS Domain Mappings: POST /settings/integration/aaa-mappings/swap.
 */
class SwapAaaMappingRequest extends WriteRequest
{
    protected ?string $dto = AaaMappingSwapAaaMapping::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa-mappings/swap';
    }
}
