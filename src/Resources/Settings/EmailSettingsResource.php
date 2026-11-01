<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\EmailSettings;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\Settings\EmailSettings\CreateEmailSettingsRequest;
use spkm\FortiNac\Requests\Settings\EmailSettings\DeleteManyEmailSettingsRequest;
use spkm\FortiNac\Requests\Settings\EmailSettings\PostEmailSettingsPasswordRequest;
use spkm\FortiNac\Requests\Settings\EmailSettings\TestEmailSettingsRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Email, from FortiNac::settings()->email().
 *
 * @extends BaseResource<EmailSettings>
 */
class EmailSettingsResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, EmailSettings::class);
    }

    /**
     * Returns the currently configured e-mail server settings: POST /settings/integration/email.
     *
     * @param  array<string, mixed>  $options
     */
    public function create(array $options = []): ?EmailSettings
    {
        return $this->fetch(new CreateEmailSettingsRequest($options));
    }

    /**
     * Returns the password for the currently configured e-mail server. This is done separately so that passwords may be restricted: POST /settings/integration/email/password.
     *
     * @param  array<string, mixed>  $options
     */
    public function password(array $options = []): bool
    {
        return $this->perform(new PostEmailSettingsPasswordRequest($options));
    }

    /**
     * Resets the e-mail server settings for this appliance: POST /settings/integration/email/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyEmailSettingsRequest(['id' => $ids]));
    }

    /**
     * Sends a test e-mail to the supplied address, either using the current settings or those supplied in this request: POST /settings/integration/email/test.
     *
     * @param  array<string, mixed>  $options  Query options: smtpTimeout, smtpConnectionTimeout, emailPassword, emailAuthType, emailPort, emailUsername, emailServer, emailAuth, emailSender, alwaysSendAsSender, email, recipient
     */
    public function test(array $options = []): bool
    {
        return $this->perform(new TestEmailSettingsRequest($options));
    }
}
