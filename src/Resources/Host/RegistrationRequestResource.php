<?php

namespace spkm\FortiNac\Resources\Host;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Host\RegistrationRequest;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\ApproveRegistrationRequestRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\DeleteManyRegistrationRequestsRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\DeleteRegistrationRequestRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\DeleteRegistrationRequestViaPostRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\DenyRegistrationRequestRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\GetRegistrationRequestRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\GetRegistrationRequestsRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Host Registration Request, from FortiNac::host()->registrationRequests().
 *
 * @extends Builder<RegistrationRequest>
 */
class RegistrationRequestResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, RegistrationRequest::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRegistrationRequestsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetRegistrationRequestRequest((int) $id);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteRegistrationRequestRequest((int) $id, $options);
    }

    /**
     * Denies one or more Host Registration requests. Requests must be pending to be denied: POST /host/registration-request/deny.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deny(array|Data $attributes = [], array $options = []): bool
    {
        return $this->perform(new DenyRegistrationRequestRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Deletes a single Host Registration Request record by ID: POST /host/registration-request/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteRegistrationRequestViaPostRequest($id, $options));
    }

    /**
     * Deletes a list of Host Registration Request records supplied under the id parameter: POST /host/registration-request/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyRegistrationRequestsRequest(['id' => $ids]));
    }

    /**
     * Approves one or more Host Registration requests. Requests must be pending to be approved: POST /host/registration-request/approve.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function approve(array|Data $attributes = [], array $options = []): bool
    {
        return $this->perform(new ApproveRegistrationRequestRequest($this->payloadOf($attributes), $options));
    }
}
