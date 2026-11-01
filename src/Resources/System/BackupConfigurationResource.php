<?php

namespace spkm\FortiNac\Resources\System;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\System\BackupConfigurationFtp;
use spkm\FortiNac\Data\System\BackupConfigurationSftp;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\System\BackupConfiguration\GetBackupConfigurationFtpRequest;
use spkm\FortiNac\Requests\System\BackupConfiguration\GetBackupConfigurationSftpRequest;
use spkm\FortiNac\Requests\System\BackupConfiguration\GetBackupConfigurationSshRequest;
use spkm\FortiNac\Requests\System\BackupConfiguration\PostBackupConfigurationFtpRequest;
use spkm\FortiNac\Requests\System\BackupConfiguration\PostBackupConfigurationSftpRequest;
use spkm\FortiNac\Requests\System\BackupConfiguration\PostBackupConfigurationSshRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Backup Configuration, from FortiNac::system()->backupConfiguration().
 *
 * @extends BaseResource<Data>
 */
class BackupConfigurationResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns the FTP remote backup configuration settings: GET /system/backup/configuration/ftp.
     */
    public function ftp(): bool
    {
        return $this->perform(new GetBackupConfigurationFtpRequest);
    }

    /**
     * Returns the SFTP remote backup configuration settings: GET /system/backup/configuration/sftp.
     */
    public function sftp(): bool
    {
        return $this->perform(new GetBackupConfigurationSftpRequest);
    }

    /**
     * Returns the SSH remote backup configuration settings: GET /system/backup/configuration/ssh.
     */
    public function ssh(): bool
    {
        return $this->perform(new GetBackupConfigurationSshRequest);
    }

    /**
     * Returns the FTP remote backup configuration settings: POST /system/backup/configuration/ftp.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function ftp2(array|Data $attributes = [], array $options = []): ?BackupConfigurationFtp
    {
        return $this->fetch(new PostBackupConfigurationFtpRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Returns the SFTP remote backup configuration settings: POST /system/backup/configuration/sftp.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function sftp2(array|Data $attributes = [], array $options = []): ?BackupConfigurationSftp
    {
        return $this->fetch(new PostBackupConfigurationSftpRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Returns the SSH remote backup configuration settings: POST /system/backup/configuration/ssh.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function ssh2(array|Data $attributes = [], array $options = []): ?BackupConfigurationSftp
    {
        return $this->fetch(new PostBackupConfigurationSshRequest($this->payloadOf($attributes), $options));
    }
}
