<?php

namespace spkm\FortiNac\Requests\Settings\MessageTemplate;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Reviews the supplied Message Template with the supplied context: POST /settings/integration/message-template/test.
 */
class TestMessageTemplateRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/message-template/test';
    }
}
