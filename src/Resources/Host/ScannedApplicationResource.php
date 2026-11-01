<?php

namespace spkm\FortiNac\Resources\Host;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Host\ScannedApplication;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\DeleteManyScannedApplicationsRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\DeleteScannedApplicationRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\DeleteScannedApplicationViaPostRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\GetScannedApplicationForHostRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\GetScannedApplicationRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\GetScannedApplicationsRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\GetScannedApplicationUsageRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\PostScannedApplicationThreatRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Scanned Application, from FortiNac::host()->scannedApplications().
 *
 * @extends Builder<ScannedApplication>
 */
class ScannedApplicationResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, ScannedApplication::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetScannedApplicationsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetScannedApplicationRequest($this->intId($id));
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteScannedApplicationRequest($this->intId($id), $options);
    }

    /**
     * Returns all Scanned Application that exist on the supplied filter: GET /host/scanned-application/for-host.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, ScannedApplication>
     */
    public function forHost(Query|array $query = []): Collection
    {
        return $this->fetch(new GetScannedApplicationForHostRequest($query));
    }

    /**
     * Returns a list of records that reference this Scanned Application record: GET /host/scanned-application/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetScannedApplicationUsageRequest($id, $query));
    }

    /**
     * Deletes a list of Scanned Application records with the supplied database ids: POST /host/scanned-application/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyScannedApplicationsRequest(['id' => $ids]));
    }

    /**
     * Sets the Threat Level override for a Scanned Application, allowing it to be marked safe or unsafe: POST /host/scanned-application/threat.
     *
     * @param  array<string, mixed>  $options  Query options: override, appID
     */
    public function threat(array $options = []): bool
    {
        return $this->perform(new PostScannedApplicationThreatRequest($options));
    }

    /**
     * Deletes a single Scanned Application records by ID: POST /host/scanned-application/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteScannedApplicationViaPostRequest($id, $options));
    }
}
