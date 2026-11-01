<?php

namespace spkm\FortiNac\Requests\Settings\SyslogServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single syslog parser record by ID: POST /settings/integration/syslog/{id}/delete.
 */
class DeleteSyslogServerViaPostRequest extends ActionRequest
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
        return '/settings/integration/syslog/'.$this->id.'/delete';
    }
}
