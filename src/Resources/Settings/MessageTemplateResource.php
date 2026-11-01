<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Settings\MessageTemplate;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\CreateMessageTemplateRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\DeleteManyMessageTemplatesRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\DeleteMessageTemplateRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\DeleteMessageTemplateViaPostRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\GetMessageTemplateRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\GetMessageTemplatesRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\GetMessageTemplateUsageRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\TestMessageTemplateRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\UpdateMessageTemplateRequest;

/**
 * Message Template, from FortiNac::settings()->messageTemplates().
 *
 * @extends Builder<MessageTemplate>
 */
class MessageTemplateResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, MessageTemplate::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetMessageTemplatesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetMessageTemplateRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateMessageTemplateRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateMessageTemplateRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteMessageTemplateRequest($this->intId($id), $options);
    }

    /**
     * Returns a list of records that reference this Message Template record: GET /settings/integration/message-template/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetMessageTemplateUsageRequest($id, $query));
    }

    /**
     * Reviews the supplied Message Template with the supplied context: POST /settings/integration/message-template/test.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function test(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new TestMessageTemplateRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Deletes a single Message Template record by ID: POST /settings/integration/message-template/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteMessageTemplateViaPostRequest($id, $options));
    }

    /**
     * Deletes a list of Message Template records supplied under the id parameter: POST /settings/integration/message-template/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyMessageTemplatesRequest(['id' => $ids]));
    }
}
