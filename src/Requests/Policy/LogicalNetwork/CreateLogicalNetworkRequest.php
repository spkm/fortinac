<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetwork;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new record, updating instead if the supplied profile has a DBID of one that already exists: POST /policy/logical-network.
 */
class CreateLogicalNetworkRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/policy/logical-network';
    }
}
