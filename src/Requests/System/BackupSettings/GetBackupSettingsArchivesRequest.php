<?php

namespace spkm\FortiNac\Requests\System\BackupSettings;

use spkm\FortiNac\Data\System\BackupSettingsArchives;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured database archive settings: GET /system/backup-settings/archives.
 */
class GetBackupSettingsArchivesRequest extends ItemRequest
{
    protected ?string $dto = BackupSettingsArchives::class;

    public function resolveEndpoint(): string
    {
        return '/system/backup-settings/archives';
    }
}
