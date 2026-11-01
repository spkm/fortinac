<?php

namespace spkm\FortiNac\Requests\System\BackupSettings;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of available local backups: GET /system/backup-settings/database/archive.
 */
class GetBackupSettingsDatabaseArchiveRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/system/backup-settings/database/archive';
    }
}
