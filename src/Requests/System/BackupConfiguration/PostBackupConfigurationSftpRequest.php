<?php

namespace spkm\FortiNac\Requests\System\BackupConfiguration;

use spkm\FortiNac\Data\System\BackupConfigurationSftp;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Returns the SFTP remote backup configuration settings: POST /system/backup/configuration/sftp.
 */
class PostBackupConfigurationSftpRequest extends WriteRequest
{
    protected ?string $dto = BackupConfigurationSftp::class;

    public function resolveEndpoint(): string
    {
        return '/system/backup/configuration/sftp';
    }
}
