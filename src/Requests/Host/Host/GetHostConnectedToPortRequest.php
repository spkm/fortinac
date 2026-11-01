<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Host Records connected to the port id provided: GET /host/connected-to-port.
 *
 * Parameters: portID.
 */
class GetHostConnectedToPortRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: portID
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/host/connected-to-port';
    }
}
