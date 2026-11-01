<?php

namespace spkm\FortiNac\Resources\User;

use spkm\FortiNac\Data\User\SelfRegistration;
use spkm\FortiNac\Data\User\SelfRegistrationDetails;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\ApproveSelfRegistrationRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\CountAllSelfRegistrationsRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\CountSelfRegistrationsRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\GetSelfRegistrationDenyRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\GetSelfRegistrationDetailsRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\GetSelfRegistrationRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\GetSelfRegistrationsRequest;

/**
 * Self Registration, from FortiNac::user()->selfRegistrations().
 *
 * @extends Builder<SelfRegistration>
 */
class SelfRegistrationResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, SelfRegistration::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSelfRegistrationsRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountSelfRegistrationsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetSelfRegistrationRequest((int) $id);
    }

    /**
     * Returns the supplied guest account details for the self registration request: GET /user/guest-self-registration/{id}/details.
     */
    public function details(int $id): ?SelfRegistrationDetails
    {
        return $this->fetchOrNull(new GetSelfRegistrationDetailsRequest($id));
    }

    /**
     * Returns a count of all self registration requests in the database: GET /user/guest-self-registration/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllSelfRegistrationsRequest);
    }

    /**
     * Denies a self registration request, supplying a message back to the user: GET /user/guest-self-registration/{id}/deny.
     *
     * @param  array<string, mixed>  $options  Query options: guestMessage, requestKey
     */
    public function deny(int $id, array $options = []): mixed
    {
        return $this->fetch(new GetSelfRegistrationDenyRequest($id, $options));
    }

    /**
     * Approves a self registration request, supplying a message back to the user: POST /user/guest-self-registration/{id}/approve.
     *
     * @param  array<string, mixed>  $options  Query options: guestMessage, requestKey
     */
    public function approve(int $id, array $options = []): bool
    {
        return $this->perform(new ApproveSelfRegistrationRequest($id, $options));
    }
}
