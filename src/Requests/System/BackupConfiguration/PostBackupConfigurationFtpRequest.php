<?php

namespace spkm\FortiNac\Requests\System\BackupConfiguration;

use spkm\FortiNac\Data\System\BackupConfigurationFtp;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Returns the FTP remote backup configuration settings: POST /system/backup/configuration/ftp.
 */
class PostBackupConfigurationFtpRequest extends WriteRequest
{
    protected ?string $dto = BackupConfigurationFtp::class;

    public function resolveEndpoint(): string
    {
        return '/system/backup/configuration/ftp';
    }
}
