<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\MessagingGateway;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\CountAllMessagingGatewaysRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\CountMessagingGatewaysRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\CreateMessagingGatewayRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\DeleteManyMessagingGatewaysRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\DeleteMessagingGatewayRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\DeleteMessagingGatewayViaPostRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\DisableMessagingGatewayRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\EnableMessagingGatewayRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\GetMessagingGatewayGlobalDefaultMessagingGatewayRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\GetMessagingGatewayGlobalMaxLengthRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\GetMessagingGatewayRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\GetMessagingGatewaysRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\PostMessagingGatewayGlobalDefaultMessagingGatewayRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\PostMessagingGatewayGlobalMaxLengthRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\SendMessagingGatewaySmsRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\TestMessagingGatewayRequest;
use spkm\FortiNac\Requests\Settings\MessagingGateway\UpdateMessagingGatewayRequest;

/**
 * Messaging Gateway, from FortiNac::settings()->messagingGateways().
 *
 * @extends Builder<MessagingGateway>
 */
class MessagingGatewayResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, MessagingGateway::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetMessagingGatewaysRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountMessagingGatewaysRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetMessagingGatewayRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateMessagingGatewayRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateMessagingGatewayRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteMessagingGatewayRequest((int) $id, $options);
    }

    /**
     * Gets the default Message Gateway used to send sms: GET /settings/integration/messaging-gateway/global/default-messaging-gateway.
     */
    public function globalDefaultMessagingGateway(): mixed
    {
        return $this->fetch(new GetMessagingGatewayGlobalDefaultMessagingGatewayRequest);
    }

    /**
     * Returns the count of all messaging gateways in the database: GET /settings/integration/messaging-gateway/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllMessagingGatewaysRequest);
    }

    /**
     * Gets the maximum length of SMS messages for all providers: GET /settings/integration/messaging-gateway/global/max-length.
     */
    public function globalMaxLength(): mixed
    {
        return $this->fetch(new GetMessagingGatewayGlobalMaxLengthRequest);
    }

    /**
     * Deletes a list of Messaging Gateway records supplied under the id parameter: POST /settings/integration/messaging-gateway/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyMessagingGatewaysRequest(['id' => $ids]));
    }

    /**
     * Sets the default Message Gateway used to send sms: POST /settings/integration/messaging-gateway/global/default-messaging-gateway.
     *
     * @param  array<string, mixed>  $options  Query options: defaultMessagingGateway, Request Body
     */
    public function globalDefaultMessagingGateway2(array $options = []): mixed
    {
        return $this->fetch(new PostMessagingGatewayGlobalDefaultMessagingGatewayRequest($options));
    }

    /**
     * Sets the maximum length of SMS messages for all providers: POST /settings/integration/messaging-gateway/global/max-length.
     *
     * @param  array<string, mixed>  $options  Query options: maxLength, Request Body
     */
    public function globalMaxLength2(array $options = []): bool
    {
        return $this->perform(new PostMessagingGatewayGlobalMaxLengthRequest($options));
    }

    /**
     * Deletes a single Messaging Gateway record by ID: POST /settings/integration/messaging-gateway/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteMessagingGatewayViaPostRequest($id, $options));
    }

    /**
     * Sends SMS: POST /settings/integration/messaging-gateway/send-sms.
     *
     * @param  array<string, mixed>  $options
     */
    public function sendSms(array $options = []): bool
    {
        return $this->perform(new SendMessagingGatewaySmsRequest($options));
    }

    /**
     * Disables the supplied Messaging Gateway: POST /settings/integration/messaging-gateway/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableMessagingGatewayRequest($id, $options));
    }

    /**
     * Test the gateway connection with the third party: POST /settings/integration/messaging-gateway/{id}/test.
     *
     * @param  array<string, mixed>  $options  Query options: userId
     */
    public function test(int $id, array $options = []): bool
    {
        return $this->perform(new TestMessagingGatewayRequest($id, $options));
    }

    /**
     * Enables the supplied Messaging Gateway: POST /settings/integration/messaging-gateway/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableMessagingGatewayRequest($id, $options));
    }
}
