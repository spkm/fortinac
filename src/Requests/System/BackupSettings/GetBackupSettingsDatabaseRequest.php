<?php

namespace spkm\FortiNac\Requests\System\BackupSettings;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured database backup settings: GET /system/backup-settings/database.
 */
class GetBackupSettingsDatabaseRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/backup-settings/database';
    }
}
