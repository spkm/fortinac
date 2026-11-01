<?php

namespace spkm\FortiNac\Requests\Settings\MdmServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Tests connection with the MDM server, but does not update or synchronize: POST /settings/integration/mdm/{id}/test.
 */
class TestMdmServerRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/mdm/'.$this->id.'/test';
    }
}
