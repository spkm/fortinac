<?php

namespace spkm\FortiNac\Requests\System\BackupSettings;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Add Database Archive settings: POST /system/backup-settings/archives.
 *
 * Parameters: dbArchiveBackupDays, evtAlarmAgeTime, scanResultsAgeTime, connectionAgeTime.
 */
class PostBackupSettingsArchivesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/backup-settings/archives';
    }
}
