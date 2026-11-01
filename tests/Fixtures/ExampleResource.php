<?php

namespace spkm\FortiNac\Tests\Fixtures;

use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * @extends Builder<ExampleData>
 */
class ExampleResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, ExampleData::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ExampleListRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new ExampleCountRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new ExampleItemRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new ExampleCreateRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new ExampleUpdateRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new ExampleDeleteRequest((int) $id, $options);
    }

    public function findByMac(string $mac): ?ExampleData
    {
        return $this->fetchOrNull(new ExampleByMacRequest($mac));
    }

    /**
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): ?ExampleData
    {
        return $this->fetch(new ExampleEnableRequest($id, $options));
    }

    /**
     * @param  list<int>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new ExampleDeleteManyRequest($ids));
    }
}
