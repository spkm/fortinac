<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\MdmServer;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\AuthenticateMdmServerRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\CreateMdmServerRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\DeleteManyMdmServersRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\DeleteMdmServerRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\DeleteMdmServerViaPostRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\GetMdmServerPasswordRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\GetMdmServerRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\GetMdmServersRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\GetMdmServerUsageRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\PollMdmServerRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\TestMdmServerRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\UpdateMdmServerRequest;

/**
 * MDM, from FortiNac::settings()->mdm().
 *
 * @extends Builder<MdmServer>
 */
class MdmServerResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, MdmServer::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetMdmServersRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetMdmServerRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateMdmServerRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateMdmServerRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteMdmServerRequest((int) $id, $options);
    }

    /**
     * Returns the configured password used to communicate with the MDM server: GET /settings/integration/mdm/{id}/password.
     */
    public function password(int $id): mixed
    {
        return $this->fetch(new GetMdmServerPasswordRequest($id));
    }

    /**
     * Returns a list of records that reference this MDM record: GET /settings/integration/mdm/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetMdmServerUsageRequest($id, $query));
    }

    /**
     * Deletes a list of MDM records supplied under the id parameter: POST /settings/integration/mdm/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyMdmServersRequest(['ids' => $ids]));
    }

    /**
     * Authenticates against an MDM server and returns the refresh token. This is not required for all vendors: POST /settings/integration/mdm/authenticate.
     *
     * @param  array<string, mixed>  $options  Query options: mdmVendor, applicationID, identifier, appAccessKey, appRequest, appVersion, platformID, authCode
     */
    public function authenticate(array $options = []): bool
    {
        return $this->perform(new AuthenticateMdmServerRequest($options));
    }

    /**
     * Deletes a single MDM record by ID: POST /settings/integration/mdm/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteMdmServerViaPostRequest($id, $options));
    }

    /**
     * Polls and resynchronizes with an MDM service: POST /settings/integration/mdm/{id}/poll.
     *
     * @param  array<string, mixed>  $options
     */
    public function poll(int $id, array $options = []): bool
    {
        return $this->perform(new PollMdmServerRequest($id, $options));
    }

    /**
     * Tests connection with the MDM server, but does not update or synchronize: POST /settings/integration/mdm/{id}/test.
     *
     * @param  array<string, mixed>  $options
     */
    public function test(int $id, array $options = []): bool
    {
        return $this->perform(new TestMdmServerRequest($id, $options));
    }
}
