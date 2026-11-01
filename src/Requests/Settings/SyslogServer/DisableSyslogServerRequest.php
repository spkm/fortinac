<?php

namespace spkm\FortiNac\Requests\Settings\SyslogServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the syslog parser, allowing it to process Syslog messages: POST /settings/integration/syslog/{id}/disable.
 */
class DisableSyslogServerRequest extends ActionRequest
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
        return '/settings/integration/syslog/'.$this->id.'/disable';
    }
}
