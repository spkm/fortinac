<?php

namespace spkm\FortiNac\Requests\System\BackupConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the SSH remote backup configuration settings: GET /system/backup/configuration/ssh.
 */
class GetBackupConfigurationSshRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/backup/configuration/ssh';
    }
}
