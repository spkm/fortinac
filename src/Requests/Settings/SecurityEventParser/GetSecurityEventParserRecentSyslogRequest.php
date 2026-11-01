<?php

namespace spkm\FortiNac\Requests\Settings\SecurityEventParser;

use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns several recently received syslog messages in pairs of source IP and message text: GET /settings/integration/security-event-parser/recent-syslog.
 */
class GetSecurityEventParserRecentSyslogRequest extends ListRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/security-event-parser/recent-syslog';
    }
}
