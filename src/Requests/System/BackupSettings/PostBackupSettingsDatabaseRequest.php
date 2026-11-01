<?php

namespace spkm\FortiNac\Requests\System\BackupSettings;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the Database backup settings: POST /system/backup-settings/database.
 *
 * Parameters: archiveName, backupDays.
 */
class PostBackupSettingsDatabaseRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/backup-settings/database';
    }
}
