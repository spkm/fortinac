<?php

namespace spkm\FortiNac\Resources\Winbind;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Winbind\WinbindConfig;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\CreateWinbindConfigRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\DeleteManyWinbindConfigsRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\DeleteWinbindConfigRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\DisableManyWinbindConfigsRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\EnableManyWinbindConfigsRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\GetWinbindConfigAllRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\GetWinbindConfigGlobalRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\GetWinbindConfigRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\GetWinbindConfigsRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\GetWinbindConfigStatusRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\JoinWinbindConfigDomainByIdRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\PostWinbindConfigLogRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\UpdateWinbindConfigRequest;

/**
 * Winbind Configuration, from FortiNac::winbind().
 *
 * @extends Builder<WinbindConfig>
 */
class WinbindConfigResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, WinbindConfig::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetWinbindConfigsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetWinbindConfigRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateWinbindConfigRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateWinbindConfigRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteWinbindConfigRequest($this->intId($id), $options);
    }

    /**
     * Returns all Winbind configuration objects: GET /winbind/config/all.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, WinbindConfig>
     */
    public function getWinbindConfigAll(Query|array $query = []): Collection
    {
        return $this->fetch(new GetWinbindConfigAllRequest($query));
    }

    /**
     * Retrieves the global Winbind service data. (currently status & default local netbios name): GET /winbind/config/global.
     */
    public function global(): mixed
    {
        return $this->fetch(new GetWinbindConfigGlobalRequest);
    }

    /**
     * Retrieves the current Winbind service log (/var/log/samba/log.winbind): POST /winbind/config/log.
     *
     * @param  array<string, mixed>  $options  Query options: lines
     */
    public function log(array $options = []): bool
    {
        return $this->perform(new PostWinbindConfigLogRequest($options));
    }

    /**
     * Retrieves the current status for the Winbind service: GET /winbind/config/status.
     */
    public function status(): mixed
    {
        return $this->fetch(new GetWinbindConfigStatusRequest);
    }

    /**
     * Deletes multiple winbind configuration objects by ID: POST /winbind/config/delete.
     *
     * @param  array<string, mixed>  $options  Query options: id, replaceWinbindId
     */
    public function deleteMany(array $options = []): bool
    {
        return $this->perform(new DeleteManyWinbindConfigsRequest($options));
    }

    /**
     * Disables the Winbind service for the system: POST /winbind/config/disable.
     *
     * @param  list<int|string>  $ids
     */
    public function disableMany(array $ids): bool
    {
        return $this->perform(new DisableManyWinbindConfigsRequest(['id' => $ids]));
    }

    /**
     * Enables the Winbind service for the system: POST /winbind/config/enable.
     *
     * @param  list<int|string>  $ids
     */
    public function enableMany(array $ids): bool
    {
        return $this->perform(new EnableManyWinbindConfigsRequest(['id' => $ids]));
    }

    /**
     * Joins the domain for the Winbind instance specified by id: POST /winbind/config/joinDomain/{id}.
     *
     * @param  array<string, mixed>  $options  Query options: username, password
     */
    public function joinDomainById(int $id, array $options = []): bool
    {
        return $this->perform(new JoinWinbindConfigDomainByIdRequest($id, $options));
    }
}
