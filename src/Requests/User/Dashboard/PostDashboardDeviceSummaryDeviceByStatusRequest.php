<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Data\User\DashboardDeviceSummaryDeviceByStatus;
use spkm\FortiNac\Requests\ActionRequest;
use spkm\FortiNac\Support\Path;

/**
 * POST /user/dashboard/device-summary/device/{tag}/{status}: POST /user/dashboard/device-summary/device/{tag}/{status}.
 */
class PostDashboardDeviceSummaryDeviceByStatusRequest extends ActionRequest
{
    protected ?string $dto = DashboardDeviceSummaryDeviceByStatus::class;

    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $tag, protected string $status, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/user/dashboard/device-summary/device/'.Path::segment($this->tag).'/'.Path::segment($this->status);
    }
}
