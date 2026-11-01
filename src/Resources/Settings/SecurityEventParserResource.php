<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Settings\SecurityEventParser;
use spkm\FortiNac\Data\Settings\SecurityEventParserParseSecurityEventParserMessage;
use spkm\FortiNac\Data\Settings\SecurityEventParserTestSecurityEventParser;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\CreateSecurityEventParserRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\DeleteManySecurityEventParsersRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\DeleteSecurityEventParserRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\DeleteSecurityEventParserViaPostRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\DisableManySecurityEventParsersRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\EnableManySecurityEventParsersRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\GetSecurityEventParserRecentSyslogRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\GetSecurityEventParserRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\GetSecurityEventParsersRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\GetSecurityEventParserUsageRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\ParseSecurityEventParserMessageRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\TestSecurityEventParserRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\UpdateSecurityEventParserRequest;

/**
 * Security Event Parser, from FortiNac::settings()->securityEventParsers().
 *
 * @extends Builder<SecurityEventParser>
 */
class SecurityEventParserResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, SecurityEventParser::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSecurityEventParsersRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetSecurityEventParserRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateSecurityEventParserRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateSecurityEventParserRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteSecurityEventParserRequest((int) $id, $options);
    }

    /**
     * Returns several recently received syslog messages in pairs of source IP and message text: GET /settings/integration/security-event-parser/recent-syslog.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function recentSyslog(Query|array $query = []): Collection
    {
        return $this->fetch(new GetSecurityEventParserRecentSyslogRequest($query));
    }

    /**
     * Returns a list of records that reference this Security Event Parser record: GET /settings/integration/security-event-parser/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetSecurityEventParserUsageRequest($id, $query));
    }

    /**
     * Deletes a list of Security Event Parser records supplied under the id parameter: POST /settings/integration/security-event-parser/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManySecurityEventParsersRequest(['id' => $ids]));
    }

    /**
     * Disables the supplied Security Event Parser: POST /settings/integration/security-event-parser/disable.
     *
     * @param  list<int|string>  $ids
     */
    public function disableMany(array $ids): bool
    {
        return $this->perform(new DisableManySecurityEventParsersRequest(['id' => $ids]));
    }

    /**
     * Attempts to parse a message using the supplied format and delimiters. On a successful parse of a message, the name/value pairs are returned for the user to use when building a parser: POST /settings/integration/security-event-parser/parse-message.
     *
     * @param  array<string, mixed>  $options  Query options: message, format, delimiter, tagDelimiter
     */
    public function parseMessage(array $options = []): ?SecurityEventParserParseSecurityEventParserMessage
    {
        return $this->fetch(new ParseSecurityEventParserMessageRequest($options));
    }

    /**
     * Deletes a single Security Event Parser record by ID: POST /settings/integration/security-event-parser/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteSecurityEventParserViaPostRequest($id, $options));
    }

    /**
     * Tests parsing a text value into a Security Event, including debug information from the parsing process: POST /settings/integration/security-event-parser/{id}/test.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function test(int $id, array|Data $attributes = [], array $options = []): ?SecurityEventParserTestSecurityEventParser
    {
        return $this->fetch(new TestSecurityEventParserRequest($id, $this->payloadOf($attributes), $options));
    }

    /**
     * Enables the supplied Security Event Parser: POST /settings/integration/security-event-parser/enable.
     *
     * @param  list<int|string>  $ids
     */
    public function enableMany(array $ids): bool
    {
        return $this->perform(new EnableManySecurityEventParsersRequest(['id' => $ids]));
    }
}
