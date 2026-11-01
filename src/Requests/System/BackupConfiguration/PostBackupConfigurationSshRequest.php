<?php

namespace spkm\FortiNac\Requests\System\BackupConfiguration;

use spkm\FortiNac\Data\System\BackupConfigurationSftp;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Returns the SSH remote backup configuration settings: POST /system/backup/configuration/ssh.
 */
class PostBackupConfigurationSshRequest extends WriteRequest
{
    protected ?string $dto = BackupConfigurationSftp::class;

    public function resolveEndpoint(): string
    {
        return '/system/backup/configuration/ssh';
    }
}
