<?php

namespace spkm\FortiNac\Resources\User;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\User\GuestTemplate;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\CountAllGuestTemplatesRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\CountGuestTemplatesRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\CreateGuestTemplateRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\DeleteGuestTemplateRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\DeleteGuestTemplateViaPostRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\DeleteManyGuestTemplatesRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\GetGuestTemplateRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\GetGuestTemplateResolveIpRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\GetGuestTemplatesRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\GetGuestTemplateUsageRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\UpdateGuestTemplateRequest;

/**
 * GuestTemplate, from FortiNac::user()->guestTemplates().
 *
 * @extends Builder<GuestTemplate>
 */
class GuestTemplateResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, GuestTemplate::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetGuestTemplatesRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountGuestTemplatesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetGuestTemplateRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateGuestTemplateRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateGuestTemplateRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteGuestTemplateRequest((int) $id, $options);
    }

    /**
     * Returns the count of all guest template records in the database: GET /user/guest-template/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllGuestTemplatesRequest);
    }

    /**
     * Returns a list of guest template records that reference this record: GET /user/guest-template/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetGuestTemplateUsageRequest($id, $query));
    }

    /**
     * Resolves an IP address from a supplied URL or hostname: GET /user/guest-template/resolve-ip.
     *
     * @param  array<string, mixed>  $options  Query options: url
     */
    public function resolveIp(array $options = []): mixed
    {
        return $this->fetch(new GetGuestTemplateResolveIpRequest($options));
    }

    /**
     * Deletes the guest template record or records supplied, if they are none are currently in use: POST /user/guest-template/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyGuestTemplatesRequest(['id' => $ids]));
    }

    /**
     * Deletes the guest template record supplied, if it is not currently in use: POST /user/guest-template/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteGuestTemplateViaPostRequest($id, $options));
    }
}
