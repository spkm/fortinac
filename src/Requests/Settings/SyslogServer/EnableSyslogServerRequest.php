<?php

namespace spkm\FortiNac\Requests\Settings\SyslogServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enable the single syslog parser, allowing it to process Syslog messages: POST /settings/integration/syslog/{id}/enable.
 */
class EnableSyslogServerRequest extends ActionRequest
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
        return '/settings/integration/syslog/'.$this->id.'/enable';
    }
}
