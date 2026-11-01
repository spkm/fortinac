<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\StatusNotifications;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Settings\StatusNotifications\GetStatusNotificationsRequest;
use spkm\FortiNac\Requests\Settings\StatusNotifications\UpdateStatusNotificationsRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * SMS Provider, Status Notifications, from FortiNac::settings()->statusNotifications().
 *
 * @extends SingletonResource<StatusNotifications>
 */
class StatusNotificationsResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, StatusNotifications::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetStatusNotificationsRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateStatusNotificationsRequest($body, $options);
    }
}
