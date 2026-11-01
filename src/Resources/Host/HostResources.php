<?php

namespace spkm\FortiNac\Resources\Host;

/**
 * Host records and what FortiNAC knows about them: identities, fingerprints, scans and profiling rules.
 *
 * FortiNac::host() is itself the builder over Host Record (HostResource); the API's other
 * collections are its methods.
 */
class HostResources extends HostResource
{
    /**
     * Device Profiler, Device Profiling Rule.
     */
    public function deviceProfilingRules(): DeviceProfilingRuleResource
    {
        return new DeviceProfilingRuleResource($this->connector);
    }

    /**
     * Aging.
     */
    public function aging(): AgingResource
    {
        return new AgingResource($this->connector);
    }

    /**
     * Device Identity Source.
     */
    public function deviceIdentitySources(): DeviceIdentitySourceResource
    {
        return new DeviceIdentitySourceResource($this->connector);
    }

    /**
     * Device Identity.
     */
    public function deviceIdentities(): DeviceIdentityResource
    {
        return new DeviceIdentityResource($this->connector);
    }

    /**
     * FingerPrint.
     */
    public function fingerprints(): FingerprintResource
    {
        return new FingerprintResource($this->connector);
    }

    /**
     * Host Registration Request.
     */
    public function registrationRequests(): RegistrationRequestResource
    {
        return new RegistrationRequestResource($this->connector);
    }

    /**
     * Scanned Application.
     */
    public function scannedApplications(): ScannedApplicationResource
    {
        return new ScannedApplicationResource($this->connector);
    }

    /**
     * Host, Scan Result.
     */
    public function scans(): ScanResultResource
    {
        return new ScanResultResource($this->connector);
    }
}
