<?php

namespace spkm\FortiNac\Requests\Settings\SyslogServer;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\SyslogServer;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an syslog parser record: POST /settings/integration/syslog/{id}.
 */
class UpdateSyslogServerRequest extends WriteRequest
{
    protected ?string $dto = SyslogServer::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/syslog/'.$this->id;
    }
}
