<?php

namespace spkm\FortiNac\Requests\User\GuestTemplate;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Resolves an IP address from a supplied URL or hostname: GET /user/guest-template/resolve-ip.
 *
 * Parameters: url.
 */
class GetGuestTemplateResolveIpRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: url
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/user/guest-template/resolve-ip';
    }
}
