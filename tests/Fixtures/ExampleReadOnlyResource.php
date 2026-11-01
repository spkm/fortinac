<?php

namespace spkm\FortiNac\Tests\Fixtures;

use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\ListRequest;

/**
 * A resource FortiNAC only lists: no count, item, create, update or delete.
 *
 * @extends Builder<ExampleData>
 */
class ExampleReadOnlyResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, ExampleData::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ExampleListRequest($query);
    }
}
