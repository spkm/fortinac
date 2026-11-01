<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\Quarantine;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Settings\Quarantine\GetQuarantineRequest;
use spkm\FortiNac\Requests\Settings\Quarantine\MarkQuarantineAllHostsSafeRequest;
use spkm\FortiNac\Requests\Settings\Quarantine\UpdateQuarantineRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * Quarantine, from FortiNac::settings()->quarantine().
 *
 * @extends SingletonResource<Quarantine>
 */
class QuarantineResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Quarantine::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetQuarantineRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateQuarantineRequest([...$body, ...$options]);
    }

    /**
     * Sets all the hosts from Risk State to Safe: POST /settings/device/quarantine/mark-all-hosts-safe.
     *
     * @param  array<string, mixed>  $options
     */
    public function markAllHostsSafe(array $options = []): bool
    {
        return $this->perform(new MarkQuarantineAllHostsSafeRequest($options));
    }
}
