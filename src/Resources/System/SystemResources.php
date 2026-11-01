<?php

namespace spkm\FortiNac\Resources\System;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Resources\BaseResource;

/**
 * The system itself: groups, tasks, the scheduler, backups, licences and managed servers. FortiNac::system().
 *
 * @extends BaseResource<Data>
 */
class SystemResources extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Analytics.
     */
    public function analytics(): AnalyticsPropertiesResource
    {
        return new AnalyticsPropertiesResource($this->connector);
    }

    /**
     * Background Task.
     */
    public function backgroundTasks(): BackgroundTaskResource
    {
        return new BackgroundTaskResource($this->connector);
    }

    /**
     * Backup Configuration.
     */
    public function backupConfiguration(): BackupConfigurationResource
    {
        return new BackupConfigurationResource($this->connector);
    }

    /**
     * Backup Settings.
     */
    public function backupSettings(): BackupSettingsResource
    {
        return new BackupSettingsResource($this->connector);
    }

    /**
     * Group.
     */
    public function groups(): GroupResource
    {
        return new GroupResource($this->connector);
    }

    /**
     * High Availability.
     */
    public function highAvailability(): HighAvailabilityResource
    {
        return new HighAvailabilityResource($this->connector);
    }

    /**
     * License Management.
     */
    public function licenseManagement(): LicenseManagementResource
    {
        return new LicenseManagementResource($this->connector);
    }

    /**
     * System.
     */
    public function localProperties(): LocalPropertiesResource
    {
        return new LocalPropertiesResource($this->connector);
    }

    /**
     * Services.
     */
    public function ntp(): NtpSettingsResource
    {
        return new NtpSettingsResource($this->connector);
    }

    /**
     * Scheduler.
     */
    public function scheduler(): ScheduledTaskResource
    {
        return new ScheduledTaskResource($this->connector);
    }

    /**
     * Service Connector.
     */
    public function serviceConnector(): ServiceConnectorResource
    {
        return new ServiceConnectorResource($this->connector);
    }

    /**
     * Server Management.
     */
    public function managedServers(): ManagedServerResource
    {
        return new ManagedServerResource($this->connector);
    }

    /**
     * System.
     */
    public function debug(): DebugResource
    {
        return new DebugResource($this->connector);
    }

    /**
     * Task.
     */
    public function tasks(): TaskResource
    {
        return new TaskResource($this->connector);
    }

    /**
     * Update.
     */
    public function update(): UpdateResource
    {
        return new UpdateResource($this->connector);
    }
}
