<?php

namespace spkm\FortiNac\Requests\Ssid\Ssid;

use Saloon\Enums\Method;
use spkm\FortiNac\Data\Ssid\SsidConfig;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates SSID config associated with the supplied Device and SSID ID. Note: This REST API is introduced in v7.2.6: PUT /ssid/config.
 */
class PutSsidConfigRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = SsidConfig::class;

    public function resolveEndpoint(): string
    {
        return '/ssid/config';
    }
}
