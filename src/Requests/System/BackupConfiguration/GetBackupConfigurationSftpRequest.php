<?php

namespace spkm\FortiNac\Requests\System\BackupConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the SFTP remote backup configuration settings: GET /system/backup/configuration/sftp.
 */
class GetBackupConfigurationSftpRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/backup/configuration/sftp';
    }
}
