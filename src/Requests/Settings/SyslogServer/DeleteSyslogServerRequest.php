<?php

namespace spkm\FortiNac\Requests\Settings\SyslogServer;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single syslog parser record by ID: DELETE /settings/integration/syslog/{id}.
 */
class DeleteSyslogServerRequest extends DeleteRequest
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
        return '/settings/integration/syslog/'.$this->id;
    }
}
