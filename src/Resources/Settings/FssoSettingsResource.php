<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\FssoSettings;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Settings\FssoSettings\GetFssoSettingsPasswordRequest;
use spkm\FortiNac\Requests\Settings\FssoSettings\GetFssoSettingsRequest;
use spkm\FortiNac\Requests\Settings\FssoSettings\UpdateFssoSettingsRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * FSSO, from FortiNac::settings()->fsso().
 *
 * @extends SingletonResource<FssoSettings>
 */
class FssoSettingsResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, FssoSettings::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetFssoSettingsRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateFssoSettingsRequest([...$body, ...$options]);
    }

    /**
     * Returns the password for the currently configured FSSO server: GET /settings/integration/FSSO/password.
     */
    public function password(): mixed
    {
        return $this->fetch(new GetFssoSettingsPasswordRequest);
    }
}
