<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * GET /user/dashboard/agent-summary: GET /user/dashboard/agent-summary.
 */
class GetDashboardAgentSummaryRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/user/dashboard/agent-summary';
    }
}
