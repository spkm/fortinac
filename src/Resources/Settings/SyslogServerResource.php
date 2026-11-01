<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\SyslogServer;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\CreateSyslogServerRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\DeleteManySyslogServersRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\DeleteSyslogServerRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\DeleteSyslogServerViaPostRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\DisableSyslogServerRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\EnableSyslogServerRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\GetSyslogServerRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\GetSyslogServersRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\GetSyslogServerUsageRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\UpdateSyslogServerRequest;

/**
 * Syslog, from FortiNac::settings()->syslog().
 *
 * @extends Builder<SyslogServer>
 */
class SyslogServerResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, SyslogServer::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSyslogServersRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetSyslogServerRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateSyslogServerRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateSyslogServerRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteSyslogServerRequest($this->intId($id), $options);
    }

    /**
     * Returns a list of record that reference this syslog parser record: GET /settings/integration/syslog/{id}/usage.
     */
    public function usage(int $id): mixed
    {
        return $this->fetch(new GetSyslogServerUsageRequest($id));
    }

    /**
     * Deletes a list of syslog parser records supplied under the id parameter: POST /settings/integration/syslog/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManySyslogServersRequest(['id' => $ids]));
    }

    /**
     * Disables the syslog parser, allowing it to process Syslog messages: POST /settings/integration/syslog/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableSyslogServerRequest($id, $options));
    }

    /**
     * Enable the single syslog parser, allowing it to process Syslog messages: POST /settings/integration/syslog/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableSyslogServerRequest($id, $options));
    }

    /**
     * Deletes a single syslog parser record by ID: POST /settings/integration/syslog/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteSyslogServerViaPostRequest($id, $options));
    }
}
