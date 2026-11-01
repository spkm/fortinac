<?php

namespace spkm\FortiNac\Resources\User;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\User\UserAttribute\GetUserAttributeRequest;
use spkm\FortiNac\Requests\User\UserAttribute\GetUserAttributeUserByNameRequest;
use spkm\FortiNac\Requests\User\UserAttribute\PostUserAttributeUserByNameRequest;
use spkm\FortiNac\Requests\User\UserAttribute\UpdateUserAttributeRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * User, from FortiNac::user()->attributes().
 *
 * @extends BaseResource<Data>
 */
class UserAttributeResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns the value currently stored for the requested attribute on the API user: GET /user/attributes/{name}.
     */
    public function find(string $name): mixed
    {
        return $this->fetch(new GetUserAttributeRequest($name));
    }

    /**
     * Returns the value currently stored for the requested attribute on the API user: GET /user/attributes/user/{name}.
     *
     * @param  array<string, mixed>  $options  Query options: userID
     */
    public function userByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new GetUserAttributeUserByNameRequest($name, $options));
    }

    /**
     * Sets the value currently stored for the requested attribute on the API user: POST /user/attributes/{name}.
     *
     * @param  array<string, mixed>  $options  Query options: value
     */
    public function update(string $name, array $options = []): bool
    {
        return $this->perform(new UpdateUserAttributeRequest($name, $options));
    }

    /**
     * Sets the value currently stored for the requested attribute on the target user: POST /user/attributes/user/{name}.
     *
     * @param  array<string, mixed>  $options  Query options: userID, value
     */
    public function userByName2(string $name, array $options = []): bool
    {
        return $this->perform(new PostUserAttributeUserByNameRequest($name, $options));
    }
}
