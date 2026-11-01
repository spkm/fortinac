<?php

namespace spkm\FortiNac\Requests\System\BackupSettings;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured system backup settings: GET /system/backup-settings/system-backup.
 */
class GetBackupSettingsSystemBackupRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/backup-settings/system-backup';
    }
}
