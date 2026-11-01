<?php

namespace spkm\FortiNac\Resources\System;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\System\LocalPropertiesCluster;
use spkm\FortiNac\Data\System\LocalPropertiesPasswordsChange;
use spkm\FortiNac\Data\System\LocalPropertiesSystemInitialize;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesClusterRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesConfigStatusRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesGlobaloptionByParamRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesHardwarePerformanceRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesHardwareRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesLicenseConcurrentRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesLicenseRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesSoftwareDetailsRequest;
use spkm\FortiNac\Requests\System\LocalProperties\PostLocalPropertiesClusterApplicationPrimaryRestartRequest;
use spkm\FortiNac\Requests\System\LocalProperties\PostLocalPropertiesClusterControlPrimaryRestartRequest;
use spkm\FortiNac\Requests\System\LocalProperties\PostLocalPropertiesHardwareThresholdsRequest;
use spkm\FortiNac\Requests\System\LocalProperties\PostLocalPropertiesLicenseApplyRequest;
use spkm\FortiNac\Requests\System\LocalProperties\PostLocalPropertiesPasswordsChangeRequest;
use spkm\FortiNac\Requests\System\LocalProperties\PostLocalPropertiesSystemInitializeRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * System, from FortiNac::system()->localProperties().
 *
 * @extends BaseResource<Data>
 */
class LocalPropertiesResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns all of the servers in the local cluster, composed of the Control/Application pair and any High Availability servers: GET /system/local-properties/cluster.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, LocalPropertiesCluster>
     */
    public function cluster(Query|array $query = []): Collection
    {
        return $this->fetch(new GetLocalPropertiesClusterRequest($query));
    }

    /**
     * GET /system/local-properties/config-status: GET /system/local-properties/config-status.
     */
    public function configStatus(): mixed
    {
        return $this->fetch(new GetLocalPropertiesConfigStatusRequest);
    }

    /**
     * Returns the global option value for the specified global option key: GET /system/local-properties/globaloption/{param}.
     */
    public function globaloptionByParam(string $param): mixed
    {
        return $this->fetch(new GetLocalPropertiesGlobaloptionByParamRequest($param));
    }

    /**
     * Queries hardware status and performance information: GET /system/local-properties/hardware.
     */
    public function hardware(): mixed
    {
        return $this->fetch(new GetLocalPropertiesHardwareRequest);
    }

    /**
     * Queries hardware performance information only: GET /system/local-properties/hardware/performance.
     */
    public function hardwarePerformance(): mixed
    {
        return $this->fetch(new GetLocalPropertiesHardwarePerformanceRequest);
    }

    /**
     * Returns the current license information for this server: GET /system/local-properties/license.
     */
    public function license(): mixed
    {
        return $this->fetch(new GetLocalPropertiesLicenseRequest);
    }

    /**
     * Returns the number of used licenses per device and summaries of the results: GET /system/local-properties/license/concurrent.
     *
     * @param  array<string, mixed>  $options  Query options: host
     */
    public function licenseConcurrent(array $options = []): mixed
    {
        return $this->fetch(new GetLocalPropertiesLicenseConcurrentRequest($options));
    }

    /**
     * Returns the current version and system information for this server: GET /system/local-properties/software-details.
     */
    public function softwareDetails(): mixed
    {
        return $this->fetch(new GetLocalPropertiesSoftwareDetailsRequest);
    }

    /**
     * Restarts the Primary Application server in this cluster: POST /system/local-properties/cluster/application/primary/restart.
     *
     * @param  array<string, mixed>  $options
     */
    public function clusterApplicationPrimaryRestart(array $options = []): bool
    {
        return $this->perform(new PostLocalPropertiesClusterApplicationPrimaryRestartRequest($options));
    }

    /**
     * Restarts the Primary Control server in this cluster: POST /system/local-properties/cluster/control/primary/restart.
     *
     * @param  array<string, mixed>  $options
     */
    public function clusterControlPrimaryRestart(array $options = []): bool
    {
        return $this->perform(new PostLocalPropertiesClusterControlPrimaryRestartRequest($options));
    }

    /**
     * Set the hardware performance thresholds, providing warnings for high utilization: POST /system/local-properties/hardware/thresholds.
     *
     * @param  array<string, mixed>  $options  Query options: warningAttrName, warningAttrVal, criticalAttrName, criticalAttrVal
     */
    public function hardwareThresholds(array $options = []): bool
    {
        return $this->perform(new PostLocalPropertiesHardwareThresholdsRequest($options));
    }

    /**
     * Applies a new license key to this appliance: POST /system/local-properties/license/apply.
     *
     * @param  array<string, mixed>  $options  Query options: licenseKey
     */
    public function licenseApply(array $options = []): bool
    {
        return $this->perform(new PostLocalPropertiesLicenseApplyRequest($options));
    }

    /**
     * Changes the previously configured passwords for the appliance: POST /system/local-properties/passwords/change.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function passwordsChange(array|Data $attributes = [], array $options = []): ?LocalPropertiesPasswordsChange
    {
        return $this->fetch(new PostLocalPropertiesPasswordsChangeRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Sets initial passwords for the CLI and the Administrative UI and configures the NMAP service. This does not change the CLI passwords immediately, as the final values are written by the Config Wizard: POST /system/local-properties/system/initialize.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function systemInitialize(array|Data $attributes = [], array $options = []): ?LocalPropertiesSystemInitialize
    {
        return $this->fetch(new PostLocalPropertiesSystemInitializeRequest($this->payloadOf($attributes), $options));
    }
}
