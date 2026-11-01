<?php

namespace spkm\FortiNac\Requests\System\BackupSettings;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Restore the Database Archives: POST /system/backup-settings/database/restore-archives.
 *
 * Parameters: archiveName, backupDays.
 */
class PostBackupSettingsDatabaseRestoreArchivesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/backup-settings/database/restore-archives';
    }
}
