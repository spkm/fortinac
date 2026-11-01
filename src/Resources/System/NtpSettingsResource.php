<?php

namespace spkm\FortiNac\Resources\System;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\System\NtpSettings\GetNtpSettingsRequest;
use spkm\FortiNac\Requests\System\NtpSettings\GetNtpSettingsServersRequest;
use spkm\FortiNac\Requests\System\NtpSettings\UpdateNtpSettingsRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * Services, from FortiNac::system()->ntp().
 *
 * @extends SingletonResource<Data>
 */
class NtpSettingsResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetNtpSettingsRequest($options);
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateNtpSettingsRequest([...$body, ...$options]);
    }

    /**
     * Gets the servers available for NTP configuration: GET /system/ntp/servers.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function servers(Query|array $query = []): Collection
    {
        return $this->fetch(new GetNtpSettingsServersRequest($query));
    }
}
