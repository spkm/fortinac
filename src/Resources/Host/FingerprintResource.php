<?php

namespace spkm\FortiNac\Resources\Host;

use spkm\FortiNac\Data\Host\Fingerprint;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\CountAllFingerprintsRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\CountFingerprintsRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\CreateFingerprintRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\DeleteFingerprintRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\DeleteFingerprintViaPostRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\DeleteManyFingerprintsRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\GetFingerprintRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\GetFingerprintsRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\UpdateFingerprintRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * FingerPrint, from FortiNac::host()->fingerprints().
 *
 * @extends Builder<Fingerprint>
 */
class FingerprintResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Fingerprint::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetFingerprintsRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountFingerprintsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetFingerprintRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateFingerprintRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateFingerprintRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteFingerprintRequest((int) $id, $options);
    }

    /**
     * Returns the count of all Fingerprint records in the database: GET /host/fingerprint/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllFingerprintsRequest);
    }

    /**
     * Delete a list of Fingerprint records supplied under the id parameter: POST /host/fingerprint/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyFingerprintsRequest(['id' => $ids]));
    }

    /**
     * Delete a single Fingerprint record by ID: POST /host/fingerprint/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteFingerprintViaPostRequest($id, $options));
    }
}
