<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Settings\AaaServer;
use spkm\FortiNac\Data\Settings\AaaServerValidateAaaServer;
use spkm\FortiNac\Data\Settings\AaaServerValidateById;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\CountAaaServersRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\CountAllAaaServersRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\CreateAaaServerRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\DeleteAaaServerRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\DeleteAaaServerViaPostRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\DeleteManyAaaServersRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServerRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServerSecretRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServersRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServerSupportsValidationRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServerUsageRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServerValidateByIdRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServerValidateUserPasswordRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\UpdateAaaServerRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\ValidateAaaServerRequest;

/**
 * AAA Server, from FortiNac::settings()->aaaServers().
 *
 * @extends Builder<AaaServer>
 */
class AaaServerResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, AaaServer::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAaaServersRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountAaaServersRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetAaaServerRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateAaaServerRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateAaaServerRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteAaaServerRequest((int) $id, $options);
    }

    /**
     * Returns the count of all AAA Server records in the database that match the provided filter: GET /settings/integration/aaa/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllAaaServersRequest);
    }

    /**
     * Returns the secret stored for the AAA server: GET /settings/integration/aaa/{id}/secret.
     */
    public function secret(int $id): mixed
    {
        return $this->fetch(new GetAaaServerSecretRequest($id));
    }

    /**
     * Returns false when legacy proxy radius is no longer supported and thus the validation user/pwd entry is no longer applicable on a proxy server config: GET /settings/integration/aaa/supportsValidation.
     */
    public function supportsValidation(): mixed
    {
        return $this->fetch(new GetAaaServerSupportsValidationRequest);
    }

    /**
     * Returns a list of records that reference this AAA Server record: GET /settings/integration/aaa/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetAaaServerUsageRequest($id, $query));
    }

    /**
     * Returns the password stored for the Validation Account user: GET /settings/integration/aaa/{id}/validate-user-password.
     */
    public function validateUserPassword(int $id): mixed
    {
        return $this->fetch(new GetAaaServerValidateUserPasswordRequest($id));
    }

    /**
     * Validate connectivity to the AAA server matching the specified ID: GET /settings/integration/aaa/validate/{id}.
     */
    public function validateById(int $id): ?AaaServerValidateById
    {
        return $this->fetchOrNull(new GetAaaServerValidateByIdRequest($id));
    }

    /**
     * Deletes the AAA Server record or records supplied, if they are not currently in use: POST /settings/integration/aaa/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyAaaServersRequest(['id' => $ids]));
    }

    /**
     * Deletes the AAA server record supplied, if it is not currently in use: POST /settings/integration/aaa/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteAaaServerViaPostRequest($id, $options));
    }

    /**
     * Validate connectivity to the specified AAA server config: POST /settings/integration/aaa/validate.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function validate(array|Data $attributes = [], array $options = []): ?AaaServerValidateAaaServer
    {
        return $this->fetch(new ValidateAaaServerRequest($this->payloadOf($attributes), $options));
    }
}
