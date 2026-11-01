<?php

namespace spkm\FortiNac\Resources\Host;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Host\DeviceProfilingRule;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\CountAllDeviceProfilingRulesRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\CountDeviceProfilingRulesRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\CreateDeviceProfilingRuleRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\DeleteDeviceProfilingRuleRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\DeleteDeviceProfilingRuleViaPostRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\DeleteManyDeviceProfilingRulesRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\DisableDeviceProfilingRuleRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\EnableDeviceProfilingRuleRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\GetDeviceProfilingRuleCreateFromAdapterRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\GetDeviceProfilingRuleQueueRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\GetDeviceProfilingRuleRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\GetDeviceProfilingRuleRuleExportRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\GetDeviceProfilingRulesRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\PostDeviceProfilingRuleUsageRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\ScanDeviceProfilingRuleRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\SwapDeviceProfilingRuleRuleRanksRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\TestDeviceProfilingRuleRequest;
use spkm\FortiNac\Requests\Host\DeviceProfilingRule\UpdateDeviceProfilingRuleRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Device Profiler, Device Profiling Rule, from FortiNac::host()->deviceProfilingRules().
 *
 * @extends Builder<DeviceProfilingRule>
 */
class DeviceProfilingRuleResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, DeviceProfilingRule::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDeviceProfilingRulesRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountDeviceProfilingRulesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetDeviceProfilingRuleRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateDeviceProfilingRuleRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateDeviceProfilingRuleRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteDeviceProfilingRuleRequest($this->intId($id), $options);
    }

    /**
     * Exports the configured Device Profiler rules as a download: GET /DeviceProfiler/Rule/export.
     */
    public function ruleExport(): mixed
    {
        return $this->fetch(new GetDeviceProfilingRuleRuleExportRequest);
    }

    /**
     * Returns the count of all Device Profiling Rule records in the database: GET /host/device-profiling-rule/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllDeviceProfilingRulesRequest);
    }

    /**
     * Returns the potential contents of a new Device Profiling Rule created from an existing adapter. This is not automatically added to the database: GET /host/device-profiling-rule/create-from-adapter.
     *
     * @param  array<string, mixed>  $options  Query options: macAddress
     */
    public function createFromAdapter(array $options = []): ?DeviceProfilingRule
    {
        return $this->fetchOrNull(new GetDeviceProfilingRuleCreateFromAdapterRequest($options));
    }

    /**
     * Returns the number of MAC addresses currently queued to be profiled: GET /host/device-profiling-rule/queue.
     */
    public function queue(): mixed
    {
        return $this->fetch(new GetDeviceProfilingRuleQueueRequest);
    }

    /**
     * Deletes the Device Profiling Rule record or records supplied, if they are not currently in use: POST /host/device-profiling-rule/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyDeviceProfilingRulesRequest(['id' => $ids]));
    }

    /**
     * Deletes the Device Profiling Rule record or records supplied, if they are not currently in use: POST /host/device-profiling-rule/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteDeviceProfilingRuleViaPostRequest($id, $options));
    }

    /**
     * Disables the Device Profiling Rule that matches the supplied DBID: POST /host/device-profiling-rule/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableDeviceProfilingRuleRequest($id, $options));
    }

    /**
     * Enables the Device Profiling Rule that matches the supplied DBID: POST /host/device-profiling-rule/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableDeviceProfilingRuleRequest($id, $options));
    }

    /**
     * Returns a list of Device Profiling Rule records that reference this record: POST /host/device-profiling-rule/{id}/usage.
     *
     * @param  array<string, mixed>  $options
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, array $options = []): Collection
    {
        return $this->fetch(new PostDeviceProfilingRuleUsageRequest($id, $options));
    }

    /**
     * Queues all unprofiled rogues to be scanned for matching Device Profiling Rules: POST /host/device-profiling-rule/scan.
     *
     * @param  array<string, mixed>  $options
     */
    public function scan(array $options = []): mixed
    {
        return $this->fetch(new ScanDeviceProfilingRuleRequest($options));
    }

    /**
     * Swaps the ranks of two Device Profiling Rules with provided database ids: POST /host/device-profiling-rule/swap-rule-ranks.
     *
     * @param  array<string, mixed>  $options  Query options: id, id2
     */
    public function swapRuleRanks(array $options = []): bool
    {
        return $this->perform(new SwapDeviceProfilingRuleRuleRanksRequest($options));
    }

    /**
     * Tests to see if the Device Profiling Rule with the supplied name would match the supplied adapter: POST /host/device-profiling-rule/test.
     *
     * @param  array<string, mixed>  $options  Query options: ruleName, macAddress
     */
    public function test(array $options = []): mixed
    {
        return $this->fetch(new TestDeviceProfilingRuleRequest($options));
    }
}
