<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Data\User\DashboardScanSummaryPerDay;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a summary of the number of scans per hour over a date range, grouped by the start of the hour: GET /user/dashboard/scan-summary/per-hour.
 *
 * Parameters: startDate, endDate, type, platform, scan.
 */
class GetDashboardScanSummaryPerHourRequest extends ItemRequest
{
    protected ?string $dto = DashboardScanSummaryPerDay::class;

    /**
     * @param  array<string, mixed>  $options  Query options: startDate, endDate, type, platform, scan
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/user/dashboard/scan-summary/per-hour';
    }
}
