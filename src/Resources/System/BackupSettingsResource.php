<?php

namespace spkm\FortiNac\Resources\System;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\System\BackupSettingsArchives;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\System\BackupSettings\GetBackupSettingsArchivesRequest;
use spkm\FortiNac\Requests\System\BackupSettings\GetBackupSettingsDatabaseArchiveRequest;
use spkm\FortiNac\Requests\System\BackupSettings\GetBackupSettingsDatabaseRequest;
use spkm\FortiNac\Requests\System\BackupSettings\GetBackupSettingsSystemBackupRequest;
use spkm\FortiNac\Requests\System\BackupSettings\PostBackupSettingsArchivesRequest;
use spkm\FortiNac\Requests\System\BackupSettings\PostBackupSettingsDatabaseRequest;
use spkm\FortiNac\Requests\System\BackupSettings\PostBackupSettingsDatabaseRestoreArchivesRequest;
use spkm\FortiNac\Requests\System\BackupSettings\PostBackupSettingsSystemBackupRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Backup Settings, from FortiNac::system()->backupSettings().
 *
 * @extends BaseResource<Data>
 */
class BackupSettingsResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns the currently configured database archive settings: GET /system/backup-settings/archives.
     */
    public function archives(): ?BackupSettingsArchives
    {
        return $this->fetchOrNull(new GetBackupSettingsArchivesRequest);
    }

    /**
     * Returns the currently configured database backup settings: GET /system/backup-settings/database.
     */
    public function database(): bool
    {
        return $this->perform(new GetBackupSettingsDatabaseRequest);
    }

    /**
     * Returns a list of available local backups: GET /system/backup-settings/database/archive.
     */
    public function databaseArchive(): mixed
    {
        return $this->fetch(new GetBackupSettingsDatabaseArchiveRequest);
    }

    /**
     * Returns the currently configured system backup settings: GET /system/backup-settings/system-backup.
     */
    public function systemBackup(): bool
    {
        return $this->perform(new GetBackupSettingsSystemBackupRequest);
    }

    /**
     * Add Database Archive settings: POST /system/backup-settings/archives.
     *
     * @param  array<string, mixed>  $options  Query options: dbArchiveBackupDays, evtAlarmAgeTime, scanResultsAgeTime, connectionAgeTime
     */
    public function archives2(array $options = []): bool
    {
        return $this->perform(new PostBackupSettingsArchivesRequest($options));
    }

    /**
     * Sets the Database backup settings: POST /system/backup-settings/database.
     *
     * @param  array<string, mixed>  $options  Query options: archiveName, backupDays
     */
    public function database2(array $options = []): bool
    {
        return $this->perform(new PostBackupSettingsDatabaseRequest($options));
    }

    /**
     * Restore the Database Archives: POST /system/backup-settings/database/restore-archives.
     *
     * @param  array<string, mixed>  $options  Query options: archiveName, backupDays
     */
    public function databaseRestoreArchives(array $options = []): bool
    {
        return $this->perform(new PostBackupSettingsDatabaseRestoreArchivesRequest($options));
    }

    /**
     * Sets the System Backup settings: POST /system/backup-settings/system-backup.
     *
     * @param  array<string, mixed>  $options  Query options: systemBackupDays
     */
    public function systemBackup2(array $options = []): bool
    {
        return $this->perform(new PostBackupSettingsSystemBackupRequest($options));
    }
}
