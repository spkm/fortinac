<?php

namespace spkm\FortiNac\Resources\Radius;

use spkm\FortiNac\Data\Radius\RadiusDictionaryAttribute;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute\CreateRadiusDictionaryAttributeRequest;
use spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute\DeleteManyRadiusDictionaryAttributesRequest;
use spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute\DeleteRadiusDictionaryAttributeRequest;
use spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute\GetRadiusDictionaryAttributeAttributeByNameRequest;
use spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute\GetRadiusDictionaryAttributesRequest;
use spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute\UpdateRadiusDictionaryAttributeRequest;

/**
 * Radius Dictionary Configuration, from FortiNac::radius()->dictionary().
 *
 * @extends Builder<RadiusDictionaryAttribute>
 */
class RadiusDictionaryAttributeResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, RadiusDictionaryAttribute::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRadiusDictionaryAttributesRequest($query);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateRadiusDictionaryAttributeRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateRadiusDictionaryAttributeRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteRadiusDictionaryAttributeRequest((int) $id, $options);
    }

    /**
     * Get the RADIUS dictinoary entry of the specified name: GET /radius/dictionary/attribute/{name}.
     */
    public function attributeByName(string $name): ?RadiusDictionaryAttribute
    {
        return $this->fetchOrNull(new GetRadiusDictionaryAttributeAttributeByNameRequest($name));
    }

    /**
     * Delete multiple user-defined RADIUS dictionary entries by ID: POST /radius/dictionary/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyRadiusDictionaryAttributesRequest(['id' => $ids]));
    }
}
