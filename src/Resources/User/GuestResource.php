<?php

namespace spkm\FortiNac\Resources\User;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\User\Guest;
use spkm\FortiNac\Data\User\GuestConferenceRegistrationsCount;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\User\Guest\CountAllGuestsRequest;
use spkm\FortiNac\Requests\User\Guest\CountGuestsRequest;
use spkm\FortiNac\Requests\User\Guest\CreateGuestRequest;
use spkm\FortiNac\Requests\User\Guest\DeleteGuestRequest;
use spkm\FortiNac\Requests\User\Guest\DeleteGuestViaPostRequest;
use spkm\FortiNac\Requests\User\Guest\DeleteManyGuestsRequest;
use spkm\FortiNac\Requests\User\Guest\DisableGuestRequest;
use spkm\FortiNac\Requests\User\Guest\EnableGuestRequest;
use spkm\FortiNac\Requests\User\Guest\GenerateGuestPasswordFromTemplateRequest;
use spkm\FortiNac\Requests\User\Guest\GenerateGuestPasswordRequest;
use spkm\FortiNac\Requests\User\Guest\GetGuestConferenceRegistrationsCountRequest;
use spkm\FortiNac\Requests\User\Guest\GetGuestGetPasswordRequest;
use spkm\FortiNac\Requests\User\Guest\GetGuestPasswordRequest;
use spkm\FortiNac\Requests\User\Guest\GetGuestRequest;
use spkm\FortiNac\Requests\User\Guest\GetGuestsRequest;
use spkm\FortiNac\Requests\User\Guest\PostGuestBulkRequest;
use spkm\FortiNac\Requests\User\Guest\PostGuestConferenceRequest;
use spkm\FortiNac\Requests\User\Guest\ResetGuestPasswordRequest;
use spkm\FortiNac\Requests\User\Guest\SendGuestEmailRequest;
use spkm\FortiNac\Requests\User\Guest\SendGuestSmsRequest;
use spkm\FortiNac\Requests\User\Guest\UpdateGuestRequest;

/**
 * Guest Account, from FortiNac::user()->guests().
 *
 * @extends Builder<Guest>
 */
class GuestResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Guest::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetGuestsRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountGuestsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetGuestRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateGuestRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateGuestRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteGuestRequest($this->intId($id), $options);
    }

    /**
     * Returns the number of registered attendees for the conferences which match the supplied filter: GET /user/guest/conference/registrations/count.
     *
     * @param  array<string, mixed>  $options  Query options: filter, start, count, sortKey, sortDir
     */
    public function conferenceRegistrationsCount(array $options = []): ?GuestConferenceRegistrationsCount
    {
        return $this->fetchOrNull(new GetGuestConferenceRegistrationsCountRequest($options));
    }

    /**
     * Returns the count of all guest account records in the database: GET /user/guest/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllGuestsRequest);
    }

    /**
     * Gets the password from the guest record using the provided record id, if possible: GET /user/guest/{id}/get-password.
     */
    public function getPassword(int $id): mixed
    {
        return $this->fetch(new GetGuestGetPasswordRequest($id));
    }

    /**
     * Creates one or more guest accounts in a single request, each using the same guest template. The template may be provided by either name or ID: POST /user/guest/bulk.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function bulk(array|Data $attributes = [], array $options = []): ?Guest
    {
        return $this->fetch(new PostGuestBulkRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Deletes the guest account record supplied, if it is not currently in use: POST /user/guest/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteGuestViaPostRequest($id, $options));
    }

    /**
     * Generates a new password compliant with the guest template using the provided template Id: POST /user/guest/generate-password-from-template.
     *
     * @param  array<string, mixed>  $options  Query options: templateID
     */
    public function generatePasswordFromTemplate(array $options = []): mixed
    {
        return $this->fetch(new GenerateGuestPasswordFromTemplateRequest($options));
    }

    /**
     * Disables the supplied guest account: POST /user/guest/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableGuestRequest($id, $options));
    }

    /**
     * Generates a new password using the template associated with the guest record, but does not modify that guest record: POST /user/guest/{id}/generate-password.
     *
     * @param  array<string, mixed>  $options
     */
    public function generatePassword(int $id, array $options = []): mixed
    {
        return $this->fetch(new GenerateGuestPasswordRequest($id, $options));
    }

    /**
     * Deletes the guest account record or records supplied, if they are none are currently in use: POST /user/guest/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyGuestsRequest(['id' => $ids]));
    }

    /**
     * Enables the supplied guest account: POST /user/guest/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableGuestRequest($id, $options));
    }

    /**
     * Gets the password from the guest record using the provided record id, if possible: POST /user/guest/get-password.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function getPassword2(array $options = []): mixed
    {
        return $this->fetch(new GetGuestPasswordRequest($options));
    }

    /**
     * Resets the password for one or more guest accounts: POST /user/guest/reset-password.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function resetPassword(array $options = []): mixed
    {
        return $this->fetch(new ResetGuestPasswordRequest($options));
    }

    /**
     * Sends an email to one or more email addresses associated with the supplied guest account ids: POST /user/guest/send-email.
     *
     * @param  array<string, mixed>  $options  Query options: id, messageTemplate
     */
    public function sendEmail(array $options = []): bool
    {
        return $this->perform(new SendGuestEmailRequest($options));
    }

    /**
     * Creates a conference account and any subsequent guest accounts: POST /user/guest/conference.
     *
     * @param  array<string, mixed>  $options  Query options: type, attendeeCount, startTime, endTime, templateID, password
     */
    public function conference(array $options = []): bool
    {
        return $this->perform(new PostGuestConferenceRequest($options));
    }

    /**
     * Sends a SMS to one ore more mobile numbers associated with the supplied guest account ids: POST /user/guest/send-sms.
     *
     * @param  array<string, mixed>  $options  Query options: id, messageTemplate
     */
    public function sendSms(array $options = []): bool
    {
        return $this->perform(new SendGuestSmsRequest($options));
    }
}
