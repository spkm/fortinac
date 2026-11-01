<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Retrieves the RADIUS service log (var/log/radius/radius.log), systemd journal, and output master entries containing: GET /radius/radius-server-config/log.
 *
 * Parameters: lines.
 */
class GetRadiusServerLogRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: lines
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config/log';
    }
}
