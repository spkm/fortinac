<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\SmsProvider;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\CountAllSmsProvidersRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\CountSmsProvidersRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\CreateSmsProviderRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\DeleteManySmsProvidersRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\DeleteSmsProviderRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\DeleteSmsProviderViaPostRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\DisableSmsProviderRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\EnableSmsProviderRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\GetSmsProviderGlobalMaxLengthRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\GetSmsProviderRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\GetSmsProvidersRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\GetSmsProviderUsageRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\PostSmsProviderGlobalMaxLengthRequest;
use spkm\FortiNac\Requests\Settings\SmsProvider\UpdateSmsProviderRequest;

/**
 * SMS Provider, from FortiNac::settings()->smsProviders().
 *
 * @extends Builder<SmsProvider>
 */
class SmsProviderResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, SmsProvider::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSmsProvidersRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountSmsProvidersRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetSmsProviderRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateSmsProviderRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateSmsProviderRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteSmsProviderRequest((int) $id, $options);
    }

    /**
     * Returns the count of all SMS Provider records in the database: GET /settings/integration/sms/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllSmsProvidersRequest);
    }

    /**
     * Gets the maximum length of SMS messages for all providers: GET /settings/integration/sms/global/max-length.
     */
    public function globalMaxLength(): mixed
    {
        return $this->fetch(new GetSmsProviderGlobalMaxLengthRequest);
    }

    /**
     * Returns a list of records that reference this SMS Provider record: GET /settings/integration/sms/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetSmsProviderUsageRequest($id));
    }

    /**
     * Sets the maximum length of SMS messages for all providers: POST /settings/integration/sms/global/max-length.
     *
     * @param  array<string, mixed>  $options  Query options: maxLength
     */
    public function globalMaxLength2(array $options = []): bool
    {
        return $this->perform(new PostSmsProviderGlobalMaxLengthRequest($options));
    }

    /**
     * Deletes the SMS Provider record or records supplied, if they are not currently in use: POST /settings/integration/sms/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManySmsProvidersRequest(['id' => $ids]));
    }

    /**
     * Disables the supplied SMS Provider: POST /settings/integration/sms/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableSmsProviderRequest($id, $options));
    }

    /**
     * Enables the supplied SMS Provider: POST /settings/integration/sms/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableSmsProviderRequest($id, $options));
    }

    /**
     * Deletes the SMS Provider record supplied, if they are not currently in use: POST /settings/integration/sms/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteSmsProviderViaPostRequest($id, $options));
    }
}
