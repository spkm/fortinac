<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the global option value for the specified global option key: GET /system/local-properties/globaloption/{param}.
 */
class GetLocalPropertiesGlobaloptionByParamRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function __construct(protected string $param) {}

    public function resolveEndpoint(): string
    {
        return '/system/local-properties/globaloption/'.rawurlencode($this->param);
    }
}
