<?php

namespace spkm\FortiNac\Requests\System\BackupConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the FTP remote backup configuration settings: GET /system/backup/configuration/ftp.
 */
class GetBackupConfigurationFtpRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/backup/configuration/ftp';
    }
}
