<?php

namespace spkm\FortiNac\Requests\System\BackupSettings;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the System Backup settings: POST /system/backup-settings/system-backup.
 *
 * Parameters: systemBackupDays.
 */
class PostBackupSettingsSystemBackupRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/backup-settings/system-backup';
    }
}
