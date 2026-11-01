<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns Name/ID pairs of the elements of a given type. Allowed types are host, adapter, user, and device: GET /system/debug/elements.
 *
 * Parameters: type, id.
 */
class GetDebugElementsRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: type, id
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/system/debug/elements';
    }
}
