<?php

namespace spkm\FortiNac\Resources\Ssid;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Ssid\Ssid;
use spkm\FortiNac\Data\Ssid\SsidConfig;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Ssid\Ssid\GetSsidConfigRequest;
use spkm\FortiNac\Requests\Ssid\Ssid\GetSsidsRequest;
use spkm\FortiNac\Requests\Ssid\Ssid\PutSsidConfigRequest;

/**
 * SSID, from FortiNac::ssids().
 *
 * @extends Builder<Ssid>
 */
class SsidResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Ssid::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSsidsRequest($query);
    }

    /**
     * Returns SSID config associated with the supplied Device and SSID ID. Note: This REST API is introduced in v7.2.6: GET /ssid/config.
     *
     * @param  array<string, mixed>  $options  Query options: ssid, device
     */
    public function config(array $options = []): mixed
    {
        return $this->fetch(new GetSsidConfigRequest($options));
    }

    /**
     * Updates SSID config associated with the supplied Device and SSID ID. Note: This REST API is introduced in v7.2.6: PUT /ssid/config.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function putConfig(array|Data $attributes = [], array $options = []): ?SsidConfig
    {
        return $this->fetch(new PutSsidConfigRequest($this->payloadOf($attributes), $options));
    }
}
