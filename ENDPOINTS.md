# Endpoints

Every call the package makes to FortiNAC, by API. Resources are reached from the facade, `FortiNac::{api}()->{resource}()` (or `FortiNac::{resource}()` for an API with one resource); requests are plain Saloon classes under `spkm\FortiNac\Requests\{Api}\{Resource}` for `FortiNac::send()`.

## Adapter

`FortiNac::adapters()`

| Call | Returns |
|---|---|
| `FortiNac::adapters()` | a builder over `Adapter` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::adapters()->countAll()` | the number of records |
| `FortiNac::adapters()->usage(int $id)` | Collection of arrays |
| `FortiNac::adapters()->connectedToPorts(Query|array $query)` | Collection of `Adapter` |
| `FortiNac::adapters()->forHost(Query|array $query)` | Collection of `Adapter` |
| `FortiNac::adapters()->getPort(int $id)` | the decoded JSON |
| `FortiNac::adapters()->deleteMany(array $ids)` | true |
| `FortiNac::adapters()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::adapters()->reprofileRogues(array $options)` | true |
| `FortiNac::adapters()->enable(int $id, array $options)` | true |
| `FortiNac::adapters()->disable(int $id, array $options)` | true |
| `FortiNac::adapters()->runNmapScan(array $options)` | true |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Adapter\Adapter\DeleteAdapterRequest` | DELETE | `/adapter/{id}` | true |
| `Adapter\Adapter\GetAdaptersRequest` | GET | `/adapter` | Collection of `Adapter` |
| `Adapter\Adapter\CountAdaptersRequest` | GET | `/adapter/count` | the number or value FortiNAC answers with |
| `Adapter\Adapter\CountAllAdaptersRequest` | GET | `/adapter/count/all` | the number or value FortiNAC answers with |
| `Adapter\Adapter\GetAdapterRequest` | GET | `/adapter/{id}` | `Adapter` or null |
| `Adapter\Adapter\GetAdapterUsageRequest` | GET | `/adapter/{id}/usage` | Collection of arrays |
| `Adapter\Adapter\GetAdapterConnectedToPortsRequest` | GET | `/adapter/connected-to-ports` | Collection of `Adapter` |
| `Adapter\Adapter\GetAdapterForHostRequest` | GET | `/adapter/for-host` | Collection of `Adapter` |
| `Adapter\Adapter\GetAdapterGetPortRequest` | GET | `/adapter/{id}/get-port` | the decoded JSON |
| `Adapter\Adapter\CreateAdapterRequest` | POST | `/adapter` | `Adapter` or null |
| `Adapter\Adapter\DeleteManyAdaptersRequest` | POST | `/adapter/delete` | true |
| `Adapter\Adapter\UpdateAdapterRequest` | POST | `/adapter/{id}` | `Adapter` or null |
| `Adapter\Adapter\DeleteAdapterViaPostRequest` | POST | `/adapter/{id}/delete` | true |
| `Adapter\Adapter\ReprofileAdapterRoguesRequest` | POST | `/adapter/reprofile-rogues` | true |
| `Adapter\Adapter\EnableAdapterRequest` | POST | `/adapter/{id}/enable` | true |
| `Adapter\Adapter\DisableAdapterRequest` | POST | `/adapter/{id}/disable` | true |
| `Adapter\Adapter\RunAdapterNmapScanRequest` | POST | `/adapter/run-nmap-scan` | true |

## Device

`FortiNac::device()`

| Call | Returns |
|---|---|
| `FortiNac::device()` | a builder over `NetworkDevice` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `delete()` |
| `FortiNac::device()->monitor(int $id)` | true |
| `FortiNac::device()->countAll()` | the number of records |
| `FortiNac::device()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::device()->pollingL3(array $options)` | the decoded JSON |
| `FortiNac::device()->move(array $options)` | the decoded JSON |
| `FortiNac::device()->properties()` | `NetworkDeviceProperties` or null |
| `FortiNac::device()->deleteMany(array $ids)` | true |
| `FortiNac::device()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::device()->stopMonitor(int $id, array $options)` | true |
| `FortiNac::device()->startMonitor(array $options)` | Collection of `NetworkDevice` |
| `FortiNac::device()->pingableById(int $id, array|Data $attributes, array $options)` | `NetworkDevicePingableById` or null |
| `FortiNac::device()->pingable(array|Data $attributes, array $options)` | `NetworkDevicePingableById` or null |
| `FortiNac::device()->properties2(array $options)` | `NetworkDeviceProperties` or null |
| `FortiNac::device()->snmp(array|Data $attributes, array $options)` | `NetworkDeviceSnmp` or null |
| `FortiNac::device()->snmpById(int $id, array|Data $attributes, array $options)` | `NetworkDeviceSnmpById` or null |
| `FortiNac::device()->resyncInterfaces(array $options)` | true |
| `FortiNac::device()->containers()` | a builder over `Container` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `delete()` |
| `FortiNac::device()->containers()->countAll()` | the number of records |
| `FortiNac::device()->containers()->usage(int $id)` | Collection of arrays |
| `FortiNac::device()->containers()->monitor(int $id)` | true |
| `FortiNac::device()->containers()->deleteMany(array $ids)` | true |
| `FortiNac::device()->containers()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::device()->containers()->startMonitor(array|Data $attributes, array $options)` | Collection of `ContainerStartContainerMonitor` |
| `FortiNac::device()->containers()->stopMonitor(int $id, array $options)` | true |
| `FortiNac::device()->discovery()` | the actions below |
| `FortiNac::device()->discovery()->discoverStatusAll()` | the decoded JSON |
| `FortiNac::device()->discovery()->discoverStatus(array $options)` | `DiscoveryDiscoverStatus` or null |
| `FortiNac::device()->discovery()->discoverStop(array $options)` | the number or value FortiNAC answers with |
| `FortiNac::device()->discovery()->discover(array|Data $attributes, array $options)` | `DiscoveryDiscoverDiscovery` or null |
| `FortiNac::device()->l3Scan()` | the actions below |
| `FortiNac::device()->l3Scan()->status()` | the decoded JSON |
| `FortiNac::device()->l3Scan()->stop(array $options)` | true |
| `FortiNac::device()->l3Scan()->start(array $options)` | true |
| `FortiNac::device()->portChanges()` | a builder over `PortChange` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)` |
| `FortiNac::device()->portChanges()->countAll()` | the number of records |
| `FortiNac::device()->ports()` | a builder over `Port` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)` |
| `FortiNac::device()->ports()->findByDevice(array $options)` | `PortByDevice` or null |
| `FortiNac::device()->ports()->countAll()` | the number of records |
| `FortiNac::device()->ports()->enforcement(Query|array $query)` | Collection of `Port` |
| `FortiNac::device()->ports()->enforcementCount()` | true |
| `FortiNac::device()->ports()->featurePortManagement(array $options)` | true |
| `FortiNac::device()->ports()->monitor(int $id)` | true |
| `FortiNac::device()->ports()->stopMonitor(int $id, array $options)` | true |
| `FortiNac::device()->ports()->startMonitor(array $options)` | Collection of `Port` |
| `FortiNac::device()->ports()->properties(array|Data $attributes, array $options)` | `PortProperties` or null |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Device\Container\DeleteContainerRequest` | DELETE | `/device/container/{id}` | true |
| `Device\Container\GetContainersRequest` | GET | `/device/container` | Collection of `Container` |
| `Device\Container\CountContainersRequest` | GET | `/device/container/count` | the number or value FortiNAC answers with |
| `Device\Container\CountAllContainersRequest` | GET | `/device/container/count/all` | the number or value FortiNAC answers with |
| `Device\Container\GetContainerRequest` | GET | `/device/container/{id}` | `Container` or null |
| `Device\Container\GetContainerUsageRequest` | GET | `/device/container/{id}/usage` | Collection of arrays |
| `Device\Container\GetContainerMonitorRequest` | GET | `/device/container/monitor/{id}` | true |
| `Device\Container\CreateContainerRequest` | POST | `/device/container` | `Container` or null |
| `Device\Container\DeleteManyContainersRequest` | POST | `/device/container/delete` | true |
| `Device\Container\DeleteContainerViaPostRequest` | POST | `/device/container/{id}/delete` | true |
| `Device\Container\StartContainerMonitorRequest` | POST | `/device/container/monitor/start` | Collection of `ContainerStartContainerMonitor` |
| `Device\Container\StopContainerMonitorRequest` | POST | `/device/container/monitor/{id}/stop` | true |
| `Device\Discovery\GetDiscoveryDiscoverStatusAllRequest` | GET | `/device/discovery/discover/status/all` | the decoded JSON |
| `Device\Discovery\GetDiscoveryDiscoverStatusRequest` | GET | `/device/discovery/discover/status` | `DiscoveryDiscoverStatus` or null |
| `Device\Discovery\DiscoverDiscoveryStopRequest` | POST | `/device/discovery/discover/stop` | the number or value FortiNAC answers with |
| `Device\Discovery\DiscoverDiscoveryRequest` | POST | `/device/discovery/discover` | `DiscoveryDiscoverDiscovery` or null |
| `Device\L3Scan\GetL3ScanStatusRequest` | GET | `/device/l3scan/status` | the decoded JSON |
| `Device\L3Scan\StopL3ScanRequest` | POST | `/device/l3scan/stop` | true |
| `Device\L3Scan\StartL3ScanRequest` | POST | `/device/l3scan/start` | true |
| `Device\PortChange\GetPortChangesRequest` | GET | `/device/port-changes` | Collection of `PortChange` |
| `Device\PortChange\CountPortChangesRequest` | GET | `/device/port-changes/count` | the number or value FortiNAC answers with |
| `Device\PortChange\CountAllPortChangesRequest` | GET | `/device/port-changes/count/all` | the number or value FortiNAC answers with |
| `Device\PortChange\GetPortChangeRequest` | GET | `/device/port-changes/{id}` | `PortChange` or null |
| `Device\Port\GetPortsRequest` | GET | `/device/port` | Collection of `Port` |
| `Device\Port\GetPortByDeviceRequest` | GET | `/device/port/by-device` | `PortByDevice` or null |
| `Device\Port\CountPortsRequest` | GET | `/device/port/count` | the number or value FortiNAC answers with |
| `Device\Port\CountAllPortsRequest` | GET | `/device/port/count/all` | the number or value FortiNAC answers with |
| `Device\Port\GetPortEnforcementRequest` | GET | `/device/port/enforcement` | Collection of `Port` |
| `Device\Port\GetPortEnforcementCountRequest` | GET | `/device/port/enforcement/count` | true |
| `Device\Port\GetPortFeaturePortManagementRequest` | GET | `/device/port/feature/port-management` | true |
| `Device\Port\GetPortRequest` | GET | `/device/port/{id}` | `Port` or null |
| `Device\Port\GetPortMonitorRequest` | GET | `/device/port/monitor/{id}` | true |
| `Device\Port\StopPortMonitorRequest` | POST | `/device/port/monitor/{id}/stop` | true |
| `Device\Port\StartPortMonitorRequest` | POST | `/device/port/monitor/start` | Collection of `Port` |
| `Device\Port\PostPortPropertiesRequest` | POST | `/device/port/properties` | `PortProperties` or null |
| `Device\NetworkDevice\CountNetworkDevicesRequest` | GET | `/device/count` | the number or value FortiNAC answers with |
| `Device\NetworkDevice\GetNetworkDeviceRequest` | GET | `/device/{id}` | `NetworkDevice` or null |
| `Device\NetworkDevice\GetNetworkDeviceMonitorRequest` | GET | `/device/monitor/{id}` | true |
| `Device\NetworkDevice\CountAllNetworkDevicesRequest` | GET | `/device/count/all` | the number or value FortiNAC answers with |
| `Device\NetworkDevice\GetNetworkDevicesRequest` | GET | `/device` | Collection of `NetworkDevice` |
| `Device\NetworkDevice\GetNetworkDeviceUsageRequest` | GET | `/device/{id}/usage` | Collection of arrays |
| `Device\NetworkDevice\GetNetworkDevicePollingL3Request` | GET | `/device/polling/l3` | the decoded JSON |
| `Device\NetworkDevice\GetNetworkDeviceMoveRequest` | GET | `/device/move` | the decoded JSON |
| `Device\NetworkDevice\GetNetworkDevicePropertiesRequest` | GET | `/device/properties` | `NetworkDeviceProperties` or null |
| `Device\NetworkDevice\DeleteManyNetworkDevicesRequest` | POST | `/device/delete` | true |
| `Device\NetworkDevice\DeleteNetworkDeviceViaPostRequest` | POST | `/device/{id}/delete` | true |
| `Device\NetworkDevice\StopNetworkDeviceMonitorRequest` | POST | `/device/monitor/{id}/stop` | true |
| `Device\NetworkDevice\StartNetworkDeviceMonitorRequest` | POST | `/device/monitor/start` | Collection of `NetworkDevice` |
| `Device\NetworkDevice\PostNetworkDevicePingableByIdRequest` | POST | `/device/pingable/{id}` | `NetworkDevicePingableById` or null |
| `Device\NetworkDevice\PostNetworkDevicePingableRequest` | POST | `/device/pingable` | `NetworkDevicePingableById` or null |
| `Device\NetworkDevice\PostNetworkDevicePropertiesRequest` | POST | `/device/properties` | `NetworkDeviceProperties` or null |
| `Device\NetworkDevice\PostNetworkDeviceSnmpRequest` | POST | `/device/snmp` | `NetworkDeviceSnmp` or null |
| `Device\NetworkDevice\PostNetworkDeviceSnmpByIdRequest` | POST | `/device/snmp/{id}` | `NetworkDeviceSnmpById` or null |
| `Device\NetworkDevice\ResyncNetworkDeviceInterfacesRequest` | POST | `/device/resync-interfaces` | true |
| `Device\NetworkDevice\DeleteNetworkDeviceRequest` | DELETE | `/device/{id}` | true |

## Host

`FortiNac::host()`

| Call | Returns |
|---|---|
| `FortiNac::host()` | a builder over `Host` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::host()->findByIp(string $ip)` | `Host` or null |
| `FortiNac::host()->findByMac(string $mac)` | `Host` or null |
| `FortiNac::host()->countAll()` | the number of records |
| `FortiNac::host()->deviceTypes(Query|array $query)` | Collection of `HostDeviceType` |
| `FortiNac::host()->connectedToPort(array $options)` | the decoded JSON |
| `FortiNac::host()->usage(int $id)` | Collection of arrays |
| `FortiNac::host()->forUser(array $options)` | `HostsForUser` or null |
| `FortiNac::host()->globalAllowedHosts()` | the decoded JSON |
| `FortiNac::host()->clientFiltersCachedByName(string $name)` | `HostClientFiltersCachedByName` or null |
| `FortiNac::host()->policy(int $id, array $options)` | true |
| `FortiNac::host()->clientFilters(Query|array $query)` | Collection of `HostClientFiltersCachedByName` |
| `FortiNac::host()->deleteMany(array $ids)` | true |
| `FortiNac::host()->setRole(array $options)` | true |
| `FortiNac::host()->enable(int $id, array $options)` | true |
| `FortiNac::host()->disable(int $id, array $options)` | true |
| `FortiNac::host()->importHosts(array $options)` | true |
| `FortiNac::host()->withAdaptersById(int $id, array $options)` | true |
| `FortiNac::host()->setHealth(int $id, array $options)` | true |
| `FortiNac::host()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::host()->setExpiration(array $options)` | true |
| `FortiNac::host()->rescanWithProfile(int $id, array $options)` | true |
| `FortiNac::host()->sendPersistentAgentMessage(array $options)` | true |
| `FortiNac::host()->updatePersistentAgent(int $id, array $options)` | true |
| `FortiNac::host()->healthHistory(int $id)` | `HostHealthHistory` or null |
| `FortiNac::host()->multifilter(Query|array $query)` | Collection of `HostMultifilter` |
| `FortiNac::host()->multifilterUsers(Query|array $query)` | Collection of `HostMultifilter` |
| `FortiNac::host()->ncmPods(Query|array $query)` | Collection of `HostNcmPod` |
| `FortiNac::host()->search(array $options)` | the decoded JSON |
| `FortiNac::host()->disableByIp(array $options)` | true |
| `FortiNac::host()->disableByMac(array $options)` | true |
| `FortiNac::host()->enableByIp(array $options)` | true |
| `FortiNac::host()->enableByMac(array $options)` | true |
| `FortiNac::host()->registerAsDevice(array $options)` | true |
| `FortiNac::host()->setLoggedOnUser(array $options)` | true |
| `FortiNac::host()->withAdapters(array|Data $attributes, array $options)` | `Host` or null |
| `FortiNac::host()->deviceProfilingRules()` | a builder over `DeviceProfilingRule` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::host()->deviceProfilingRules()->ruleExport()` | true |
| `FortiNac::host()->deviceProfilingRules()->countAll()` | the number of records |
| `FortiNac::host()->deviceProfilingRules()->createFromAdapter(array $options)` | `DeviceProfilingRule` or null |
| `FortiNac::host()->deviceProfilingRules()->queue()` | the number or value FortiNAC answers with |
| `FortiNac::host()->deviceProfilingRules()->deleteMany(array $ids)` | true |
| `FortiNac::host()->deviceProfilingRules()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::host()->deviceProfilingRules()->disable(int $id, array $options)` | true |
| `FortiNac::host()->deviceProfilingRules()->enable(int $id, array $options)` | true |
| `FortiNac::host()->deviceProfilingRules()->usage(int $id, array $options)` | Collection of arrays |
| `FortiNac::host()->deviceProfilingRules()->scan(array $options)` | the number or value FortiNAC answers with |
| `FortiNac::host()->deviceProfilingRules()->swapRuleRanks(array $options)` | true |
| `FortiNac::host()->deviceProfilingRules()->test(array $options)` | the number or value FortiNAC answers with |
| `FortiNac::host()->aging()` | the setting as `Aging`: `get()`, `update()` |
| `FortiNac::host()->aging()->clearRegistered(array $options)` | true |
| `FortiNac::host()->aging()->clearUnregistered(array $options)` | true |
| `FortiNac::host()->aging()->clearUsers(array $options)` | true |
| `FortiNac::host()->deviceIdentitySources()` | a builder over `DeviceIdentitySource` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::host()->deviceIdentitySources()->deleteMany(array $ids)` | true |
| `FortiNac::host()->deviceIdentitySources()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::host()->deviceIdentitySources()->disable(int $id, array $options)` | true |
| `FortiNac::host()->deviceIdentitySources()->enable(int $id, array $options)` | true |
| `FortiNac::host()->deviceIdentitySources()->setRank(array $options)` | true |
| `FortiNac::host()->deviceIdentitySources()->swapRanks(array $options)` | true |
| `FortiNac::host()->deviceIdentities()` | a builder over `DeviceIdentity` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::host()->deviceIdentities()->countAll()` | the number of records |
| `FortiNac::host()->deviceIdentities()->usage(int $id)` | Collection of arrays |
| `FortiNac::host()->deviceIdentities()->fingerprints(array $options)` | true |
| `FortiNac::host()->deviceIdentities()->fingerprintById(int $id, array $options)` | true |
| `FortiNac::host()->deviceIdentities()->deleteMany(array $ids)` | true |
| `FortiNac::host()->deviceIdentities()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::host()->deviceIdentities()->confirmRule(array $options)` | true |
| `FortiNac::host()->fingerprints()` | a builder over `Fingerprint` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::host()->fingerprints()->countAll()` | the number of records |
| `FortiNac::host()->fingerprints()->deleteMany(array $ids)` | true |
| `FortiNac::host()->fingerprints()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::host()->registrationRequests()` | a builder over `RegistrationRequest` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `delete()` |
| `FortiNac::host()->registrationRequests()->deny(array|Data $attributes, array $options)` | true |
| `FortiNac::host()->registrationRequests()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::host()->registrationRequests()->deleteMany(array $ids)` | true |
| `FortiNac::host()->registrationRequests()->approve(array|Data $attributes, array $options)` | true |
| `FortiNac::host()->scannedApplications()` | a builder over `ScannedApplication` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `delete()` |
| `FortiNac::host()->scannedApplications()->forHost(Query|array $query)` | Collection of `ScannedApplication` |
| `FortiNac::host()->scannedApplications()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::host()->scannedApplications()->deleteMany(array $ids)` | true |
| `FortiNac::host()->scannedApplications()->threat(array $options)` | true |
| `FortiNac::host()->scannedApplications()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::host()->scans()` | a builder over `ScanResult` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()` |
| `FortiNac::host()->scans()->archives()` | the decoded JSON |
| `FortiNac::host()->scans()->archiveImportStatus()` | the number or value FortiNAC answers with |
| `FortiNac::host()->scans()->countAll()` | the number of records |
| `FortiNac::host()->scans()->archiveCreate(array $options)` | true |
| `FortiNac::host()->scans()->archiveImport(array $options)` | true |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Host\DeviceProfilingRule\GetDeviceProfilingRuleRuleExportRequest` | GET | `/DeviceProfiler/Rule/export` | true |
| `Host\DeviceProfilingRule\DeleteDeviceProfilingRuleRequest` | DELETE | `/host/device-profiling-rule/{id}` | true |
| `Host\DeviceProfilingRule\CountDeviceProfilingRulesRequest` | GET | `/host/device-profiling-rule/count` | the number or value FortiNAC answers with |
| `Host\DeviceProfilingRule\CountAllDeviceProfilingRulesRequest` | GET | `/host/device-profiling-rule/count/all` | the number or value FortiNAC answers with |
| `Host\DeviceProfilingRule\GetDeviceProfilingRuleCreateFromAdapterRequest` | GET | `/host/device-profiling-rule/create-from-adapter` | `DeviceProfilingRule` or null |
| `Host\DeviceProfilingRule\GetDeviceProfilingRuleRequest` | GET | `/host/device-profiling-rule/{id}` | `DeviceProfilingRule` or null |
| `Host\DeviceProfilingRule\GetDeviceProfilingRuleQueueRequest` | GET | `/host/device-profiling-rule/queue` | the number or value FortiNAC answers with |
| `Host\DeviceProfilingRule\GetDeviceProfilingRulesRequest` | GET | `/host/device-profiling-rule` | Collection of `DeviceProfilingRule` |
| `Host\DeviceProfilingRule\CreateDeviceProfilingRuleRequest` | POST | `/host/device-profiling-rule` | `DeviceProfilingRule` or null |
| `Host\DeviceProfilingRule\DeleteManyDeviceProfilingRulesRequest` | POST | `/host/device-profiling-rule/delete` | true |
| `Host\DeviceProfilingRule\UpdateDeviceProfilingRuleRequest` | POST | `/host/device-profiling-rule/{id}` | `DeviceProfilingRule` or null |
| `Host\DeviceProfilingRule\DeleteDeviceProfilingRuleViaPostRequest` | POST | `/host/device-profiling-rule/{id}/delete` | true |
| `Host\DeviceProfilingRule\DisableDeviceProfilingRuleRequest` | POST | `/host/device-profiling-rule/{id}/disable` | true |
| `Host\DeviceProfilingRule\EnableDeviceProfilingRuleRequest` | POST | `/host/device-profiling-rule/{id}/enable` | true |
| `Host\DeviceProfilingRule\PostDeviceProfilingRuleUsageRequest` | POST | `/host/device-profiling-rule/{id}/usage` | Collection of arrays |
| `Host\DeviceProfilingRule\ScanDeviceProfilingRuleRequest` | POST | `/host/device-profiling-rule/scan` | the number or value FortiNAC answers with |
| `Host\DeviceProfilingRule\SwapDeviceProfilingRuleRuleRanksRequest` | POST | `/host/device-profiling-rule/swap-rule-ranks` | true |
| `Host\DeviceProfilingRule\TestDeviceProfilingRuleRequest` | POST | `/host/device-profiling-rule/test` | the number or value FortiNAC answers with |
| `Host\Aging\GetAgingRequest` | GET | `/host/aging` | `Aging` or null |
| `Host\Aging\UpdateAgingRequest` | POST | `/host/aging` | `Aging` or null |
| `Host\Aging\ClearAgingRegisteredRequest` | POST | `/host/aging/clear-registered` | true |
| `Host\Aging\ClearAgingUnregisteredRequest` | POST | `/host/aging/clear-unregistered` | true |
| `Host\Aging\ClearAgingUsersRequest` | POST | `/host/aging/clear-users` | true |
| `Host\DeviceIdentitySource\DeleteDeviceIdentitySourceRequest` | DELETE | `/host/device-identity-source/{id}` | true |
| `Host\DeviceIdentitySource\GetDeviceIdentitySourcesRequest` | GET | `/host/device-identity-source` | Collection of `DeviceIdentitySource` |
| `Host\DeviceIdentitySource\GetDeviceIdentitySourceRequest` | GET | `/host/device-identity-source/{id}` | `DeviceIdentitySource` or null |
| `Host\DeviceIdentitySource\CreateDeviceIdentitySourceRequest` | POST | `/host/device-identity-source` | `DeviceIdentitySource` or null |
| `Host\DeviceIdentitySource\DeleteManyDeviceIdentitySourcesRequest` | POST | `/host/device-identity-source/delete` | true |
| `Host\DeviceIdentitySource\UpdateDeviceIdentitySourceRequest` | POST | `/host/device-identity-source/{id}` | `DeviceIdentitySource` or null |
| `Host\DeviceIdentitySource\DeleteDeviceIdentitySourceViaPostRequest` | POST | `/host/device-identity-source/{id}/delete` | true |
| `Host\DeviceIdentitySource\DisableDeviceIdentitySourceRequest` | POST | `/host/device-identity-source/{id}/disable` | true |
| `Host\DeviceIdentitySource\EnableDeviceIdentitySourceRequest` | POST | `/host/device-identity-source/{id}/enable` | true |
| `Host\DeviceIdentitySource\SetDeviceIdentitySourceRankRequest` | POST | `/host/device-identity-source/rank/set` | true |
| `Host\DeviceIdentitySource\SwapDeviceIdentitySourceRanksRequest` | POST | `/host/device-identity-source/rank/swap` | true |
| `Host\DeviceIdentity\DeleteDeviceIdentityRequest` | DELETE | `/host/device-identity/{id}` | true |
| `Host\DeviceIdentity\GetDeviceIdentitiesRequest` | GET | `/host/device-identity` | Collection of `DeviceIdentity` |
| `Host\DeviceIdentity\CountDeviceIdentitiesRequest` | GET | `/host/device-identity/count` | the number or value FortiNAC answers with |
| `Host\DeviceIdentity\CountAllDeviceIdentitiesRequest` | GET | `/host/device-identity/count/all` | the number or value FortiNAC answers with |
| `Host\DeviceIdentity\GetDeviceIdentityRequest` | GET | `/host/device-identity/{id}` | `DeviceIdentity` or null |
| `Host\DeviceIdentity\GetDeviceIdentityUsageRequest` | GET | `/host/device-identity/{id}/usage` | Collection of arrays |
| `Host\DeviceIdentity\GetDeviceIdentityFingerprintsRequest` | GET | `/host/device-identity/fingerprints` | true |
| `Host\DeviceIdentity\GetDeviceIdentityFingerprintByIdRequest` | GET | `/host/device-identity/fingerprint/{id}` | true |
| `Host\DeviceIdentity\CreateDeviceIdentityRequest` | POST | `/host/device-identity` | `DeviceIdentity` or null |
| `Host\DeviceIdentity\DeleteManyDeviceIdentitiesRequest` | POST | `/host/device-identity/delete` | true |
| `Host\DeviceIdentity\UpdateDeviceIdentityRequest` | POST | `/host/device-identity/{id}` | `DeviceIdentity` or null |
| `Host\DeviceIdentity\DeleteDeviceIdentityViaPostRequest` | POST | `/host/device-identity/{id}/delete` | true |
| `Host\DeviceIdentity\ConfirmDeviceIdentityRuleRequest` | POST | `/host/device-identity/confirm-rule` | true |
| `Host\Fingerprint\GetFingerprintsRequest` | GET | `/host/fingerprint` | Collection of `Fingerprint` |
| `Host\Fingerprint\CountFingerprintsRequest` | GET | `/host/fingerprint/count` | the number or value FortiNAC answers with |
| `Host\Fingerprint\CountAllFingerprintsRequest` | GET | `/host/fingerprint/count/all` | the number or value FortiNAC answers with |
| `Host\Fingerprint\GetFingerprintRequest` | GET | `/host/fingerprint/{id}` | `Fingerprint` or null |
| `Host\Fingerprint\DeleteManyFingerprintsRequest` | POST | `/host/fingerprint/delete` | true |
| `Host\Fingerprint\DeleteFingerprintViaPostRequest` | POST | `/host/fingerprint/{id}/delete` | true |
| `Host\Fingerprint\UpdateFingerprintRequest` | POST | `/host/fingerprint/{id}` | `Fingerprint` or null |
| `Host\Fingerprint\CreateFingerprintRequest` | POST | `/host/fingerprint` | `Fingerprint` or null |
| `Host\Fingerprint\DeleteFingerprintRequest` | DELETE | `/host/fingerprint/{id}` | true |
| `Host\RegistrationRequest\GetRegistrationRequestsRequest` | GET | `/host/registration-request` | Collection of `RegistrationRequest` |
| `Host\RegistrationRequest\GetRegistrationRequestRequest` | GET | `/host/registration-request/{id}` | `RegistrationRequest` or null |
| `Host\RegistrationRequest\DenyRegistrationRequestRequest` | POST | `/host/registration-request/deny` | true |
| `Host\RegistrationRequest\DeleteRegistrationRequestViaPostRequest` | POST | `/host/registration-request/{id}/delete` | true |
| `Host\RegistrationRequest\DeleteManyRegistrationRequestsRequest` | POST | `/host/registration-request/delete` | true |
| `Host\RegistrationRequest\ApproveRegistrationRequestRequest` | POST | `/host/registration-request/approve` | true |
| `Host\RegistrationRequest\DeleteRegistrationRequestRequest` | DELETE | `/host/registration-request/{id}` | true |
| `Host\ScannedApplication\GetScannedApplicationsRequest` | GET | `/host/scanned-application` | Collection of `ScannedApplication` |
| `Host\ScannedApplication\GetScannedApplicationRequest` | GET | `/host/scanned-application/{id}` | `ScannedApplication` or null |
| `Host\ScannedApplication\GetScannedApplicationForHostRequest` | GET | `/host/scanned-application/for-host` | Collection of `ScannedApplication` |
| `Host\ScannedApplication\GetScannedApplicationUsageRequest` | GET | `/host/scanned-application/{id}/usage` | Collection of arrays |
| `Host\ScannedApplication\DeleteManyScannedApplicationsRequest` | POST | `/host/scanned-application/delete` | true |
| `Host\ScannedApplication\PostScannedApplicationThreatRequest` | POST | `/host/scanned-application/threat` | true |
| `Host\ScannedApplication\DeleteScannedApplicationViaPostRequest` | POST | `/host/scanned-application/{id}/delete` | true |
| `Host\ScannedApplication\DeleteScannedApplicationRequest` | DELETE | `/host/scanned-application/{id}` | true |
| `Host\ScanResult\GetScanResultsRequest` | GET | `/host/scan` | Collection of `ScanResult` |
| `Host\ScanResult\CreateScanResultRequest` | POST | `/host/scan` | `ScanResult` or null |
| `Host\ScanResult\GetScanResultArchivesRequest` | GET | `/host/scan/archives` | the decoded JSON |
| `Host\ScanResult\GetScanResultArchiveImportStatusRequest` | GET | `/host/scan/archive/import/status` | the number or value FortiNAC answers with |
| `Host\ScanResult\CountScanResultsRequest` | GET | `/host/scan/count` | the number or value FortiNAC answers with |
| `Host\ScanResult\CountAllScanResultsRequest` | GET | `/host/scan/count/all` | the number or value FortiNAC answers with |
| `Host\ScanResult\GetScanResultRequest` | GET | `/host/scan/{id}` | `ScanResult` or null |
| `Host\ScanResult\PostScanResultArchiveCreateRequest` | POST | `/host/scan/archive/create` | true |
| `Host\ScanResult\PostScanResultArchiveImportRequest` | POST | `/host/scan/archive/import` | true |
| `Host\Host\GetHostByIpRequest` | GET | `/host/by-ip/{ip}` | `Host` or null |
| `Host\Host\GetHostByMacRequest` | GET | `/host/by-mac/{mac}` | `Host` or null |
| `Host\Host\CountAllHostsRequest` | GET | `/host/count/all` | the number or value FortiNAC answers with |
| `Host\Host\GetHostDeviceTypesRequest` | GET | `/host/device-types` | Collection of `HostDeviceType` |
| `Host\Host\GetHostConnectedToPortRequest` | GET | `/host/connected-to-port` | the decoded JSON |
| `Host\Host\GetHostRequest` | GET | `/host/{id}` | `Host` or null |
| `Host\Host\GetHostUsageRequest` | GET | `/host/{id}/usage` | Collection of arrays |
| `Host\Host\CountHostsRequest` | GET | `/host/count` | the number or value FortiNAC answers with |
| `Host\Host\GetHostForUserRequest` | GET | `/host/for-user` | `HostsForUser` or null |
| `Host\Host\GetHostGlobalAllowedHostsRequest` | GET | `/host/global-allowed-hosts` | the decoded JSON |
| `Host\Host\GetHostClientFiltersCachedByNameRequest` | GET | `/host/client-filters/cached/{name}` | `HostClientFiltersCachedByName` or null |
| `Host\Host\GetHostPolicyRequest` | GET | `/host/{id}/policy` | true |
| `Host\Host\GetHostClientFiltersRequest` | GET | `/host/client-filters` | Collection of `HostClientFiltersCachedByName` |
| `Host\Host\DeleteManyHostsRequest` | POST | `/host/delete` | true |
| `Host\Host\SetHostRoleRequest` | POST | `/host/set-role` | true |
| `Host\Host\UpdateHostRequest` | POST | `/host/{id}` | `Host` or null |
| `Host\Host\EnableHostRequest` | POST | `/host/{id}/enable` | true |
| `Host\Host\DisableHostRequest` | POST | `/host/{id}/disable` | true |
| `Host\Host\ImportHostHostsRequest` | POST | `/host/import-hosts` | true |
| `Host\Host\PostHostWithAdaptersByIdRequest` | POST | `/host/with-adapters/{id}` | true |
| `Host\Host\SetHostHealthRequest` | POST | `/host/{id}/set-health` | true |
| `Host\Host\DeleteHostViaPostRequest` | POST | `/host/{id}/delete` | true |
| `Host\Host\SetHostExpirationRequest` | POST | `/host/set-expiration` | true |
| `Host\Host\RescanHostWithProfileRequest` | POST | `/host/{id}/rescan-with-profile` | true |
| `Host\Host\SendHostPersistentAgentMessageRequest` | POST | `/host/send-persistent-agent-message` | true |
| `Host\Host\UpdateHostPersistentAgentRequest` | POST | `/host/{id}/update-persistent-agent` | true |
| `Host\Host\DeleteHostRequest` | DELETE | `/host/{id}` | true |
| `Host\Host\GetHostsRequest` | GET | `/host` | Collection of `Host` |
| `Host\Host\GetHostHealthHistoryRequest` | GET | `/host/{id}/health-history` | `HostHealthHistory` or null |
| `Host\Host\GetHostMultifilterRequest` | GET | `/host/multifilter` | Collection of `HostMultifilter` |
| `Host\Host\GetHostMultifilterUsersRequest` | GET | `/host/multifilter/users` | Collection of `HostMultifilter` |
| `Host\Host\GetHostNcmPodsRequest` | GET | `/host/ncm-pods` | Collection of `HostNcmPod` |
| `Host\Host\GetHostSearchRequest` | GET | `/host/search` | the decoded JSON |
| `Host\Host\CreateHostRequest` | POST | `/host` | `Host` or null |
| `Host\Host\DisableHostByIpRequest` | POST | `/host/disable-by-ip` | true |
| `Host\Host\DisableHostByMacRequest` | POST | `/host/disable-by-mac` | true |
| `Host\Host\EnableHostByIpRequest` | POST | `/host/enable-by-ip` | true |
| `Host\Host\EnableHostByMacRequest` | POST | `/host/enable-by-mac` | true |
| `Host\Host\RegisterHostAsDeviceRequest` | POST | `/host/register-as-device` | true |
| `Host\Host\SetHostLoggedOnUserRequest` | POST | `/host/set-logged-on-user` | true |
| `Host\Host\PostHostWithAdaptersRequest` | POST | `/host/with-adapters` | `Host` or null |

## Dynamic

`FortiNac::firewallSessions()`

| Call | Returns |
|---|---|
| `FortiNac::firewallSessions()` | a builder over `FirewallSession` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::firewallSessions()->pollingRun(int $id, array $options)` | true |
| `FortiNac::firewallSessions()->pollingById(int $id)` | true |
| `FortiNac::firewallSessions()->hostById(int $id)` | the decoded JSON |
| `FortiNac::firewallSessions()->usage(int $id)` | Collection of arrays |
| `FortiNac::firewallSessions()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::firewallSessions()->pollingById2(int $id, array|Data $attributes, array $options)` | `FirewallSessionPollingById` or null |
| `FortiNac::firewallSessions()->deleteMany(array $ids)` | true |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Dynamic\FirewallSession\GetFirewallSessionRequest` | GET | `/dynamic/dynamic-connection/{id}` | `FirewallSession` or null |
| `Dynamic\FirewallSession\GetFirewallSessionsRequest` | GET | `/dynamic/dynamic-connection` | Collection of `FirewallSession` |
| `Dynamic\FirewallSession\PostFirewallSessionPollingRunRequest` | POST | `/dynamic/dynamic-connection/polling/{id}/run` | true |
| `Dynamic\FirewallSession\GetFirewallSessionPollingByIdRequest` | GET | `/dynamic/dynamic-connection/polling/{id}` | true |
| `Dynamic\FirewallSession\GetFirewallSessionHostByIdRequest` | GET | `/dynamic/dynamic-connection/host/{id}` | the decoded JSON |
| `Dynamic\FirewallSession\GetFirewallSessionUsageRequest` | GET | `/dynamic/dynamic-connection/{id}/usage` | Collection of arrays |
| `Dynamic\FirewallSession\DeleteFirewallSessionViaPostRequest` | POST | `/dynamic/dynamic-connection/{id}/delete` | true |
| `Dynamic\FirewallSession\PostFirewallSessionPollingByIdRequest` | POST | `/dynamic/dynamic-connection/polling/{id}` | `FirewallSessionPollingById` or null |
| `Dynamic\FirewallSession\CreateFirewallSessionRequest` | POST | `/dynamic/dynamic-connection` | `FirewallSession` or null |
| `Dynamic\FirewallSession\UpdateFirewallSessionRequest` | POST | `/dynamic/dynamic-connection/{id}` | `FirewallSession` or null |
| `Dynamic\FirewallSession\DeleteManyFirewallSessionsRequest` | POST | `/dynamic/dynamic-connection/delete` | true |
| `Dynamic\FirewallSession\DeleteFirewallSessionRequest` | DELETE | `/dynamic/dynamic-connection/{id}` | true |

## Logging

`FortiNac::logging()`

| Call | Returns |
|---|---|
| `FortiNac::logging()->alarms()` | a builder over `Alarm` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `delete()` |
| `FortiNac::logging()->alarms()->countAll()` | the number of records |
| `FortiNac::logging()->alarms()->archive()` | the decoded JSON |
| `FortiNac::logging()->alarms()->archiveImportStatus()` | the number or value FortiNAC answers with |
| `FortiNac::logging()->alarms()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::logging()->alarms()->monitor(int $id)` | true |
| `FortiNac::logging()->alarms()->supportingInfo()` | true |
| `FortiNac::logging()->alarms()->acknowledge(array $options)` | true |
| `FortiNac::logging()->alarms()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::logging()->alarms()->archiveImport(array $options)` | true |
| `FortiNac::logging()->alarms()->deleteMany(array $ids)` | true |
| `FortiNac::logging()->alarms()->acknowledge2(int $id, array $options)` | true |
| `FortiNac::logging()->alarms()->stopMonitor(int $id, array $options)` | true |
| `FortiNac::logging()->alarms()->startMonitor(array $options)` | Collection of `AlarmStartAlarmMonitor` |
| `FortiNac::logging()->audit()` | a builder over `AuditLogEntry` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)` |
| `FortiNac::logging()->connections()` | a builder over `ConnectionLogEntry` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)` |
| `FortiNac::logging()->connections()->countAll()` | the number of records |
| `FortiNac::logging()->connections()->archive()` | the decoded JSON |
| `FortiNac::logging()->connections()->archiveImportStatus()` | the number or value FortiNAC answers with |
| `FortiNac::logging()->connections()->bySession(Query|array $query)` | Collection of `ConnectionLogEntry` |
| `FortiNac::logging()->connections()->tabledatatotals(array $options)` | true |
| `FortiNac::logging()->connections()->topHostsActivity(array $options)` | `ConnectionLogEntryTopHostsActivity` or null |
| `FortiNac::logging()->connections()->topUsersConnectedTime(array $options)` | `ConnectionLogEntryTopUsersConnectedTime` or null |
| `FortiNac::logging()->connections()->vlanChanges(array $options)` | true |
| `FortiNac::logging()->connections()->archiveImport(array $options)` | true |
| `FortiNac::logging()->eventAlarmMappings()` | a builder over `EventAlarmMapping` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::logging()->eventAlarmMappings()->countAll()` | the number of records |
| `FortiNac::logging()->eventAlarmMappings()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::logging()->eventAlarmMappings()->supportingInfo()` | true |
| `FortiNac::logging()->eventAlarmMappings()->deleteMany(array $ids)` | true |
| `FortiNac::logging()->eventAlarmMappings()->disableMany(array $ids)` | true |
| `FortiNac::logging()->eventAlarmMappings()->enableMany(array $ids)` | true |
| `FortiNac::logging()->eventAlarmMappings()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::logging()->eventAlarmMappings()->modify(array $options)` | true |
| `FortiNac::logging()->eventTypes()` | a builder over `EventType` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)` |
| `FortiNac::logging()->eventTypes()->countAll()` | the number of records |
| `FortiNac::logging()->eventTypes()->countById(int $id)` | `EventType` or null |
| `FortiNac::logging()->eventTypes()->thresholds()` | `EventTypeThresholds` or null |
| `FortiNac::logging()->eventTypes()->group(array $options)` | true |
| `FortiNac::logging()->eventTypes()->loggingStrategy(array $options)` | true |
| `FortiNac::logging()->eventTypes()->thresholds2(array|Data $attributes, array $options)` | `EventTypeThresholds` or null |
| `FortiNac::logging()->events()` | a builder over `Event` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::logging()->events()->archive()` | the decoded JSON |
| `FortiNac::logging()->events()->archiveImportStatus()` | the number or value FortiNAC answers with |
| `FortiNac::logging()->events()->countAll()` | the number of records |
| `FortiNac::logging()->events()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::logging()->events()->monitor(int $id)` | true |
| `FortiNac::logging()->events()->supportingInfo(Query|array $query)` | Collection of arrays |
| `FortiNac::logging()->events()->archiveImport(array $options)` | true |
| `FortiNac::logging()->events()->deleteMany(array $ids)` | true |
| `FortiNac::logging()->events()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::logging()->events()->startMonitor(array $options)` | Collection of `Event` |
| `FortiNac::logging()->events()->stopMonitor(int $id, array $options)` | true |
| `FortiNac::logging()->events()->note(array $options)` | true |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Logging\Alarm\GetAlarmsRequest` | GET | `/logging/alarm` | Collection of `Alarm` |
| `Logging\Alarm\CountAlarmsRequest` | GET | `/logging/alarm/count` | the number or value FortiNAC answers with |
| `Logging\Alarm\CountAllAlarmsRequest` | GET | `/logging/alarm/count/all` | the number or value FortiNAC answers with |
| `Logging\Alarm\GetAlarmArchiveRequest` | GET | `/logging/alarm/archive` | the decoded JSON |
| `Logging\Alarm\GetAlarmArchiveImportStatusRequest` | GET | `/logging/alarm/archive/import/status` | the number or value FortiNAC answers with |
| `Logging\Alarm\GetAlarmRequest` | GET | `/logging/alarm/{id}` | `Alarm` or null |
| `Logging\Alarm\GetAlarmUsageRequest` | GET | `/logging/alarm/{id}/usage` | Collection of arrays |
| `Logging\Alarm\GetAlarmMonitorRequest` | GET | `/logging/alarm/monitor/{id}` | true |
| `Logging\Alarm\GetAlarmSupportingInfoRequest` | GET | `/logging/alarm/supporting-info` | true |
| `Logging\Alarm\AcknowledgeAlarmRequest` | POST | `/logging/alarm/acknowledge` | true |
| `Logging\Alarm\DeleteAlarmViaPostRequest` | POST | `/logging/alarm/{id}/delete` | true |
| `Logging\Alarm\PostAlarmArchiveImportRequest` | POST | `/logging/alarm/archive/import` | true |
| `Logging\Alarm\DeleteManyAlarmsRequest` | POST | `/logging/alarm/delete` | true |
| `Logging\Alarm\AcknowledgeAlarm2Request` | POST | `/logging/alarm/{id}/acknowledge` | true |
| `Logging\Alarm\StopAlarmMonitorRequest` | POST | `/logging/alarm/monitor/{id}/stop` | true |
| `Logging\Alarm\StartAlarmMonitorRequest` | POST | `/logging/alarm/monitor/start` | Collection of `AlarmStartAlarmMonitor` |
| `Logging\Alarm\DeleteAlarmRequest` | DELETE | `/logging/alarm/{id}` | true |
| `Logging\AuditLogEntry\GetAuditLogEntriesRequest` | GET | `/logging/audit` | Collection of `AuditLogEntry` |
| `Logging\AuditLogEntry\CountAuditLogEntriesRequest` | GET | `/logging/audit/count` | the number or value FortiNAC answers with |
| `Logging\ConnectionLogEntry\GetConnectionLogEntriesRequest` | GET | `/logging/connection` | Collection of `ConnectionLogEntry` |
| `Logging\ConnectionLogEntry\CountAllConnectionLogEntriesRequest` | GET | `/logging/connection/count/all` | the number or value FortiNAC answers with |
| `Logging\ConnectionLogEntry\GetConnectionLogEntryArchiveRequest` | GET | `/logging/connection/archive` | the decoded JSON |
| `Logging\ConnectionLogEntry\GetConnectionLogEntryArchiveImportStatusRequest` | GET | `/logging/connection/archive/import/status` | the number or value FortiNAC answers with |
| `Logging\ConnectionLogEntry\GetConnectionLogEntryBySessionRequest` | GET | `/logging/connection/by-session` | Collection of `ConnectionLogEntry` |
| `Logging\ConnectionLogEntry\CountConnectionLogEntriesRequest` | GET | `/logging/connection/count` | the number or value FortiNAC answers with |
| `Logging\ConnectionLogEntry\GetConnectionLogEntryRequest` | GET | `/logging/connection/{id}` | `ConnectionLogEntry` or null |
| `Logging\ConnectionLogEntry\GetConnectionLogEntryTabledatatotalsRequest` | GET | `/logging/connection/tabledatatotals` | true |
| `Logging\ConnectionLogEntry\GetConnectionLogEntryTopHostsActivityRequest` | GET | `/logging/connection/top/hosts/activity` | `ConnectionLogEntryTopHostsActivity` or null |
| `Logging\ConnectionLogEntry\GetConnectionLogEntryTopUsersConnectedTimeRequest` | GET | `/logging/connection/top/users/connected-time` | `ConnectionLogEntryTopUsersConnectedTime` or null |
| `Logging\ConnectionLogEntry\GetConnectionLogEntryVlanChangesRequest` | GET | `/logging/connection/vlan/changes` | true |
| `Logging\ConnectionLogEntry\PostConnectionLogEntryArchiveImportRequest` | POST | `/logging/connection/archive/import` | true |
| `Logging\EventAlarmMapping\DeleteEventAlarmMappingRequest` | DELETE | `/logging/event-alarm-mapping/{id}` | true |
| `Logging\EventAlarmMapping\GetEventAlarmMappingsRequest` | GET | `/logging/event-alarm-mapping` | Collection of `EventAlarmMapping` |
| `Logging\EventAlarmMapping\CountAllEventAlarmMappingsRequest` | GET | `/logging/event-alarm-mapping/count/all` | the number or value FortiNAC answers with |
| `Logging\EventAlarmMapping\CountEventAlarmMappingsRequest` | GET | `/logging/event-alarm-mapping/count` | the number or value FortiNAC answers with |
| `Logging\EventAlarmMapping\GetEventAlarmMappingRequest` | GET | `/logging/event-alarm-mapping/{id}` | `EventAlarmMapping` or null |
| `Logging\EventAlarmMapping\GetEventAlarmMappingUsageRequest` | GET | `/logging/event-alarm-mapping/{id}/usage` | Collection of arrays |
| `Logging\EventAlarmMapping\GetEventAlarmMappingSupportingInfoRequest` | GET | `/logging/event-alarm-mapping/supporting-info` | true |
| `Logging\EventAlarmMapping\CreateEventAlarmMappingRequest` | POST | `/logging/event-alarm-mapping` | the number or value FortiNAC answers with |
| `Logging\EventAlarmMapping\DeleteManyEventAlarmMappingsRequest` | POST | `/logging/event-alarm-mapping/delete` | true |
| `Logging\EventAlarmMapping\DisableManyEventAlarmMappingsRequest` | POST | `/logging/event-alarm-mapping/disable` | true |
| `Logging\EventAlarmMapping\EnableManyEventAlarmMappingsRequest` | POST | `/logging/event-alarm-mapping/enable` | true |
| `Logging\EventAlarmMapping\UpdateEventAlarmMappingRequest` | POST | `/logging/event-alarm-mapping/{id}` | the number or value FortiNAC answers with |
| `Logging\EventAlarmMapping\DeleteEventAlarmMappingViaPostRequest` | POST | `/logging/event-alarm-mapping/{id}/delete` | true |
| `Logging\EventAlarmMapping\ModifyEventAlarmMappingRequest` | POST | `/logging/event-alarm-mapping/modify` | true |
| `Logging\EventType\GetEventTypesRequest` | GET | `/logging/event-types` | Collection of `EventType` |
| `Logging\EventType\CountEventTypesRequest` | GET | `/logging/event-types/count` | the number or value FortiNAC answers with |
| `Logging\EventType\CountAllEventTypesRequest` | GET | `/logging/event-types/count/all` | the number or value FortiNAC answers with |
| `Logging\EventType\GetEventTypeCountByIdRequest` | GET | `/logging/event-types/count/{id}` | `EventType` or null |
| `Logging\EventType\GetEventTypeThresholdsRequest` | GET | `/logging/event-types/thresholds` | `EventTypeThresholds` or null |
| `Logging\EventType\PostEventTypeGroupRequest` | POST | `/logging/event-types/group` | true |
| `Logging\EventType\PostEventTypeLoggingStrategyRequest` | POST | `/logging/event-types/logging-strategy` | true |
| `Logging\EventType\PostEventTypeThresholdsRequest` | POST | `/logging/event-types/thresholds` | `EventTypeThresholds` or null |
| `Logging\Event\DeleteEventRequest` | DELETE | `/logging/event/{id}` | true |
| `Logging\Event\GetEventsRequest` | GET | `/logging/event` | Collection of `Event` |
| `Logging\Event\GetEventArchiveRequest` | GET | `/logging/event/archive` | the decoded JSON |
| `Logging\Event\GetEventArchiveImportStatusRequest` | GET | `/logging/event/archive/import/status` | the number or value FortiNAC answers with |
| `Logging\Event\CountEventsRequest` | GET | `/logging/event/count` | the number or value FortiNAC answers with |
| `Logging\Event\CountAllEventsRequest` | GET | `/logging/event/count/all` | the number or value FortiNAC answers with |
| `Logging\Event\GetEventRequest` | GET | `/logging/event/{id}` | `Event` or null |
| `Logging\Event\GetEventUsageRequest` | GET | `/logging/event/{id}/usage` | Collection of arrays |
| `Logging\Event\GetEventMonitorRequest` | GET | `/logging/event/monitor/{id}` | true |
| `Logging\Event\GetEventSupportingInfoRequest` | GET | `/logging/event/supporting-info` | Collection of arrays |
| `Logging\Event\CreateEventRequest` | POST | `/logging/event` | `Event` or null |
| `Logging\Event\PostEventArchiveImportRequest` | POST | `/logging/event/archive/import` | true |
| `Logging\Event\DeleteManyEventsRequest` | POST | `/logging/event/delete` | true |
| `Logging\Event\UpdateEventRequest` | POST | `/logging/event/{id}` | `Event` or null |
| `Logging\Event\DeleteEventViaPostRequest` | POST | `/logging/event/{id}/delete` | true |
| `Logging\Event\StartEventMonitorRequest` | POST | `/logging/event/monitor/start` | Collection of `Event` |
| `Logging\Event\StopEventMonitorRequest` | POST | `/logging/event/monitor/{id}/stop` | true |
| `Logging\Event\PostEventNoteRequest` | POST | `/logging/event/note` | true |

## Policy

`FortiNac::policy()`

| Call | Returns |
|---|---|
| `FortiNac::policy()->accessConfigurations()` | a builder over `AccessConfiguration` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->accessConfigurations()->countAll()` | the number of records |
| `FortiNac::policy()->accessConfigurations()->directConfiguration()` | the number or value FortiNAC answers with |
| `FortiNac::policy()->accessConfigurations()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::policy()->accessConfigurations()->supportingInfo()` | true |
| `FortiNac::policy()->accessConfigurations()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->accessConfigurations()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->accessPolicies()` | a builder over `AccessPolicy` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->accessPolicies()->disableMany(array $ids)` | true |
| `FortiNac::policy()->accessPolicies()->supportingInfo()` | true |
| `FortiNac::policy()->accessPolicies()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->accessPolicies()->enableMany(array $ids)` | true |
| `FortiNac::policy()->accessPolicies()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->accessPolicies()->disable(int $id, array $options)` | true |
| `FortiNac::policy()->accessPolicies()->enable(int $id, array $options)` | true |
| `FortiNac::policy()->accessPolicies()->setRank(array $options)` | true |
| `FortiNac::policy()->accessPolicies()->swapRanks(array $options)` | true |
| `FortiNac::policy()->authenticationConfigurations()` | a builder over `AuthenticationConfiguration` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->authenticationConfigurations()->usage(int $id)` | Collection of arrays |
| `FortiNac::policy()->authenticationConfigurations()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->authenticationConfigurations()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->authenticationPolicies()` | a builder over `AuthenticationPolicy` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->authenticationPolicies()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->authenticationPolicies()->disableMany(array $ids)` | true |
| `FortiNac::policy()->authenticationPolicies()->enableMany(array $ids)` | true |
| `FortiNac::policy()->authenticationPolicies()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->authenticationPolicies()->disable(int $id, array $options)` | true |
| `FortiNac::policy()->authenticationPolicies()->enable(int $id, array $options)` | true |
| `FortiNac::policy()->authenticationPolicies()->setRank(array $options)` | true |
| `FortiNac::policy()->authenticationPolicies()->swapRanks(array $options)` | true |
| `FortiNac::policy()->endpointComplianceConfigurations()` | a builder over `EndpointComplianceConfiguration` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->endpointComplianceConfigurations()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::policy()->endpointComplianceConfigurations()->supportingInfo()` | true |
| `FortiNac::policy()->endpointComplianceConfigurations()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->endpointComplianceConfigurations()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->endpointComplianceCustomScans()` | the actions below |
| `FortiNac::policy()->endpointComplianceCustomScans()->html(array $options)` | true |
| `FortiNac::policy()->endpointComplianceCustomScans()->get()` | true |
| `FortiNac::policy()->endpointComplianceCustomScans()->usage(array $options)` | the decoded JSON |
| `FortiNac::policy()->endpointComplianceCustomScans()->customScan(array $options)` | true |
| `FortiNac::policy()->endpointComplianceCustomScans()->customScanDelete(array $options)` | true |
| `FortiNac::policy()->endpointComplianceScans()` | a builder over `EndpointComplianceScan` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->endpointComplianceScans()->available()` | true |
| `FortiNac::policy()->endpointComplianceScans()->countAll()` | the number of records |
| `FortiNac::policy()->endpointComplianceScans()->details(array $options)` | true |
| `FortiNac::policy()->endpointComplianceScans()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::policy()->endpointComplianceScans()->product(array $options)` | true |
| `FortiNac::policy()->endpointComplianceScans()->details2(int $id, array|Data $attributes, array $options)` | true |
| `FortiNac::policy()->endpointComplianceScans()->removePolicyTypes(array $options)` | true |
| `FortiNac::policy()->endpointComplianceScans()->copy(array $options)` | true |
| `FortiNac::policy()->endpointComplianceScans()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->endpointComplianceScans()->details22(array|Data $attributes, array $options)` | true |
| `FortiNac::policy()->endpointComplianceScans()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->endpointCompliancePolicies()` | a builder over `EndpointCompliancePolicy` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->endpointCompliancePolicies()->supportingInfo()` | true |
| `FortiNac::policy()->endpointCompliancePolicies()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->endpointCompliancePolicies()->disableMany(array $ids)` | true |
| `FortiNac::policy()->endpointCompliancePolicies()->enableMany(array $ids)` | true |
| `FortiNac::policy()->endpointCompliancePolicies()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->endpointCompliancePolicies()->disable(int $id, array $options)` | true |
| `FortiNac::policy()->endpointCompliancePolicies()->enable(int $id, array $options)` | true |
| `FortiNac::policy()->endpointCompliancePolicies()->setRank(array $options)` | true |
| `FortiNac::policy()->endpointCompliancePolicies()->swapRanks(array $options)` | true |
| `FortiNac::policy()->eventActions()` | a builder over `EventAction` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->eventActions()->usage(int $id)` | Collection of arrays |
| `FortiNac::policy()->eventActions()->supportingInfo()` | true |
| `FortiNac::policy()->eventActions()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->eventActions()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->logicalNetworkConfigurations()` | a builder over `LogicalNetworkConfiguration` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->logicalNetworkConfigurations()->elementProperties(array $options)` | true |
| `FortiNac::policy()->logicalNetworkConfigurations()->usage(int $id)` | Collection of arrays |
| `FortiNac::policy()->logicalNetworkConfigurations()->radius()` | the decoded JSON |
| `FortiNac::policy()->logicalNetworkConfigurations()->batchUpsert(array|Data $attributes, array $options)` | `LogicalNetworkConfiguration` or null |
| `FortiNac::policy()->logicalNetworkConfigurations()->elementProperties2(array $options)` | true |
| `FortiNac::policy()->logicalNetworkConfigurations()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->logicalNetworkConfigurations()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->logicalNetworkConfigurations()->elementPropertiesByDeviceId(int $deviceId, array|Data $attributes, array $options)` | `LogicalNetworkConfigurationElementPropertiesByDeviceId` or null |
| `FortiNac::policy()->logicalNetworks()` | a builder over `LogicalNetwork` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->logicalNetworks()->addPredefinedNetworkAccess(array $options)` | true |
| `FortiNac::policy()->logicalNetworks()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->logicalNetworks()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->logicalNetworks()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::policy()->portalConfigurations()` | a builder over `PortalConfiguration` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `delete()` |
| `FortiNac::policy()->portalConfigurations()->usage(int $id)` | Collection of arrays |
| `FortiNac::policy()->portalPolicies()` | a builder over `PortalPolicy` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()` |
| `FortiNac::policy()->portalPolicies()->supportingInfo()` | true |
| `FortiNac::policy()->portalPolicies()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->portalPolicies()->disableMany(array $ids)` | true |
| `FortiNac::policy()->portalPolicies()->enableMany(array $ids)` | true |
| `FortiNac::policy()->portalPolicies()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->portalPolicies()->setRank(array $options)` | true |
| `FortiNac::policy()->portalPolicies()->swapRanks(array $options)` | true |
| `FortiNac::policy()->roleMappings()` | a builder over `RoleMapping` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->roleMappings()->usage(int $id, array $options)` | Collection of arrays |
| `FortiNac::policy()->roleMappings()->supportingInfo()` | true |
| `FortiNac::policy()->roleMappings()->directConfiguration()` | the number or value FortiNAC answers with |
| `FortiNac::policy()->roleMappings()->membership(Query|array $query)` | Collection of `RoleMapping` |
| `FortiNac::policy()->roleMappings()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->roleMappings()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->roleMappings()->setRank(array $options)` | true |
| `FortiNac::policy()->roleMappings()->swapRanks(array $options)` | true |
| `FortiNac::policy()->roles()` | a builder over `Role` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->roles()->usage(int $id, array $options)` | Collection of arrays |
| `FortiNac::policy()->roles()->simple()` | true |
| `FortiNac::policy()->roles()->supportingInfo()` | true |
| `FortiNac::policy()->roles()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->roles()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->roles()->setRank(array $options)` | true |
| `FortiNac::policy()->roles()->swapRanks(array $options)` | true |
| `FortiNac::policy()->securityAlarms()` | a builder over `SecurityAlarm` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)` |
| `FortiNac::policy()->securityAlarms()->monitor(int $id)` | true |
| `FortiNac::policy()->securityAlarms()->startMonitor(array $options)` | Collection of `SecurityAlarm` |
| `FortiNac::policy()->securityAlarms()->monitorStop(int $id, array $options)` | true |
| `FortiNac::policy()->securityEventSummary()` | the actions below |
| `FortiNac::policy()->securityEventSummary()->hostsIsolated(array $options)` | the decoded JSON |
| `FortiNac::policy()->securityEventSummary()->alarmsTop(array $options)` | `SecurityEventSummaryAlarmsTop` or null |
| `FortiNac::policy()->securityEventSummary()->eventsTop(array $options)` | `SecurityEventSummaryEventsTop` or null |
| `FortiNac::policy()->securityEventSummary()->dashSecurityHostsForAlarm(array $options)` | the decoded JSON |
| `FortiNac::policy()->securityEventSummary()->hostsTop(array $options)` | `SecurityEventSummaryHostsTop` or null |
| `FortiNac::policy()->securityEventSummary()->hostsRemediated(array $options)` | the decoded JSON |
| `FortiNac::policy()->securityEventSummary()->statistics(array $options)` | `SecurityEventSummaryStatistics` or null |
| `FortiNac::policy()->securityEvents()` | a builder over `SecurityEvent` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)` |
| `FortiNac::policy()->securityEvents()->monitor(int $id)` | true |
| `FortiNac::policy()->securityEvents()->monitorStop(int $id, array $options)` | true |
| `FortiNac::policy()->securityEvents()->startMonitor(array $options)` | Collection of `SecurityEvent` |
| `FortiNac::policy()->securityRuleTriggers()` | a builder over `SecurityRuleTrigger` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->securityRuleTriggers()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::policy()->securityRuleTriggers()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->securityRuleTriggers()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->securityRules()` | a builder over `SecurityRule` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->securityRules()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->securityRules()->disable(int $id, array $options)` | true |
| `FortiNac::policy()->securityRules()->enable(int $id, array $options)` | true |
| `FortiNac::policy()->securityRules()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->securityRules()->setRank(array $options)` | true |
| `FortiNac::policy()->securityRules()->swapRanks(array $options)` | true |
| `FortiNac::policy()->supplicantConfigurations()` | a builder over `SupplicantConfiguration` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->supplicantConfigurations()->usage(int $id)` | Collection of arrays |
| `FortiNac::policy()->supplicantConfigurations()->supportingInfo()` | true |
| `FortiNac::policy()->supplicantConfigurations()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->supplicantConfigurations()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->supplicantPolicies()` | a builder over `SupplicantPolicy` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->supplicantPolicies()->supportingInfo()` | true |
| `FortiNac::policy()->supplicantPolicies()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->supplicantPolicies()->disableMany(array $ids)` | true |
| `FortiNac::policy()->supplicantPolicies()->enableMany(array $ids)` | true |
| `FortiNac::policy()->supplicantPolicies()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::policy()->supplicantPolicies()->disable(int $id, array $options)` | true |
| `FortiNac::policy()->supplicantPolicies()->enable(int $id, array $options)` | true |
| `FortiNac::policy()->supplicantPolicies()->setRank(array $options)` | true |
| `FortiNac::policy()->supplicantPolicies()->swapRanks(array $options)` | true |
| `FortiNac::policy()->userHostProfiles()` | a builder over `UserHostProfile` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::policy()->userHostProfiles()->usage(int $id)` | Collection of arrays |
| `FortiNac::policy()->userHostProfiles()->supportingInfo()` | true |
| `FortiNac::policy()->userHostProfiles()->deleteMany(array $ids)` | true |
| `FortiNac::policy()->userHostProfiles()->deleteViaPost(int $id, array $options)` | true |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Policy\AccessConfiguration\DeleteAccessConfigurationRequest` | DELETE | `/policy/access-configuration/{id}` | true |
| `Policy\AccessConfiguration\GetAccessConfigurationsRequest` | GET | `/policy/access-configuration` | Collection of `AccessConfiguration` |
| `Policy\AccessConfiguration\CountAccessConfigurationsRequest` | GET | `/policy/access-configuration/count` | the number or value FortiNAC answers with |
| `Policy\AccessConfiguration\CountAllAccessConfigurationsRequest` | GET | `/policy/access-configuration/count/all` | the number or value FortiNAC answers with |
| `Policy\AccessConfiguration\GetAccessConfigurationDirectConfigurationRequest` | GET | `/policy/access-configuration/direct-configuration` | the number or value FortiNAC answers with |
| `Policy\AccessConfiguration\GetAccessConfigurationRequest` | GET | `/policy/access-configuration/{id}` | `AccessConfiguration` or null |
| `Policy\AccessConfiguration\GetAccessConfigurationUsageRequest` | GET | `/policy/access-configuration/{id}/usage` | Collection of arrays |
| `Policy\AccessConfiguration\GetAccessConfigurationSupportingInfoRequest` | GET | `/policy/access-configuration/supporting-info` | true |
| `Policy\AccessConfiguration\CreateAccessConfigurationRequest` | POST | `/policy/access-configuration` | the number or value FortiNAC answers with |
| `Policy\AccessConfiguration\DeleteManyAccessConfigurationsRequest` | POST | `/policy/access-configuration/delete` | true |
| `Policy\AccessConfiguration\UpdateAccessConfigurationRequest` | POST | `/policy/access-configuration/{id}` | `AccessConfiguration` or null |
| `Policy\AccessConfiguration\DeleteAccessConfigurationViaPostRequest` | POST | `/policy/access-configuration/{id}/delete` | true |
| `Policy\AccessPolicy\DeleteAccessPolicyRequest` | DELETE | `/policy/access/{id}` | true |
| `Policy\AccessPolicy\GetAccessPoliciesRequest` | GET | `/policy/access` | Collection of `AccessPolicy` |
| `Policy\AccessPolicy\DisableManyAccessPoliciesRequest` | POST | `/policy/access/disable` | true |
| `Policy\AccessPolicy\GetAccessPolicyRequest` | GET | `/policy/access/{id}` | `AccessPolicy` or null |
| `Policy\AccessPolicy\GetAccessPolicySupportingInfoRequest` | GET | `/policy/access/supporting-info` | true |
| `Policy\AccessPolicy\CreateAccessPolicyRequest` | POST | `/policy/access` | the number or value FortiNAC answers with |
| `Policy\AccessPolicy\DeleteManyAccessPoliciesRequest` | POST | `/policy/access/delete` | true |
| `Policy\AccessPolicy\EnableManyAccessPoliciesRequest` | POST | `/policy/access/enable` | true |
| `Policy\AccessPolicy\UpdateAccessPolicyRequest` | POST | `/policy/access/{id}` | `AccessPolicy` or null |
| `Policy\AccessPolicy\DeleteAccessPolicyViaPostRequest` | POST | `/policy/access/{id}/delete` | true |
| `Policy\AccessPolicy\DisableAccessPolicyRequest` | POST | `/policy/access/{id}/disable` | true |
| `Policy\AccessPolicy\EnableAccessPolicyRequest` | POST | `/policy/access/{id}/enable` | true |
| `Policy\AccessPolicy\SetAccessPolicyRankRequest` | POST | `/policy/access/rank/set` | true |
| `Policy\AccessPolicy\SwapAccessPolicyRanksRequest` | POST | `/policy/access/rank/swap` | true |
| `Policy\AuthenticationConfiguration\DeleteAuthenticationConfigurationRequest` | DELETE | `/policy/authentication-configuration/{id}` | true |
| `Policy\AuthenticationConfiguration\GetAuthenticationConfigurationsRequest` | GET | `/policy/authentication-configuration` | Collection of `AuthenticationConfiguration` |
| `Policy\AuthenticationConfiguration\GetAuthenticationConfigurationRequest` | GET | `/policy/authentication-configuration/{id}` | `AuthenticationConfiguration` or null |
| `Policy\AuthenticationConfiguration\GetAuthenticationConfigurationUsageRequest` | GET | `/policy/authentication-configuration/{id}/usage` | Collection of arrays |
| `Policy\AuthenticationConfiguration\CreateAuthenticationConfigurationRequest` | POST | `/policy/authentication-configuration` | the number or value FortiNAC answers with |
| `Policy\AuthenticationConfiguration\DeleteManyAuthenticationConfigurationsRequest` | POST | `/policy/authentication-configuration/delete` | true |
| `Policy\AuthenticationConfiguration\UpdateAuthenticationConfigurationRequest` | POST | `/policy/authentication-configuration/{id}` | `AuthenticationConfiguration` or null |
| `Policy\AuthenticationConfiguration\DeleteAuthenticationConfigurationViaPostRequest` | POST | `/policy/authentication-configuration/{id}/delete` | true |
| `Policy\AuthenticationPolicy\DeleteAuthenticationPolicyRequest` | DELETE | `/policy/authentication/{id}` | true |
| `Policy\AuthenticationPolicy\GetAuthenticationPoliciesRequest` | GET | `/policy/authentication` | Collection of `AuthenticationPolicy` |
| `Policy\AuthenticationPolicy\GetAuthenticationPolicyRequest` | GET | `/policy/authentication/{id}` | `AuthenticationPolicy` or null |
| `Policy\AuthenticationPolicy\CreateAuthenticationPolicyRequest` | POST | `/policy/authentication` | `AuthenticationPolicy` or null |
| `Policy\AuthenticationPolicy\DeleteManyAuthenticationPoliciesRequest` | POST | `/policy/authentication/delete` | true |
| `Policy\AuthenticationPolicy\DisableManyAuthenticationPoliciesRequest` | POST | `/policy/authentication/disable` | true |
| `Policy\AuthenticationPolicy\EnableManyAuthenticationPoliciesRequest` | POST | `/policy/authentication/enable` | true |
| `Policy\AuthenticationPolicy\UpdateAuthenticationPolicyRequest` | POST | `/policy/authentication/{id}` | `AuthenticationPolicy` or null |
| `Policy\AuthenticationPolicy\DeleteAuthenticationPolicyViaPostRequest` | POST | `/policy/authentication/{id}/delete` | true |
| `Policy\AuthenticationPolicy\DisableAuthenticationPolicyRequest` | POST | `/policy/authentication/{id}/disable` | true |
| `Policy\AuthenticationPolicy\EnableAuthenticationPolicyRequest` | POST | `/policy/authentication/{id}/enable` | true |
| `Policy\AuthenticationPolicy\SetAuthenticationPolicyRankRequest` | POST | `/policy/authentication/rank/set` | true |
| `Policy\AuthenticationPolicy\SwapAuthenticationPolicyRanksRequest` | POST | `/policy/authentication/rank/swap` | true |
| `Policy\EndpointComplianceConfiguration\DeleteEndpointComplianceConfigurationRequest` | DELETE | `/policy/endpoint-compliance-configuration/{id}` | true |
| `Policy\EndpointComplianceConfiguration\GetEndpointComplianceConfigurationsRequest` | GET | `/policy/endpoint-compliance-configuration` | Collection of `EndpointComplianceConfiguration` |
| `Policy\EndpointComplianceConfiguration\GetEndpointComplianceConfigurationRequest` | GET | `/policy/endpoint-compliance-configuration/{id}` | `EndpointComplianceConfiguration` or null |
| `Policy\EndpointComplianceConfiguration\GetEndpointComplianceConfigurationUsageRequest` | GET | `/policy/endpoint-compliance-configuration/{id}/usage` | Collection of arrays |
| `Policy\EndpointComplianceConfiguration\GetEndpointComplianceConfigurationSupportingInfoRequest` | GET | `/policy/endpoint-compliance-configuration/supporting-info` | true |
| `Policy\EndpointComplianceConfiguration\CreateEndpointComplianceConfigurationRequest` | POST | `/policy/endpoint-compliance-configuration` | the number or value FortiNAC answers with |
| `Policy\EndpointComplianceConfiguration\DeleteManyEndpointComplianceConfigurationsRequest` | POST | `/policy/endpoint-compliance-configuration/delete` | true |
| `Policy\EndpointComplianceConfiguration\UpdateEndpointComplianceConfigurationRequest` | POST | `/policy/endpoint-compliance-configuration/{id}` | the number or value FortiNAC answers with |
| `Policy\EndpointComplianceConfiguration\DeleteEndpointComplianceConfigurationViaPostRequest` | POST | `/policy/endpoint-compliance-configuration/{id}/delete` | true |
| `Policy\EndpointComplianceCustomScan\GetEndpointComplianceCustomScanHtmlRequest` | GET | `/policy/endpoint-compliance/custom-scan/html` | true |
| `Policy\EndpointComplianceCustomScan\GetEndpointComplianceCustomScanRequest` | GET | `/policy/endpoint-compliance/custom-scan` | true |
| `Policy\EndpointComplianceCustomScan\GetEndpointComplianceCustomScanUsageRequest` | GET | `/policy/endpoint-compliance/custom-scan/usage` | the decoded JSON |
| `Policy\EndpointComplianceCustomScan\PostEndpointComplianceCustomScanCustomScanRequest` | POST | `/policy/endpoint-compliance/custom-scan/custom-scan` | true |
| `Policy\EndpointComplianceCustomScan\PostEndpointComplianceCustomScanCustomScanDeleteRequest` | POST | `/policy/endpoint-compliance/custom-scan/custom-scan/delete` | true |
| `Policy\EndpointComplianceScan\DeleteEndpointComplianceScanRequest` | DELETE | `/policy/endpoint-compliance/scan/{id}` | true |
| `Policy\EndpointComplianceScan\GetEndpointComplianceScansRequest` | GET | `/policy/endpoint-compliance/scan` | Collection of `EndpointComplianceScan` |
| `Policy\EndpointComplianceScan\GetEndpointComplianceScanAvailableRequest` | GET | `/policy/endpoint-compliance/scan/available` | true |
| `Policy\EndpointComplianceScan\CountEndpointComplianceScansRequest` | GET | `/policy/endpoint-compliance/scan/count` | the number or value FortiNAC answers with |
| `Policy\EndpointComplianceScan\CountAllEndpointComplianceScansRequest` | GET | `/policy/endpoint-compliance/scan/count/all` | the number or value FortiNAC answers with |
| `Policy\EndpointComplianceScan\GetEndpointComplianceScanDetailsRequest` | GET | `/policy/endpoint-compliance/scan/details` | true |
| `Policy\EndpointComplianceScan\GetEndpointComplianceScanRequest` | GET | `/policy/endpoint-compliance/scan/{id}` | `EndpointComplianceScan` or null |
| `Policy\EndpointComplianceScan\GetEndpointComplianceScanUsageRequest` | GET | `/policy/endpoint-compliance/scan/{id}/usage` | Collection of arrays |
| `Policy\EndpointComplianceScan\GetEndpointComplianceScanProductRequest` | GET | `/policy/endpoint-compliance/scan/product` | true |
| `Policy\EndpointComplianceScan\PostEndpointComplianceScanDetailsRequest` | POST | `/policy/endpoint-compliance/scan/{id}/details` | true |
| `Policy\EndpointComplianceScan\RemoveEndpointComplianceScanPolicyTypesRequest` | POST | `/policy/endpoint-compliance/scan/remove-policy-types` | true |
| `Policy\EndpointComplianceScan\CreateEndpointComplianceScanRequest` | POST | `/policy/endpoint-compliance/scan` | `EndpointComplianceScan` or null |
| `Policy\EndpointComplianceScan\CopyEndpointComplianceScanRequest` | POST | `/policy/endpoint-compliance/scan/copy` | true |
| `Policy\EndpointComplianceScan\DeleteManyEndpointComplianceScansRequest` | POST | `/policy/endpoint-compliance/scan/delete` | true |
| `Policy\EndpointComplianceScan\PostEndpointComplianceScanDetails2Request` | POST | `/policy/endpoint-compliance/scan/details` | true |
| `Policy\EndpointComplianceScan\UpdateEndpointComplianceScanRequest` | POST | `/policy/endpoint-compliance/scan/{id}` | `EndpointComplianceScan` or null |
| `Policy\EndpointComplianceScan\DeleteEndpointComplianceScanViaPostRequest` | POST | `/policy/endpoint-compliance/scan/{id}/delete` | true |
| `Policy\EndpointCompliancePolicy\DeleteEndpointCompliancePolicyRequest` | DELETE | `/policy/endpoint-compliance/{id}` | true |
| `Policy\EndpointCompliancePolicy\GetEndpointCompliancePoliciesRequest` | GET | `/policy/endpoint-compliance` | Collection of `EndpointCompliancePolicy` |
| `Policy\EndpointCompliancePolicy\GetEndpointCompliancePolicyRequest` | GET | `/policy/endpoint-compliance/{id}` | `EndpointCompliancePolicy` or null |
| `Policy\EndpointCompliancePolicy\GetEndpointCompliancePolicySupportingInfoRequest` | GET | `/policy/endpoint-compliance/supporting-info` | true |
| `Policy\EndpointCompliancePolicy\CreateEndpointCompliancePolicyRequest` | POST | `/policy/endpoint-compliance` | `EndpointCompliancePolicy` or null |
| `Policy\EndpointCompliancePolicy\DeleteManyEndpointCompliancePoliciesRequest` | POST | `/policy/endpoint-compliance/delete` | true |
| `Policy\EndpointCompliancePolicy\DisableManyEndpointCompliancePoliciesRequest` | POST | `/policy/endpoint-compliance/disable` | true |
| `Policy\EndpointCompliancePolicy\EnableManyEndpointCompliancePoliciesRequest` | POST | `/policy/endpoint-compliance/enable` | true |
| `Policy\EndpointCompliancePolicy\UpdateEndpointCompliancePolicyRequest` | POST | `/policy/endpoint-compliance/{id}` | `EndpointCompliancePolicy` or null |
| `Policy\EndpointCompliancePolicy\DeleteEndpointCompliancePolicyViaPostRequest` | POST | `/policy/endpoint-compliance/{id}/delete` | true |
| `Policy\EndpointCompliancePolicy\DisableEndpointCompliancePolicyRequest` | POST | `/policy/endpoint-compliance/{id}/disable` | true |
| `Policy\EndpointCompliancePolicy\EnableEndpointCompliancePolicyRequest` | POST | `/policy/endpoint-compliance/{id}/enable` | true |
| `Policy\EndpointCompliancePolicy\SetEndpointCompliancePolicyRankRequest` | POST | `/policy/endpoint-compliance/rank/set` | true |
| `Policy\EndpointCompliancePolicy\SwapEndpointCompliancePolicyRanksRequest` | POST | `/policy/endpoint-compliance/rank/swap` | true |
| `Policy\EventAction\GetEventActionsRequest` | GET | `/policy/event-action` | Collection of `EventAction` |
| `Policy\EventAction\GetEventActionUsageRequest` | GET | `/policy/event-action/{id}/usage` | Collection of arrays |
| `Policy\EventAction\GetEventActionSupportingInfoRequest` | GET | `/policy/event-action/supporting-info` | true |
| `Policy\EventAction\GetEventActionRequest` | GET | `/policy/event-action/{id}` | `EventAction` or null |
| `Policy\EventAction\CreateEventActionRequest` | POST | `/policy/event-action` | `EventAction` or null |
| `Policy\EventAction\DeleteManyEventActionsRequest` | POST | `/policy/event-action/delete` | true |
| `Policy\EventAction\DeleteEventActionViaPostRequest` | POST | `/policy/event-action/{id}/delete` | true |
| `Policy\EventAction\UpdateEventActionRequest` | POST | `/policy/event-action/{id}` | `EventAction` or null |
| `Policy\EventAction\DeleteEventActionRequest` | DELETE | `/policy/event-action/{id}` | true |
| `Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationElementPropertiesRequest` | GET | `/policy/logical-network-configuration/element/properties` | true |
| `Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationsRequest` | GET | `/policy/logical-network-configuration` | Collection of `LogicalNetworkConfiguration` |
| `Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationRequest` | GET | `/policy/logical-network-configuration/{id}` | `LogicalNetworkConfiguration` or null |
| `Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationUsageRequest` | GET | `/policy/logical-network-configuration/{id}/usage` | Collection of arrays |
| `Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationRadiusRequest` | GET | `/policy/logical-network-configuration/radius` | the decoded JSON |
| `Policy\LogicalNetworkConfiguration\CreateLogicalNetworkConfigurationRequest` | POST | `/policy/logical-network-configuration` | `LogicalNetworkConfiguration` or null |
| `Policy\LogicalNetworkConfiguration\BatchLogicalNetworkConfigurationUpsertRequest` | POST | `/policy/logical-network-configuration/batch-upsert` | `LogicalNetworkConfiguration` or null |
| `Policy\LogicalNetworkConfiguration\PostLogicalNetworkConfigurationElementPropertiesRequest` | POST | `/policy/logical-network-configuration/element/properties` | true |
| `Policy\LogicalNetworkConfiguration\DeleteManyLogicalNetworkConfigurationsRequest` | POST | `/policy/logical-network-configuration/delete` | true |
| `Policy\LogicalNetworkConfiguration\DeleteLogicalNetworkConfigurationViaPostRequest` | POST | `/policy/logical-network-configuration/{id}/delete` | true |
| `Policy\LogicalNetworkConfiguration\UpdateLogicalNetworkConfigurationRequest` | POST | `/policy/logical-network-configuration/{id}` | `LogicalNetworkConfiguration` or null |
| `Policy\LogicalNetworkConfiguration\PostLogicalNetworkConfigurationElementPropertiesByDeviceIdRequest` | POST | `/policy/logical-network-configuration/element/properties/{deviceID}` | `LogicalNetworkConfigurationElementPropertiesByDeviceId` or null |
| `Policy\LogicalNetworkConfiguration\DeleteLogicalNetworkConfigurationRequest` | DELETE | `/policy/logical-network-configuration/{id}` | true |
| `Policy\LogicalNetwork\DeleteLogicalNetworkRequest` | DELETE | `/policy/logical-network/{id}` | true |
| `Policy\LogicalNetwork\GetLogicalNetworksRequest` | GET | `/policy/logical-network` | Collection of `LogicalNetwork` |
| `Policy\LogicalNetwork\GetLogicalNetworkRequest` | GET | `/policy/logical-network/{id}` | `LogicalNetwork` or null |
| `Policy\LogicalNetwork\CreateLogicalNetworkRequest` | POST | `/policy/logical-network` | the number or value FortiNAC answers with |
| `Policy\LogicalNetwork\AddLogicalNetworkPredefinedNetworkAccessRequest` | POST | `/policy/logical-network/add-predefined-network-access` | true |
| `Policy\LogicalNetwork\DeleteManyLogicalNetworksRequest` | POST | `/policy/logical-network/delete` | true |
| `Policy\LogicalNetwork\UpdateLogicalNetworkRequest` | POST | `/policy/logical-network/{id}` | `LogicalNetwork` or null |
| `Policy\LogicalNetwork\DeleteLogicalNetworkViaPostRequest` | POST | `/policy/logical-network/{id}/delete` | true |
| `Policy\LogicalNetwork\GetLogicalNetworkUsageRequest` | GET | `/policy/logical-network/{id}/usage` | Collection of arrays |
| `Policy\PortalConfiguration\GetPortalConfigurationsRequest` | GET | `/policy/portal-configuration` | Collection of `PortalConfiguration` |
| `Policy\PortalConfiguration\GetPortalConfigurationRequest` | GET | `/policy/portal-configuration/{id}` | `PortalConfiguration` or null |
| `Policy\PortalConfiguration\GetPortalConfigurationUsageRequest` | GET | `/policy/portal-configuration/{id}/usage` | Collection of arrays |
| `Policy\PortalConfiguration\DeletePortalConfigurationRequest` | DELETE | `/policy/portal-configuration/{id}` | true |
| `Policy\PortalPolicy\GetPortalPoliciesRequest` | GET | `/policy/portal` | Collection of `PortalPolicy` |
| `Policy\PortalPolicy\GetPortalPolicySupportingInfoRequest` | GET | `/policy/portal/supporting-info` | true |
| `Policy\PortalPolicy\GetPortalPolicyRequest` | GET | `/policy/portal/{id}` | `PortalPolicy` or null |
| `Policy\PortalPolicy\CreatePortalPolicyRequest` | POST | `/policy/portal` | `PortalPolicy` or null |
| `Policy\PortalPolicy\DeleteManyPortalPoliciesRequest` | POST | `/policy/portal/delete` | true |
| `Policy\PortalPolicy\DisableManyPortalPoliciesRequest` | POST | `/policy/portal/disable` | true |
| `Policy\PortalPolicy\EnableManyPortalPoliciesRequest` | POST | `/policy/portal/enable` | true |
| `Policy\PortalPolicy\UpdatePortalPolicyRequest` | POST | `/policy/portal/{id}` | `PortalPolicy` or null |
| `Policy\PortalPolicy\DeletePortalPolicyViaPostRequest` | POST | `/policy/portal/{id}/delete` | true |
| `Policy\PortalPolicy\SetPortalPolicyRankRequest` | POST | `/policy/portal/rank/set` | true |
| `Policy\PortalPolicy\SwapPortalPolicyRanksRequest` | POST | `/policy/portal/rank/swap` | true |
| `Policy\RoleMapping\GetRoleMappingUsageRequest` | GET | `/policy/role-mapping/{id}/usage` | Collection of arrays |
| `Policy\RoleMapping\GetRoleMappingRequest` | GET | `/policy/role-mapping/{id}` | `RoleMapping` or null |
| `Policy\RoleMapping\GetRoleMappingsRequest` | GET | `/policy/role-mapping` | Collection of `RoleMapping` |
| `Policy\RoleMapping\GetRoleMappingSupportingInfoRequest` | GET | `/policy/role-mapping/supporting-info` | true |
| `Policy\RoleMapping\GetRoleMappingDirectConfigurationRequest` | GET | `/policy/role-mapping/direct-configuration` | the number or value FortiNAC answers with |
| `Policy\RoleMapping\GetRoleMappingMembershipRequest` | GET | `/policy/role-mapping/membership` | Collection of `RoleMapping` |
| `Policy\RoleMapping\CreateRoleMappingRequest` | POST | `/policy/role-mapping` | `RoleMapping` or null |
| `Policy\RoleMapping\DeleteManyRoleMappingsRequest` | POST | `/policy/role-mapping/delete` | true |
| `Policy\RoleMapping\UpdateRoleMappingRequest` | POST | `/policy/role-mapping/{id}` | `RoleMapping` or null |
| `Policy\RoleMapping\DeleteRoleMappingViaPostRequest` | POST | `/policy/role-mapping/{id}/delete` | true |
| `Policy\RoleMapping\SetRoleMappingRankRequest` | POST | `/policy/role-mapping/rank/set` | true |
| `Policy\RoleMapping\SwapRoleMappingRanksRequest` | POST | `/policy/role-mapping/rank/swap` | true |
| `Policy\RoleMapping\DeleteRoleMappingRequest` | DELETE | `/policy/role-mapping/{id}` | true |
| `Policy\Role\DeleteRoleRequest` | DELETE | `/policy/role/{id}` | true |
| `Policy\Role\GetRolesRequest` | GET | `/policy/role` | Collection of `Role` |
| `Policy\Role\GetRoleRequest` | GET | `/policy/role/{id}` | `Role` or null |
| `Policy\Role\PostRoleUsageRequest` | POST | `/policy/role/{id}/usage` | Collection of arrays |
| `Policy\Role\GetRoleSimpleRequest` | GET | `/policy/role/simple` | true |
| `Policy\Role\GetRoleSupportingInfoRequest` | GET | `/policy/role/supporting-info` | true |
| `Policy\Role\CreateRoleRequest` | POST | `/policy/role` | the number or value FortiNAC answers with |
| `Policy\Role\DeleteManyRolesRequest` | POST | `/policy/role/delete` | true |
| `Policy\Role\UpdateRoleRequest` | POST | `/policy/role/{id}` | `Role` or null |
| `Policy\Role\DeleteRoleViaPostRequest` | POST | `/policy/role/{id}/delete` | true |
| `Policy\Role\SetRoleRankRequest` | POST | `/policy/role/rank/set` | true |
| `Policy\Role\SwapRoleRanksRequest` | POST | `/policy/role/rank/swap` | true |
| `Policy\SecurityAlarm\GetSecurityAlarmsRequest` | GET | `/policy/security-alarm` | Collection of `SecurityAlarm` |
| `Policy\SecurityAlarm\GetSecurityAlarmRequest` | GET | `/policy/security-alarm/{id}` | `SecurityAlarm` or null |
| `Policy\SecurityAlarm\GetSecurityAlarmMonitorRequest` | GET | `/policy/security-alarm/{id}/monitor` | true |
| `Policy\SecurityAlarm\StartSecurityAlarmMonitorRequest` | POST | `/policy/security-alarm/monitor/start` | Collection of `SecurityAlarm` |
| `Policy\SecurityAlarm\PostSecurityAlarmMonitorStopRequest` | POST | `/policy/security-alarm/{id}/monitor/stop` | true |
| `Policy\SecurityEventSummary\GetSecurityEventSummaryHostsIsolatedRequest` | GET | `/policy/security-event-summary/hosts/isolated` | the decoded JSON |
| `Policy\SecurityEventSummary\GetSecurityEventSummaryAlarmsTopRequest` | GET | `/policy/security-event-summary/alarms/top` | `SecurityEventSummaryAlarmsTop` or null |
| `Policy\SecurityEventSummary\GetSecurityEventSummaryEventsTopRequest` | GET | `/policy/security-event-summary/events/top` | `SecurityEventSummaryEventsTop` or null |
| `Policy\SecurityEventSummary\GetSecurityEventSummaryDashSecurityHostsForAlarmRequest` | GET | `/policy/security-event-summary/dash-security-hosts-for-alarm` | the decoded JSON |
| `Policy\SecurityEventSummary\GetSecurityEventSummaryHostsTopRequest` | GET | `/policy/security-event-summary/hosts/top` | `SecurityEventSummaryHostsTop` or null |
| `Policy\SecurityEventSummary\GetSecurityEventSummaryHostsRemediatedRequest` | GET | `/policy/security-event-summary/hosts/remediated` | the decoded JSON |
| `Policy\SecurityEventSummary\GetSecurityEventSummaryStatisticsRequest` | GET | `/policy/security-event-summary/statistics` | `SecurityEventSummaryStatistics` or null |
| `Policy\SecurityEvent\GetSecurityEventsRequest` | GET | `/policy/security-event` | Collection of `SecurityEvent` |
| `Policy\SecurityEvent\GetSecurityEventRequest` | GET | `/policy/security-event/{id}` | `SecurityEvent` or null |
| `Policy\SecurityEvent\GetSecurityEventMonitorRequest` | GET | `/policy/security-event/{id}/monitor` | true |
| `Policy\SecurityEvent\PostSecurityEventMonitorStopRequest` | POST | `/policy/security-event/{id}/monitor/stop` | true |
| `Policy\SecurityEvent\StartSecurityEventMonitorRequest` | POST | `/policy/security-event/monitor/start` | Collection of `SecurityEvent` |
| `Policy\SecurityRuleTrigger\GetSecurityRuleTriggersRequest` | GET | `/policy/security-rule-trigger` | Collection of `SecurityRuleTrigger` |
| `Policy\SecurityRuleTrigger\GetSecurityRuleTriggerUsageRequest` | GET | `/policy/security-rule-trigger/{id}/usage` | Collection of arrays |
| `Policy\SecurityRuleTrigger\GetSecurityRuleTriggerRequest` | GET | `/policy/security-rule-trigger/{id}` | `SecurityRuleTrigger` or null |
| `Policy\SecurityRuleTrigger\CreateSecurityRuleTriggerRequest` | POST | `/policy/security-rule-trigger` | the number or value FortiNAC answers with |
| `Policy\SecurityRuleTrigger\DeleteSecurityRuleTriggerViaPostRequest` | POST | `/policy/security-rule-trigger/{id}/delete` | true |
| `Policy\SecurityRuleTrigger\DeleteManySecurityRuleTriggersRequest` | POST | `/policy/security-rule-trigger/delete` | true |
| `Policy\SecurityRuleTrigger\UpdateSecurityRuleTriggerRequest` | POST | `/policy/security-rule-trigger/{id}` | `SecurityRuleTrigger` or null |
| `Policy\SecurityRuleTrigger\DeleteSecurityRuleTriggerRequest` | DELETE | `/policy/security-rule-trigger/{id}` | true |
| `Policy\SecurityRule\GetSecurityRulesRequest` | GET | `/policy/security-rule` | Collection of `SecurityRule` |
| `Policy\SecurityRule\GetSecurityRuleRequest` | GET | `/policy/security-rule/{id}` | `SecurityRule` or null |
| `Policy\SecurityRule\CreateSecurityRuleRequest` | POST | `/policy/security-rule` | `SecurityRule` or null |
| `Policy\SecurityRule\DeleteManySecurityRulesRequest` | POST | `/policy/security-rule/delete` | true |
| `Policy\SecurityRule\DisableSecurityRuleRequest` | POST | `/policy/security-rule/{id}/disable` | true |
| `Policy\SecurityRule\EnableSecurityRuleRequest` | POST | `/policy/security-rule/{id}/enable` | true |
| `Policy\SecurityRule\DeleteSecurityRuleViaPostRequest` | POST | `/policy/security-rule/{id}/delete` | true |
| `Policy\SecurityRule\UpdateSecurityRuleRequest` | POST | `/policy/security-rule/{id}` | `SecurityRule` or null |
| `Policy\SecurityRule\SetSecurityRuleRankRequest` | POST | `/policy/security-rule/rank/set` | true |
| `Policy\SecurityRule\SwapSecurityRuleRanksRequest` | POST | `/policy/security-rule/rank/swap` | true |
| `Policy\SecurityRule\DeleteSecurityRuleRequest` | DELETE | `/policy/security-rule/{id}` | true |
| `Policy\SupplicantConfiguration\GetSupplicantConfigurationRequest` | GET | `/policy/supplicant-configuration/{id}` | `SupplicantConfiguration` or null |
| `Policy\SupplicantConfiguration\GetSupplicantConfigurationsRequest` | GET | `/policy/supplicant-configuration` | Collection of `SupplicantConfiguration` |
| `Policy\SupplicantConfiguration\GetSupplicantConfigurationUsageRequest` | GET | `/policy/supplicant-configuration/{id}/usage` | Collection of arrays |
| `Policy\SupplicantConfiguration\GetSupplicantConfigurationSupportingInfoRequest` | GET | `/policy/supplicant-configuration/supporting-info` | true |
| `Policy\SupplicantConfiguration\CreateSupplicantConfigurationRequest` | POST | `/policy/supplicant-configuration` | `SupplicantConfiguration` or null |
| `Policy\SupplicantConfiguration\DeleteManySupplicantConfigurationsRequest` | POST | `/policy/supplicant-configuration/delete` | true |
| `Policy\SupplicantConfiguration\UpdateSupplicantConfigurationRequest` | POST | `/policy/supplicant-configuration/{id}` | `SupplicantConfiguration` or null |
| `Policy\SupplicantConfiguration\DeleteSupplicantConfigurationViaPostRequest` | POST | `/policy/supplicant-configuration/{id}/delete` | true |
| `Policy\SupplicantConfiguration\DeleteSupplicantConfigurationRequest` | DELETE | `/policy/supplicant-configuration/{id}` | true |
| `Policy\SupplicantPolicy\GetSupplicantPoliciesRequest` | GET | `/policy/supplicant` | Collection of `SupplicantPolicy` |
| `Policy\SupplicantPolicy\GetSupplicantPolicyRequest` | GET | `/policy/supplicant/{id}` | `SupplicantPolicy` or null |
| `Policy\SupplicantPolicy\GetSupplicantPolicySupportingInfoRequest` | GET | `/policy/supplicant/supporting-info` | true |
| `Policy\SupplicantPolicy\CreateSupplicantPolicyRequest` | POST | `/policy/supplicant` | `SupplicantPolicy` or null |
| `Policy\SupplicantPolicy\DeleteManySupplicantPoliciesRequest` | POST | `/policy/supplicant/delete` | true |
| `Policy\SupplicantPolicy\DisableManySupplicantPoliciesRequest` | POST | `/policy/supplicant/disable` | true |
| `Policy\SupplicantPolicy\EnableManySupplicantPoliciesRequest` | POST | `/policy/supplicant/enable` | true |
| `Policy\SupplicantPolicy\UpdateSupplicantPolicyRequest` | POST | `/policy/supplicant/{id}` | `SupplicantPolicy` or null |
| `Policy\SupplicantPolicy\DeleteSupplicantPolicyViaPostRequest` | POST | `/policy/supplicant/{id}/delete` | true |
| `Policy\SupplicantPolicy\DisableSupplicantPolicyRequest` | POST | `/policy/supplicant/{id}/disable` | true |
| `Policy\SupplicantPolicy\EnableSupplicantPolicyRequest` | POST | `/policy/supplicant/{id}/enable` | true |
| `Policy\SupplicantPolicy\SetSupplicantPolicyRankRequest` | POST | `/policy/supplicant/rank/set` | true |
| `Policy\SupplicantPolicy\SwapSupplicantPolicyRanksRequest` | POST | `/policy/supplicant/rank/swap` | true |
| `Policy\SupplicantPolicy\DeleteSupplicantPolicyRequest` | DELETE | `/policy/supplicant/{id}` | true |
| `Policy\UserHostProfile\GetUserHostProfilesRequest` | GET | `/policy/user-host-profile` | Collection of `UserHostProfile` |
| `Policy\UserHostProfile\GetUserHostProfileRequest` | GET | `/policy/user-host-profile/{id}` | `UserHostProfile` or null |
| `Policy\UserHostProfile\GetUserHostProfileUsageRequest` | GET | `/policy/user-host-profile/{id}/usage` | Collection of arrays |
| `Policy\UserHostProfile\GetUserHostProfileSupportingInfoRequest` | GET | `/policy/user-host-profile/supporting-info` | true |
| `Policy\UserHostProfile\CreateUserHostProfileRequest` | POST | `/policy/user-host-profile` | `UserHostProfile` or null |
| `Policy\UserHostProfile\UpdateUserHostProfileRequest` | POST | `/policy/user-host-profile/{id}` | `UserHostProfile` or null |
| `Policy\UserHostProfile\DeleteManyUserHostProfilesRequest` | POST | `/policy/user-host-profile/delete` | true |
| `Policy\UserHostProfile\DeleteUserHostProfileViaPostRequest` | POST | `/policy/user-host-profile/{id}/delete` | true |
| `Policy\UserHostProfile\DeleteUserHostProfileRequest` | DELETE | `/policy/user-host-profile/{id}` | true |

## Portal

`FortiNac::portalSettings()`

| Call | Returns |
|---|---|
| `FortiNac::portalSettings()` | the setting as `PortalSslSettings`: `get()`, `update()` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Portal\PortalSslSettings\GetPortalSslSettingsRequest` | GET | `/portal/settings/ssl` | `PortalSslSettings` or null |
| `Portal\PortalSslSettings\UpdatePortalSslSettingsRequest` | POST | `/portal/settings/ssl` | `PortalSslSettings` or null |

## Radius

`FortiNac::radius()`

| Call | Returns |
|---|---|
| `FortiNac::radius()->attributeGroups()` | a builder over `RadiusAttributeGroup` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::radius()->attributeGroups()->modelcfgByDeviceId(int $deviceId, array $options)` | the decoded JSON |
| `FortiNac::radius()->attributeGroups()->nameByGroupName(string $groupName, Query|array $query)` | Collection of `RadiusAttributeGroup` |
| `FortiNac::radius()->attributeGroups()->usage(int $attrGroupId)` | the number or value FortiNAC answers with |
| `FortiNac::radius()->attributeGroups()->listAll(Query|array $query)` | Collection of arrays |
| `FortiNac::radius()->attributeGroups()->responsevaluesByLogicalNetworkAttrGrpId(int $deviceAttrGrpId, int $logicalNetworkAttrGrpId)` | the number or value FortiNAC answers with |
| `FortiNac::radius()->attributeGroups()->deleteMany(array $options)` | the number or value FortiNAC answers with |
| `FortiNac::radius()->attributeGroups()->modelcfgByAttrGroupId(int $deviceId, int $attrGroupId, array $options)` | the number or value FortiNAC answers with |
| `FortiNac::radius()->attributeGroups()->deleteModelcfgByDeviceId(int $deviceId, array $options)` | true |
| `FortiNac::radius()->dictionary()` | a builder over `RadiusDictionaryAttribute` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::radius()->dictionary()->attributeByName(string $name)` | `RadiusDictionaryAttribute` or null |
| `FortiNac::radius()->dictionary()->deleteMany(array $ids)` | true |
| `FortiNac::radius()->health()` | the actions below |
| `FortiNac::radius()->health()->get(Query|array $query)` | Collection of `RadiusHealth` |
| `FortiNac::radius()->health()->get2(Query|array $query)` | Collection of `RadiusHealth` |
| `FortiNac::radius()->health()->timeline(Query|array $query)` | Collection of `RadiusHealthTimeline` |
| `FortiNac::radius()->health()->latest(Query|array $query)` | Collection of `RadiusHealthTimeline` |
| `FortiNac::radius()->health()->snapshotInterval()` | the number or value FortiNAC answers with |
| `FortiNac::radius()->servers()` | a builder over `RadiusServer` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::radius()->servers()->activityStatus()` | the number or value FortiNAC answers with |
| `FortiNac::radius()->servers()->eapTypes()` | the decoded JSON |
| `FortiNac::radius()->servers()->global()` | `RadiusServerGlobal` or null |
| `FortiNac::radius()->servers()->status()` | true |
| `FortiNac::radius()->servers()->log(array $options)` | the decoded JSON |
| `FortiNac::radius()->servers()->deleteMany(array $ids)` | true |
| `FortiNac::radius()->servers()->disableMany(array $ids)` | true |
| `FortiNac::radius()->servers()->enableMany(array $ids)` | true |
| `FortiNac::radius()->servers()->nasFixstaleById(int $id, array $options)` | `RadiusServer` or null |
| `FortiNac::radius()->servers()->global2(array|Data $attributes, array $options)` | `RadiusServerGlobalResult` or null |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Radius\RadiusAttributeGroup\GetRadiusAttributeGroupsRequest` | GET | `/radius/attrgroups` | Collection of `RadiusAttributeGroup` |
| `Radius\RadiusAttributeGroup\GetRadiusAttributeGroupModelcfgByDeviceIdRequest` | GET | `/radius/attrgroups/modelcfg/{deviceId}` | the decoded JSON |
| `Radius\RadiusAttributeGroup\GetRadiusAttributeGroupRequest` | GET | `/radius/attrgroups/{attrGroupId}` | `RadiusAttributeGroup` or null |
| `Radius\RadiusAttributeGroup\GetRadiusAttributeGroupNameByGroupNameRequest` | GET | `/radius/attrgroups/name/{groupName}` | Collection of `RadiusAttributeGroup` |
| `Radius\RadiusAttributeGroup\GetRadiusAttributeGroupUsageRequest` | GET | `/radius/attrgroups/{attrGroupId}/usage` | the number or value FortiNAC answers with |
| `Radius\RadiusAttributeGroup\GetRadiusAttributeGroupListRequest` | GET | `/radius/attrgroups/list` | Collection of arrays |
| `Radius\RadiusAttributeGroup\GetRadiusAttributeGroupResponsevaluesByLogicalNetworkAttrGrpIdRequest` | GET | `/radius/attrgroups/responsevalues/{deviceAttrGrpId}/{logicalNetworkAttrGrpId}` | the number or value FortiNAC answers with |
| `Radius\RadiusAttributeGroup\CreateRadiusAttributeGroupRequest` | POST | `/radius/attrgroups` | `RadiusAttributeGroup` or null |
| `Radius\RadiusAttributeGroup\DeleteManyRadiusAttributeGroupsRequest` | POST | `/radius/attrgroups/delete` | the number or value FortiNAC answers with |
| `Radius\RadiusAttributeGroup\PostRadiusAttributeGroupModelcfgByAttrGroupIdRequest` | POST | `/radius/attrgroups/modelcfg/{deviceId}/{attrGroupId}` | the number or value FortiNAC answers with |
| `Radius\RadiusAttributeGroup\UpdateRadiusAttributeGroupRequest` | POST | `/radius/attrgroups/{id}` | `RadiusAttributeGroup` or null |
| `Radius\RadiusAttributeGroup\DeleteRadiusAttributeGroupRequest` | DELETE | `/radius/attrgroups/{id}` | true |
| `Radius\RadiusAttributeGroup\DeleteRadiusAttributeGroupModelcfgByDeviceIdRequest` | DELETE | `/radius/attrgroups/modelcfg/{deviceId}` | true |
| `Radius\RadiusDictionaryAttribute\GetRadiusDictionaryAttributesRequest` | GET | `/radius/dictionary` | Collection of `RadiusDictionaryAttribute` |
| `Radius\RadiusDictionaryAttribute\GetRadiusDictionaryAttributeAttributeByNameRequest` | GET | `/radius/dictionary/attribute/{name}` | `RadiusDictionaryAttribute` or null |
| `Radius\RadiusDictionaryAttribute\CreateRadiusDictionaryAttributeRequest` | POST | `/radius/dictionary` | `RadiusDictionaryAttribute` or null |
| `Radius\RadiusDictionaryAttribute\DeleteManyRadiusDictionaryAttributesRequest` | POST | `/radius/dictionary/delete` | true |
| `Radius\RadiusDictionaryAttribute\UpdateRadiusDictionaryAttributeRequest` | POST | `/radius/dictionary/{id}` | `RadiusDictionaryAttribute` or null |
| `Radius\RadiusDictionaryAttribute\DeleteRadiusDictionaryAttributeRequest` | DELETE | `/radius/dictionary/{id}` | true |
| `Radius\RadiusHealth\GetRadiusHealthRequest` | GET | `/radius/radius-health` | Collection of `RadiusHealth` |
| `Radius\RadiusHealth\GetRadiusHealth2Request` | GET | `/radius/radius-health-details` | Collection of `RadiusHealth` |
| `Radius\RadiusHealth\GetRadiusHealthTimelineRequest` | GET | `/radius/radius-health/timeline` | Collection of `RadiusHealthTimeline` |
| `Radius\RadiusHealth\GetRadiusHealthLatestRequest` | GET | `/radius/radius-health/latest` | Collection of `RadiusHealthTimeline` |
| `Radius\RadiusHealth\GetRadiusHealthSnapshotIntervalRequest` | GET | `/radius/radius-health/snapshot-interval` | the number or value FortiNAC answers with |
| `Radius\RadiusServer\GetRadiusServerActivityStatusRequest` | GET | `/radius/radius-server-config/activityStatus` | the number or value FortiNAC answers with |
| `Radius\RadiusServer\GetRadiusServerEapTypesRequest` | GET | `/radius/radius-server-config/eap-types` | the decoded JSON |
| `Radius\RadiusServer\GetRadiusServerGlobalRequest` | GET | `/radius/radius-server-config/global` | `RadiusServerGlobal` or null |
| `Radius\RadiusServer\GetRadiusServerRequest` | GET | `/radius/radius-server-config/{id}` | `RadiusServer` or null |
| `Radius\RadiusServer\GetRadiusServerStatusRequest` | GET | `/radius/radius-server-config/status` | true |
| `Radius\RadiusServer\GetRadiusServersRequest` | GET | `/radius/radius-server-config` | Collection of `RadiusServer` |
| `Radius\RadiusServer\GetRadiusServerLogRequest` | GET | `/radius/radius-server-config/log` | the decoded JSON |
| `Radius\RadiusServer\DeleteManyRadiusServersRequest` | POST | `/radius/radius-server-config/delete` | true |
| `Radius\RadiusServer\DisableManyRadiusServersRequest` | POST | `/radius/radius-server-config/disable` | true |
| `Radius\RadiusServer\EnableManyRadiusServersRequest` | POST | `/radius/radius-server-config/enable` | true |
| `Radius\RadiusServer\UpdateRadiusServerRequest` | POST | `/radius/radius-server-config/{id}` | Collection of `RadiusServer` |
| `Radius\RadiusServer\PostRadiusServerNasFixstaleByIdRequest` | POST | `/radius/radius-server-config/nas/fixstale/{id}` | `RadiusServer` or null |
| `Radius\RadiusServer\PostRadiusServerGlobalRequest` | POST | `/radius/radius-server-config/global` | `RadiusServerGlobalResult` or null |
| `Radius\RadiusServer\CreateRadiusServerRequest` | POST | `/radius/radius-server-config` | `RadiusServer` or null |
| `Radius\RadiusServer\DeleteRadiusServerRequest` | DELETE | `/radius/radius-server-config/{id}` | true |

## Settings

`FortiNac::settings()`

| Call | Returns |
|---|---|
| `FortiNac::settings()->agentUpdate()` | the setting as `AgentUpdate`: `get()`, `update()` |
| `FortiNac::settings()->agentUpdate()->resetCounter(array $options)` | true |
| `FortiNac::settings()->agentPackages()` | a builder over `AgentPackage` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `delete()` |
| `FortiNac::settings()->agentPackages()->availableAgents()` | true |
| `FortiNac::settings()->agentPackages()->deleteViaPost(string $packageFile, array $options)` | true |
| `FortiNac::settings()->credentialConfig()` | the setting as `CredentialConfig`: `get()`, `update()` |
| `FortiNac::settings()->directoryAgents()` | a builder over `DirectoryAgent` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->directoryAgents()->directoryGroups()` | the decoded JSON |
| `FortiNac::settings()->directoryAgents()->groups(Query|array $query)` | Collection of arrays |
| `FortiNac::settings()->directoryAgents()->usage(int $id)` | Collection of arrays |
| `FortiNac::settings()->directoryAgents()->subnet()` | the decoded JSON |
| `FortiNac::settings()->directoryAgents()->subnetTest()` | the decoded JSON |
| `FortiNac::settings()->directoryAgents()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->directoryAgents()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->directoryAgents()->subnet2(array $options)` | true |
| `FortiNac::settings()->directoryAgents()->disable(int $id, array $options)` | true |
| `FortiNac::settings()->directoryAgents()->test(array $options)` | true |
| `FortiNac::settings()->directoryAgents()->swapRanks(array $options)` | true |
| `FortiNac::settings()->directoryAgents()->subnetDelete(array|Data $attributes, array $options)` | true |
| `FortiNac::settings()->directoryAgents()->setRank(array $options)` | true |
| `FortiNac::settings()->directoryAgents()->enable(int $id, array $options)` | true |
| `FortiNac::settings()->paPacketTransportConfigs()` | a builder over `PaPacketTransportConfig` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->paPacketTransportConfigs()->usage(int $id)` | Collection of arrays |
| `FortiNac::settings()->paPacketTransportConfigs()->performance()` | the decoded JSON |
| `FortiNac::settings()->paPacketTransportConfigs()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->paPacketTransportConfigs()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->paPacketTransportConfigs()->deploy(array $options)` | true |
| `FortiNac::settings()->agentProperties()` | the setting as `AgentProperties`: `get()`, `update()` |
| `FortiNac::settings()->statusNotifications()` | the setting as `StatusNotifications`: `get()`, `update()` |
| `FortiNac::settings()->accessPointManagement()` | the actions below |
| `FortiNac::settings()->accessPointManagement()->get(Query|array $query)` | Collection of `AccessPointManagement` |
| `FortiNac::settings()->allowedDomains()` | the setting as `AllowedDomains`: `get()`, `update()` |
| `FortiNac::settings()->allowedDomains()->reset(array $options)` | true |
| `FortiNac::settings()->deviceProfiler()` | the setting as `DeviceProfilerSettings`: `get()`, `update()` |
| `FortiNac::settings()->deviceTypes()` | a builder over `DeviceType` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->deviceTypes()->usage(int $id)` | Collection of arrays |
| `FortiNac::settings()->deviceTypes()->imageArchive()` | `DeviceTypeImageArchive` or null |
| `FortiNac::settings()->deviceTypes()->createFromArchive(array $options)` | true |
| `FortiNac::settings()->deviceTypes()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->deviceTypes()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->macExclusions()` | the actions below |
| `FortiNac::settings()->macExclusions()->get(Query|array $query)` | Collection of `MacExclusion` |
| `FortiNac::settings()->macExclusions()->deleteMany(array $options)` | true |
| `FortiNac::settings()->macExclusions()->create(array $options)` | `MacExclusion` or null |
| `FortiNac::settings()->natDetection()` | the actions below |
| `FortiNac::settings()->natDetection()->get(Query|array $query)` | Collection of `NatDetection` |
| `FortiNac::settings()->natDetection()->ipRanges(array $options)` | true |
| `FortiNac::settings()->natDetection()->ipRangesDelete(array $options)` | true |
| `FortiNac::settings()->natDetection()->ipRangesById(int $id, array $options)` | true |
| `FortiNac::settings()->networkAddressGroups()` | a builder over `NetworkAddressGroup` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->networkAddressGroups()->usage(int $id)` | Collection of arrays |
| `FortiNac::settings()->networkAddressGroups()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->networkAddressGroups()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->networkAddresses()` | a builder over `NetworkAddress` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->networkAddresses()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::settings()->networkAddresses()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->networkAddresses()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->quarantine()` | the setting as `Quarantine`: `get()`, `update()` |
| `FortiNac::settings()->quarantine()->markAllHostsSafe(array $options)` | true |
| `FortiNac::settings()->rogueDhcpDetection()` | the setting as `RogueDhcpDetection`: `get()`, `update()` |
| `FortiNac::settings()->rogueDhcpDetection()->vlans()` | `RogueDhcpDetectionVlans` or null |
| `FortiNac::settings()->rogueDhcpDetection()->vlan(array $options)` | true |
| `FortiNac::settings()->rogueDhcpDetection()->vlanDelete(array $options)` | true |
| `FortiNac::settings()->aaaMappings()` | the actions below |
| `FortiNac::settings()->aaaMappings()->get()` | true |
| `FortiNac::settings()->aaaMappings()->localDomains()` | the decoded JSON |
| `FortiNac::settings()->aaaMappings()->localDomainsDelete(array $options)` | true |
| `FortiNac::settings()->aaaMappings()->defaults()` | true |
| `FortiNac::settings()->aaaMappings()->localDomains2(array $options)` | true |
| `FortiNac::settings()->aaaMappings()->create(array $options)` | true |
| `FortiNac::settings()->aaaMappings()->defaults2(array $options)` | true |
| `FortiNac::settings()->aaaMappings()->deleteMany(array|Data $attributes, array $options)` | true |
| `FortiNac::settings()->aaaMappings()->swap(array|Data $attributes, array $options)` | `AaaMappingSwapAaaMapping` or null |
| `FortiNac::settings()->aaaServers()` | a builder over `AaaServer` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->aaaServers()->countAll()` | the number of records |
| `FortiNac::settings()->aaaServers()->secret(int $id)` | the decoded JSON |
| `FortiNac::settings()->aaaServers()->supportsValidation()` | the number or value FortiNAC answers with |
| `FortiNac::settings()->aaaServers()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::settings()->aaaServers()->validateUserPassword(int $id)` | the decoded JSON |
| `FortiNac::settings()->aaaServers()->validateById(int $id)` | `AaaServerValidateById` or null |
| `FortiNac::settings()->aaaServers()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->aaaServers()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->aaaServers()->validate(array|Data $attributes, array $options)` | `AaaServerValidateAaaServer` or null |
| `FortiNac::settings()->email()` | the actions below |
| `FortiNac::settings()->email()->create(array $options)` | `EmailSettings` or null |
| `FortiNac::settings()->email()->password(array $options)` | true |
| `FortiNac::settings()->email()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->email()->test(array $options)` | true |
| `FortiNac::settings()->firewallTags()` | a builder over `FirewallTag` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->firewallTags()->usage(int $id)` | Collection of arrays |
| `FortiNac::settings()->firewallTags()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->firewallTags()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->fsso()` | the setting as `FssoSettings`: `get()`, `update()` |
| `FortiNac::settings()->fsso()->password()` | the decoded JSON |
| `FortiNac::settings()->google()` | the actions below |
| `FortiNac::settings()->google()->domains()` | the decoded JSON |
| `FortiNac::settings()->google()->clientId()` | true |
| `FortiNac::settings()->google()->domainsSet(array $options)` | true |
| `FortiNac::settings()->google()->clientId2(array $options)` | true |
| `FortiNac::settings()->google()->domainsById(int $id, array $options)` | true |
| `FortiNac::settings()->google()->domainsDelete(array $options)` | true |
| `FortiNac::settings()->google()->domains2(array $options)` | true |
| `FortiNac::settings()->ldap()` | a builder over `LdapServer` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->ldap()->countAll()` | the number of records |
| `FortiNac::settings()->ldap()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::settings()->ldap()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->ldap()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->logReceiver()` | the actions below |
| `FortiNac::settings()->logReceiver()->get(Query|array $query)` | Collection of `LogReceiver` |
| `FortiNac::settings()->logReceiver()->update(array|Data $attributes, array $options)` | `LogReceiver` or null |
| `FortiNac::settings()->logReceiver()->deleteMany(array $options)` | true |
| `FortiNac::settings()->mdm()` | a builder over `MdmServer` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->mdm()->password(int $id)` | the number or value FortiNAC answers with |
| `FortiNac::settings()->mdm()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::settings()->mdm()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->mdm()->authenticate(array $options)` | true |
| `FortiNac::settings()->mdm()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->mdm()->poll(int $id, array $options)` | true |
| `FortiNac::settings()->mdm()->test(int $id, array $options)` | true |
| `FortiNac::settings()->messageTemplates()` | a builder over `MessageTemplate` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->messageTemplates()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::settings()->messageTemplates()->test(array|Data $attributes, array $options)` | the number or value FortiNAC answers with |
| `FortiNac::settings()->messageTemplates()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->messageTemplates()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->messagingGateways()` | a builder over `MessagingGateway` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->messagingGateways()->globalDefaultMessagingGateway()` | the number or value FortiNAC answers with |
| `FortiNac::settings()->messagingGateways()->countAll()` | the number of records |
| `FortiNac::settings()->messagingGateways()->globalMaxLength()` | the number or value FortiNAC answers with |
| `FortiNac::settings()->messagingGateways()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->messagingGateways()->globalDefaultMessagingGateway2(array $options)` | the number or value FortiNAC answers with |
| `FortiNac::settings()->messagingGateways()->globalMaxLength2(array $options)` | true |
| `FortiNac::settings()->messagingGateways()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->messagingGateways()->sendSms(array $options)` | true |
| `FortiNac::settings()->messagingGateways()->disable(int $id, array $options)` | true |
| `FortiNac::settings()->messagingGateways()->test(int $id, array $options)` | true |
| `FortiNac::settings()->messagingGateways()->enable(int $id, array $options)` | true |
| `FortiNac::settings()->patchManagement()` | the actions below |
| `FortiNac::settings()->patchManagement()->get(Query|array $query)` | Collection of `PatchManagement` |
| `FortiNac::settings()->patchManagement()->bigFix(array|Data $attributes, array $options)` | `PatchManagementBigFix` or null |
| `FortiNac::settings()->patchManagement()->patchLinkById(int $id, array|Data $attributes, array $options)` | `PatchManagement` or null |
| `FortiNac::settings()->patchManagement()->propertiesBigFixById(int $id, array $options)` | true |
| `FortiNac::settings()->patchManagement()->propertiesPatchLinkById(int $id, array $options)` | true |
| `FortiNac::settings()->patchManagement()->test(array|Data $attributes, array $options)` | `PatchManagementBigFix` or null |
| `FortiNac::settings()->patchManagement()->testById(int $id, array $options)` | true |
| `FortiNac::settings()->proxy()` | the setting as `ProxySettings`: `get()`, `update()` |
| `FortiNac::settings()->securityEventParsers()` | a builder over `SecurityEventParser` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->securityEventParsers()->recentSyslog(Query|array $query)` | Collection of arrays |
| `FortiNac::settings()->securityEventParsers()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::settings()->securityEventParsers()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->securityEventParsers()->disableMany(array $ids)` | true |
| `FortiNac::settings()->securityEventParsers()->parseMessage(array $options)` | `SecurityEventParserParseSecurityEventParserMessage` or null |
| `FortiNac::settings()->securityEventParsers()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->securityEventParsers()->test(int $id, array|Data $attributes, array $options)` | `SecurityEventParserTestSecurityEventParser` or null |
| `FortiNac::settings()->securityEventParsers()->enableMany(array $ids)` | true |
| `FortiNac::settings()->smsProviders()` | a builder over `SmsProvider` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->smsProviders()->countAll()` | the number of records |
| `FortiNac::settings()->smsProviders()->globalMaxLength()` | the number or value FortiNAC answers with |
| `FortiNac::settings()->smsProviders()->usage(int $id)` | Collection of arrays |
| `FortiNac::settings()->smsProviders()->globalMaxLength2(array $options)` | true |
| `FortiNac::settings()->smsProviders()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->smsProviders()->disable(int $id, array $options)` | true |
| `FortiNac::settings()->smsProviders()->enable(int $id, array $options)` | true |
| `FortiNac::settings()->smsProviders()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->snmp()` | the setting as `SnmpSettings`: `get()`, `update()` |
| `FortiNac::settings()->snmp()->authPssword()` | the decoded JSON |
| `FortiNac::settings()->snmp()->privPssword()` | the decoded JSON |
| `FortiNac::settings()->syslog()` | a builder over `SyslogServer` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->syslog()->usage(int $id)` | true |
| `FortiNac::settings()->syslog()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->syslog()->disable(int $id, array $options)` | true |
| `FortiNac::settings()->syslog()->enable(int $id, array $options)` | true |
| `FortiNac::settings()->syslog()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->trapMibs()` | the actions below |
| `FortiNac::settings()->trapMibs()->get(Query|array $query)` | Collection of `TrapMib` |
| `FortiNac::settings()->trapMibs()->add(array $options)` | true |
| `FortiNac::settings()->trapMibs()->deleteMany(array|Data $attributes, array $options)` | true |
| `FortiNac::settings()->trapMibs()->mibName(array $options)` | true |
| `FortiNac::settings()->trapMibs()->update(array $options)` | true |
| `FortiNac::settings()->trapMibs()->delete(array $options)` | true |
| `FortiNac::settings()->trapMibs()->deleteTrapOid(array $options)` | true |
| `FortiNac::settings()->vendorOuis()` | a builder over `VendorOui` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->vendorOuis()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->vendorOuis()->countAll()` | the number of records |
| `FortiNac::settings()->vendorOuis()->countById(int $id)` | `VendorOui` or null |
| `FortiNac::settings()->vendorOuis()->supportingInfo()` | true |
| `FortiNac::settings()->vendorOuis()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->vulnerabilityScanners()` | a builder over `VulnerabilityScanner` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->vulnerabilityScanners()->scans(int $id, array $options)` | `VulnerabilityScannerScans` or null |
| `FortiNac::settings()->vulnerabilityScanners()->qualysAppliances(int $id, array $options)` | `VulnerabilityScannerScans` or null |
| `FortiNac::settings()->vulnerabilityScanners()->usage(int $id)` | Collection of arrays |
| `FortiNac::settings()->vulnerabilityScanners()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->vulnerabilityScanners()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->vulnerabilityScanners()->poll(int $id, array $options)` | true |
| `FortiNac::settings()->vulnerabilityScanners()->test(int $id, array $options)` | true |
| `FortiNac::settings()->certificates()` | the actions below |
| `FortiNac::settings()->certificates()->get(Query|array $query)` | Collection of arrays |
| `FortiNac::settings()->certificates()->copy(array $options)` | true |
| `FortiNac::settings()->certificates()->csrGenerate(array|Data $attributes, array $options)` | `CertificateCsrGenerate` or null |
| `FortiNac::settings()->certificates()->update(string $name, array $options)` | true |
| `FortiNac::settings()->certificates()->deleteViaPost(string $name, array $options)` | true |
| `FortiNac::settings()->certificates()->deleteServerCert(string $name, array $options)` | true |
| `FortiNac::settings()->certificates()->restart(array $options)` | true |
| `FortiNac::settings()->webServiceDefinitions()` | a builder over `WebServiceDefinition` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->webServiceDefinitions()->usage(int $id)` | Collection of arrays |
| `FortiNac::settings()->webServiceDefinitions()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->webServiceDefinitions()->deploy(array $options)` | true |
| `FortiNac::settings()->webServiceDefinitions()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->fortiGateTelemetry()` | a builder over `FortiGateTelemetry` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->fortiGateTelemetry()->usage(int $id)` | Collection of arrays |
| `FortiNac::settings()->fortiGateTelemetry()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->fortiGateTelemetry()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->tlsServiceConfigurations()` | a builder over `TlsServiceConfiguration` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::settings()->tlsServiceConfigurations()->usage(int $id)` | Collection of arrays |
| `FortiNac::settings()->tlsServiceConfigurations()->radiusciphers(Query|array $query)` | Collection of arrays |
| `FortiNac::settings()->tlsServiceConfigurations()->aliases(array $options)` | `TlsServiceConfigurationAliases` or null |
| `FortiNac::settings()->tlsServiceConfigurations()->deleteMany(array $ids)` | true |
| `FortiNac::settings()->tlsServiceConfigurations()->deploy(array $options)` | true |
| `FortiNac::settings()->tlsServiceConfigurations()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::settings()->osUpdates()` | the actions below |
| `FortiNac::settings()->osUpdates()->get(Query|array $query)` | Collection of `OsUpdate` |
| `FortiNac::settings()->osUpdates()->logs()` | `OsUpdateLogs` or null |
| `FortiNac::settings()->osUpdates()->updateData()` | `OsUpdateUpdateData` or null |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Settings\AgentUpdate\GetAgentUpdateRequest` | GET | `/settings/agent/agent-update` | `AgentUpdate` or null |
| `Settings\AgentUpdate\UpdateAgentUpdateRequest` | POST | `/settings/agent/agent-update` | `AgentUpdate` or null |
| `Settings\AgentUpdate\ResetAgentUpdateCounterRequest` | POST | `/settings/agent/agent-update/reset-counter` | true |
| `Settings\AgentPackage\GetAgentPackagesRequest` | GET | `/settings/agent/agent-packages` | Collection of `AgentPackage` |
| `Settings\AgentPackage\GetAgentPackageAvailableAgentsRequest` | GET | `/settings/agent/agent-packages/available-agents` | true |
| `Settings\AgentPackage\DeleteAgentPackageViaPostRequest` | POST | `/settings/agent/agent-packages/{packageFile}/delete` | true |
| `Settings\AgentPackage\DeleteAgentPackageRequest` | DELETE | `/settings/agent/agent-packages/{packageFile}` | true |
| `Settings\CredentialConfig\GetCredentialConfigRequest` | GET | `/settings/agent/credential-config` | `CredentialConfig` or null |
| `Settings\CredentialConfig\UpdateCredentialConfigRequest` | POST | `/settings/agent/credential-config` | `CredentialConfig` or null |
| `Settings\DirectoryAgent\DeleteDirectoryAgentRequest` | DELETE | `/settings/agent/directory-agent/{id}` | true |
| `Settings\DirectoryAgent\GetDirectoryAgentsRequest` | GET | `/settings/agent/directory-agent` | Collection of `DirectoryAgent` |
| `Settings\DirectoryAgent\GetDirectoryAgentDirectoryGroupsRequest` | GET | `/settings/agent/directory-agent/directory-groups` | the decoded JSON |
| `Settings\DirectoryAgent\GetDirectoryAgentGroupsRequest` | GET | `/settings/agent/directory-agent/groups` | Collection of arrays |
| `Settings\DirectoryAgent\GetDirectoryAgentRequest` | GET | `/settings/agent/directory-agent/{id}` | `DirectoryAgent` or null |
| `Settings\DirectoryAgent\GetDirectoryAgentUsageRequest` | GET | `/settings/agent/directory-agent/{id}/usage` | Collection of arrays |
| `Settings\DirectoryAgent\GetDirectoryAgentSubnetRequest` | GET | `/settings/agent/directory-agent/subnet` | the decoded JSON |
| `Settings\DirectoryAgent\GetDirectoryAgentSubnetTestRequest` | GET | `/settings/agent/directory-agent/subnet/test` | the decoded JSON |
| `Settings\DirectoryAgent\CreateDirectoryAgentRequest` | POST | `/settings/agent/directory-agent` | `DirectoryAgent` or null |
| `Settings\DirectoryAgent\DeleteManyDirectoryAgentsRequest` | POST | `/settings/agent/directory-agent/delete` | true |
| `Settings\DirectoryAgent\UpdateDirectoryAgentRequest` | POST | `/settings/agent/directory-agent/{id}` | `DirectoryAgent` or null |
| `Settings\DirectoryAgent\DeleteDirectoryAgentViaPostRequest` | POST | `/settings/agent/directory-agent/{id}/delete` | true |
| `Settings\DirectoryAgent\PostDirectoryAgentSubnetRequest` | POST | `/settings/agent/directory-agent/subnet` | true |
| `Settings\DirectoryAgent\DisableDirectoryAgentRequest` | POST | `/settings/agent/directory-agent/{id}/disable` | true |
| `Settings\DirectoryAgent\TestDirectoryAgentRequest` | POST | `/settings/agent/directory-agent/test` | true |
| `Settings\DirectoryAgent\SwapDirectoryAgentRanksRequest` | POST | `/settings/agent/directory-agent/rank/swap` | true |
| `Settings\DirectoryAgent\PostDirectoryAgentSubnetDeleteRequest` | POST | `/settings/agent/directory-agent/subnet/delete` | true |
| `Settings\DirectoryAgent\SetDirectoryAgentRankRequest` | POST | `/settings/agent/directory-agent/rank/set` | true |
| `Settings\DirectoryAgent\EnableDirectoryAgentRequest` | POST | `/settings/agent/directory-agent/{id}/enable` | true |
| `Settings\PaPacketTransportConfig\GetPaPacketTransportConfigsRequest` | GET | `/settings/agent/pa-packet-transport-config` | Collection of `PaPacketTransportConfig` |
| `Settings\PaPacketTransportConfig\GetPaPacketTransportConfigUsageRequest` | GET | `/settings/agent/pa-packet-transport-config/{id}/usage` | Collection of arrays |
| `Settings\PaPacketTransportConfig\GetPaPacketTransportConfigPerformanceRequest` | GET | `/settings/agent/pa-packet-transport-config/performance` | the decoded JSON |
| `Settings\PaPacketTransportConfig\GetPaPacketTransportConfigRequest` | GET | `/settings/agent/pa-packet-transport-config/{id}` | `PaPacketTransportConfig` or null |
| `Settings\PaPacketTransportConfig\CreatePaPacketTransportConfigRequest` | POST | `/settings/agent/pa-packet-transport-config` | `PaPacketTransportConfig` or null |
| `Settings\PaPacketTransportConfig\DeleteManyPaPacketTransportConfigsRequest` | POST | `/settings/agent/pa-packet-transport-config/delete` | true |
| `Settings\PaPacketTransportConfig\UpdatePaPacketTransportConfigRequest` | POST | `/settings/agent/pa-packet-transport-config/{id}` | `PaPacketTransportConfig` or null |
| `Settings\PaPacketTransportConfig\DeletePaPacketTransportConfigViaPostRequest` | POST | `/settings/agent/pa-packet-transport-config/{id}/delete` | true |
| `Settings\PaPacketTransportConfig\DeployPaPacketTransportConfigRequest` | POST | `/settings/agent/pa-packet-transport-config/deploy` | true |
| `Settings\PaPacketTransportConfig\DeletePaPacketTransportConfigRequest` | DELETE | `/settings/agent/pa-packet-transport-config/{id}` | true |
| `Settings\AgentProperties\GetAgentPropertiesRequest` | GET | `/settings/agent/properties` | `AgentProperties` or null |
| `Settings\AgentProperties\UpdateAgentPropertiesRequest` | POST | `/settings/agent/properties` | `AgentProperties` or null |
| `Settings\StatusNotifications\UpdateStatusNotificationsRequest` | POST | `/settings/agent/status-notifications` | `StatusNotifications` or null |
| `Settings\StatusNotifications\GetStatusNotificationsRequest` | GET | `/settings/agent/status-notifications` | `StatusNotifications` or null |
| `Settings\AccessPointManagement\GetAccessPointManagementRequest` | GET | `/settings/device/access-point-management` | Collection of `AccessPointManagement` |
| `Settings\AllowedDomains\GetAllowedDomainsRequest` | GET | `/settings/device/allowed-domains` | `AllowedDomains` or null |
| `Settings\AllowedDomains\UpdateAllowedDomainsRequest` | POST | `/settings/device/allowed-domains` | `AllowedDomains` or null |
| `Settings\AllowedDomains\ResetAllowedDomainsRequest` | POST | `/settings/device/allowed-domains/reset` | true |
| `Settings\DeviceProfilerSettings\GetDeviceProfilerSettingsRequest` | GET | `/settings/device/device-profiler` | `DeviceProfilerSettings` or null |
| `Settings\DeviceProfilerSettings\UpdateDeviceProfilerSettingsRequest` | POST | `/settings/device/device-profiler` | `DeviceProfilerSettings` or null |
| `Settings\DeviceType\DeleteDeviceTypeRequest` | DELETE | `/settings/device/device-type/{id}` | true |
| `Settings\DeviceType\GetDeviceTypesRequest` | GET | `/settings/device/device-type` | Collection of `DeviceType` |
| `Settings\DeviceType\GetDeviceTypeRequest` | GET | `/settings/device/device-type/{id}` | `DeviceType` or null |
| `Settings\DeviceType\GetDeviceTypeUsageRequest` | GET | `/settings/device/device-type/{id}/usage` | Collection of arrays |
| `Settings\DeviceType\GetDeviceTypeImageArchiveRequest` | GET | `/settings/device/device-type/image/archive` | `DeviceTypeImageArchive` or null |
| `Settings\DeviceType\CreateDeviceTypeRequest` | POST | `/settings/device/device-type` | `DeviceType` or null |
| `Settings\DeviceType\CreateDeviceTypeFromArchiveRequest` | POST | `/settings/device/device-type/createFromArchive` | true |
| `Settings\DeviceType\DeleteManyDeviceTypesRequest` | POST | `/settings/device/device-type/delete` | true |
| `Settings\DeviceType\UpdateDeviceTypeRequest` | POST | `/settings/device/device-type/{id}` | `DeviceType` or null |
| `Settings\DeviceType\DeleteDeviceTypeViaPostRequest` | POST | `/settings/device/device-type/{id}/delete` | true |
| `Settings\MacExclusion\GetMacExclusionsRequest` | GET | `/settings/device/mac-exclusion` | Collection of `MacExclusion` |
| `Settings\MacExclusion\DeleteManyMacExclusionsRequest` | POST | `/settings/device/mac-exclusion/delete` | true |
| `Settings\MacExclusion\CreateMacExclusionRequest` | POST | `/settings/device/mac-exclusion` | `MacExclusion` or null |
| `Settings\NatDetection\GetNatDetectionRequest` | GET | `/settings/device/NAT-detection` | Collection of `NatDetection` |
| `Settings\NatDetection\PostNatDetectionIpRangesRequest` | POST | `/settings/device/NAT-detection/ip-ranges` | true |
| `Settings\NatDetection\PostNatDetectionIpRangesDeleteRequest` | POST | `/settings/device/NAT-detection/ip-ranges/delete` | true |
| `Settings\NatDetection\PostNatDetectionIpRangesByIdRequest` | POST | `/settings/device/NAT-detection/ip-ranges/{id}` | true |
| `Settings\NetworkAddressGroup\GetNetworkAddressGroupRequest` | GET | `/settings/device/network-address-group/{id}` | `NetworkAddressGroup` or null |
| `Settings\NetworkAddressGroup\GetNetworkAddressGroupsRequest` | GET | `/settings/device/network-address-group` | Collection of `NetworkAddressGroup` |
| `Settings\NetworkAddressGroup\GetNetworkAddressGroupUsageRequest` | GET | `/settings/device/network-address-group/{id}/usage` | Collection of arrays |
| `Settings\NetworkAddressGroup\DeleteManyNetworkAddressGroupsRequest` | POST | `/settings/device/network-address-group/delete` | true |
| `Settings\NetworkAddressGroup\DeleteNetworkAddressGroupViaPostRequest` | POST | `/settings/device/network-address-group/{id}/delete` | true |
| `Settings\NetworkAddressGroup\UpdateNetworkAddressGroupRequest` | POST | `/settings/device/network-address-group/{id}` | `NetworkAddressGroup` or null |
| `Settings\NetworkAddressGroup\CreateNetworkAddressGroupRequest` | POST | `/settings/device/network-address-group` | `NetworkAddressGroup` or null |
| `Settings\NetworkAddressGroup\DeleteNetworkAddressGroupRequest` | DELETE | `/settings/device/network-address-group/{id}` | true |
| `Settings\NetworkAddress\GetNetworkAddressesRequest` | GET | `/settings/device/network-address` | Collection of `NetworkAddress` |
| `Settings\NetworkAddress\GetNetworkAddressRequest` | GET | `/settings/device/network-address/{id}` | `NetworkAddress` or null |
| `Settings\NetworkAddress\GetNetworkAddressUsageRequest` | GET | `/settings/device/network-address/{id}/usage` | Collection of arrays |
| `Settings\NetworkAddress\DeleteManyNetworkAddressesRequest` | POST | `/settings/device/network-address/delete` | true |
| `Settings\NetworkAddress\UpdateNetworkAddressRequest` | POST | `/settings/device/network-address/{id}` | `NetworkAddress` or null |
| `Settings\NetworkAddress\DeleteNetworkAddressViaPostRequest` | POST | `/settings/device/network-address/{id}/delete` | true |
| `Settings\NetworkAddress\CreateNetworkAddressRequest` | POST | `/settings/device/network-address` | `NetworkAddress` or null |
| `Settings\NetworkAddress\DeleteNetworkAddressRequest` | DELETE | `/settings/device/network-address/{id}` | true |
| `Settings\Quarantine\GetQuarantineRequest` | GET | `/settings/device/quarantine` | `Quarantine` or null |
| `Settings\Quarantine\UpdateQuarantineRequest` | POST | `/settings/device/quarantine` | `Quarantine` or null |
| `Settings\Quarantine\MarkQuarantineAllHostsSafeRequest` | POST | `/settings/device/quarantine/mark-all-hosts-safe` | true |
| `Settings\RogueDhcpDetection\GetRogueDhcpDetectionRequest` | GET | `/settings/device/rogue-DHCP-detection` | `RogueDhcpDetection` or null |
| `Settings\RogueDhcpDetection\GetRogueDhcpDetectionVlansRequest` | GET | `/settings/device/rogue-DHCP-detection/vlans` | `RogueDhcpDetectionVlans` or null |
| `Settings\RogueDhcpDetection\UpdateRogueDhcpDetectionRequest` | POST | `/settings/device/rogue-DHCP-detection` | `RogueDhcpDetection` or null |
| `Settings\RogueDhcpDetection\PostRogueDhcpDetectionVlanRequest` | POST | `/settings/device/rogue-DHCP-detection/vlan` | true |
| `Settings\RogueDhcpDetection\PostRogueDhcpDetectionVlanDeleteRequest` | POST | `/settings/device/rogue-DHCP-detection/vlan/delete` | true |
| `Settings\AaaMapping\GetAaaMappingRequest` | GET | `/settings/integration/aaa-mappings` | true |
| `Settings\AaaMapping\GetAaaMappingLocalDomainsRequest` | GET | `/settings/integration/aaa-mappings/local-domains` | the decoded JSON |
| `Settings\AaaMapping\PostAaaMappingLocalDomainsDeleteRequest` | POST | `/settings/integration/aaa-mappings/local-domains/delete` | true |
| `Settings\AaaMapping\GetAaaMappingDefaultsRequest` | GET | `/settings/integration/aaa-mappings/defaults` | true |
| `Settings\AaaMapping\PostAaaMappingLocalDomainsRequest` | POST | `/settings/integration/aaa-mappings/local-domains` | true |
| `Settings\AaaMapping\CreateAaaMappingRequest` | POST | `/settings/integration/aaa-mappings` | true |
| `Settings\AaaMapping\PostAaaMappingDefaultsRequest` | POST | `/settings/integration/aaa-mappings/defaults` | true |
| `Settings\AaaMapping\DeleteManyAaaMappingsRequest` | POST | `/settings/integration/aaa-mappings/delete` | true |
| `Settings\AaaMapping\SwapAaaMappingRequest` | POST | `/settings/integration/aaa-mappings/swap` | `AaaMappingSwapAaaMapping` or null |
| `Settings\AaaServer\DeleteAaaServerRequest` | DELETE | `/settings/integration/aaa/{id}` | true |
| `Settings\AaaServer\GetAaaServersRequest` | GET | `/settings/integration/aaa` | Collection of `AaaServer` |
| `Settings\AaaServer\CountAaaServersRequest` | GET | `/settings/integration/aaa/count` | the number or value FortiNAC answers with |
| `Settings\AaaServer\CountAllAaaServersRequest` | GET | `/settings/integration/aaa/count/all` | the number or value FortiNAC answers with |
| `Settings\AaaServer\GetAaaServerRequest` | GET | `/settings/integration/aaa/{id}` | `AaaServer` or null |
| `Settings\AaaServer\GetAaaServerSecretRequest` | GET | `/settings/integration/aaa/{id}/secret` | the decoded JSON |
| `Settings\AaaServer\GetAaaServerSupportsValidationRequest` | GET | `/settings/integration/aaa/supportsValidation` | the number or value FortiNAC answers with |
| `Settings\AaaServer\GetAaaServerUsageRequest` | GET | `/settings/integration/aaa/{id}/usage` | Collection of arrays |
| `Settings\AaaServer\GetAaaServerValidateUserPasswordRequest` | GET | `/settings/integration/aaa/{id}/validate-user-password` | the decoded JSON |
| `Settings\AaaServer\GetAaaServerValidateByIdRequest` | GET | `/settings/integration/aaa/validate/{id}` | `AaaServerValidateById` or null |
| `Settings\AaaServer\CreateAaaServerRequest` | POST | `/settings/integration/aaa` | `AaaServer` or null |
| `Settings\AaaServer\DeleteManyAaaServersRequest` | POST | `/settings/integration/aaa/delete` | true |
| `Settings\AaaServer\DeleteAaaServerViaPostRequest` | POST | `/settings/integration/aaa/{id}/delete` | true |
| `Settings\AaaServer\UpdateAaaServerRequest` | POST | `/settings/integration/aaa/{id}` | `AaaServer` or null |
| `Settings\AaaServer\ValidateAaaServerRequest` | POST | `/settings/integration/aaa/validate` | `AaaServerValidateAaaServer` or null |
| `Settings\EmailSettings\CreateEmailSettingsRequest` | POST | `/settings/integration/email` | `EmailSettings` or null |
| `Settings\EmailSettings\PostEmailSettingsPasswordRequest` | POST | `/settings/integration/email/password` | true |
| `Settings\EmailSettings\DeleteManyEmailSettingsRequest` | POST | `/settings/integration/email/delete` | true |
| `Settings\EmailSettings\TestEmailSettingsRequest` | POST | `/settings/integration/email/test` | true |
| `Settings\FirewallTag\GetFirewallTagsRequest` | GET | `/settings/integration/firewall-tag` | Collection of `FirewallTag` |
| `Settings\FirewallTag\GetFirewallTagRequest` | GET | `/settings/integration/firewall-tag/{id}` | `FirewallTag` or null |
| `Settings\FirewallTag\GetFirewallTagUsageRequest` | GET | `/settings/integration/firewall-tag/{id}/usage` | Collection of arrays |
| `Settings\FirewallTag\UpdateFirewallTagRequest` | POST | `/settings/integration/firewall-tag/{id}` | `FirewallTag` or null |
| `Settings\FirewallTag\CreateFirewallTagRequest` | POST | `/settings/integration/firewall-tag` | `FirewallTag` or null |
| `Settings\FirewallTag\DeleteManyFirewallTagsRequest` | POST | `/settings/integration/firewall-tag/delete` | true |
| `Settings\FirewallTag\DeleteFirewallTagViaPostRequest` | POST | `/settings/integration/firewall-tag/{id}/delete` | true |
| `Settings\FirewallTag\DeleteFirewallTagRequest` | DELETE | `/settings/integration/firewall-tag/{id}` | true |
| `Settings\FssoSettings\GetFssoSettingsRequest` | GET | `/settings/integration/FSSO` | `FssoSettings` or null |
| `Settings\FssoSettings\GetFssoSettingsPasswordRequest` | GET | `/settings/integration/FSSO/password` | the decoded JSON |
| `Settings\FssoSettings\UpdateFssoSettingsRequest` | POST | `/settings/integration/FSSO` | `FssoSettings` or null |
| `Settings\GoogleSettings\GetGoogleSettingsDomainsRequest` | GET | `/settings/integration/google/domains` | the decoded JSON |
| `Settings\GoogleSettings\GetGoogleSettingsClientIdRequest` | GET | `/settings/integration/google/client-id` | true |
| `Settings\GoogleSettings\PostGoogleSettingsDomainsSetRequest` | POST | `/settings/integration/google/domains/set` | true |
| `Settings\GoogleSettings\PostGoogleSettingsClientIdRequest` | POST | `/settings/integration/google/client-id` | true |
| `Settings\GoogleSettings\PostGoogleSettingsDomainsByIdRequest` | POST | `/settings/integration/google/domains/{id}` | true |
| `Settings\GoogleSettings\PostGoogleSettingsDomainsDeleteRequest` | POST | `/settings/integration/google/domains/delete` | true |
| `Settings\GoogleSettings\PostGoogleSettingsDomainsRequest` | POST | `/settings/integration/google/domains` | true |
| `Settings\LdapServer\DeleteLdapServerRequest` | DELETE | `/settings/integration/ldap/{id}` | true |
| `Settings\LdapServer\GetLdapServersRequest` | GET | `/settings/integration/ldap` | Collection of `LdapServer` |
| `Settings\LdapServer\CountLdapServersRequest` | GET | `/settings/integration/ldap/count` | the number or value FortiNAC answers with |
| `Settings\LdapServer\CountAllLdapServersRequest` | GET | `/settings/integration/ldap/count/all` | the number or value FortiNAC answers with |
| `Settings\LdapServer\GetLdapServerRequest` | GET | `/settings/integration/ldap/{id}` | `LdapServer` or null |
| `Settings\LdapServer\GetLdapServerUsageRequest` | GET | `/settings/integration/ldap/{id}/usage` | Collection of arrays |
| `Settings\LdapServer\CreateLdapServerRequest` | POST | `/settings/integration/ldap` | `LdapServer` or null |
| `Settings\LdapServer\DeleteManyLdapServersRequest` | POST | `/settings/integration/ldap/delete` | true |
| `Settings\LdapServer\UpdateLdapServerRequest` | POST | `/settings/integration/ldap/{id}` | `LdapServer` or null |
| `Settings\LdapServer\DeleteLdapServerViaPostRequest` | POST | `/settings/integration/ldap/{id}/delete` | true |
| `Settings\LogReceiver\GetLogReceiversRequest` | GET | `/settings/integration/log-receiver` | Collection of `LogReceiver` |
| `Settings\LogReceiver\UpdateLogReceiverRequest` | POST | `/settings/integration/log-receiver` | `LogReceiver` or null |
| `Settings\LogReceiver\DeleteManyLogReceiversRequest` | POST | `/settings/integration/log-receiver/delete` | true |
| `Settings\MdmServer\DeleteMdmServerRequest` | DELETE | `/settings/integration/mdm/{id}` | true |
| `Settings\MdmServer\GetMdmServersRequest` | GET | `/settings/integration/mdm` | Collection of `MdmServer` |
| `Settings\MdmServer\GetMdmServerRequest` | GET | `/settings/integration/mdm/{id}` | `MdmServer` or null |
| `Settings\MdmServer\GetMdmServerPasswordRequest` | GET | `/settings/integration/mdm/{id}/password` | the number or value FortiNAC answers with |
| `Settings\MdmServer\GetMdmServerUsageRequest` | GET | `/settings/integration/mdm/{id}/usage` | Collection of arrays |
| `Settings\MdmServer\CreateMdmServerRequest` | POST | `/settings/integration/mdm` | `MdmServer` or null |
| `Settings\MdmServer\DeleteManyMdmServersRequest` | POST | `/settings/integration/mdm/delete` | true |
| `Settings\MdmServer\UpdateMdmServerRequest` | POST | `/settings/integration/mdm/{id}` | `MdmServer` or null |
| `Settings\MdmServer\AuthenticateMdmServerRequest` | POST | `/settings/integration/mdm/authenticate` | true |
| `Settings\MdmServer\DeleteMdmServerViaPostRequest` | POST | `/settings/integration/mdm/{id}/delete` | true |
| `Settings\MdmServer\PollMdmServerRequest` | POST | `/settings/integration/mdm/{id}/poll` | true |
| `Settings\MdmServer\TestMdmServerRequest` | POST | `/settings/integration/mdm/{id}/test` | true |
| `Settings\MessageTemplate\GetMessageTemplatesRequest` | GET | `/settings/integration/message-template` | Collection of `MessageTemplate` |
| `Settings\MessageTemplate\GetMessageTemplateRequest` | GET | `/settings/integration/message-template/{id}` | `MessageTemplate` or null |
| `Settings\MessageTemplate\GetMessageTemplateUsageRequest` | GET | `/settings/integration/message-template/{id}/usage` | Collection of arrays |
| `Settings\MessageTemplate\TestMessageTemplateRequest` | POST | `/settings/integration/message-template/test` | the number or value FortiNAC answers with |
| `Settings\MessageTemplate\DeleteMessageTemplateViaPostRequest` | POST | `/settings/integration/message-template/{id}/delete` | true |
| `Settings\MessageTemplate\UpdateMessageTemplateRequest` | POST | `/settings/integration/message-template/{id}` | `MessageTemplate` or null |
| `Settings\MessageTemplate\DeleteManyMessageTemplatesRequest` | POST | `/settings/integration/message-template/delete` | true |
| `Settings\MessageTemplate\CreateMessageTemplateRequest` | POST | `/settings/integration/message-template` | `MessageTemplate` or null |
| `Settings\MessageTemplate\DeleteMessageTemplateRequest` | DELETE | `/settings/integration/message-template/{id}` | true |
| `Settings\MessagingGateway\GetMessagingGatewaysRequest` | GET | `/settings/integration/messaging-gateway` | Collection of `MessagingGateway` |
| `Settings\MessagingGateway\GetMessagingGatewayGlobalDefaultMessagingGatewayRequest` | GET | `/settings/integration/messaging-gateway/global/default-messaging-gateway` | the number or value FortiNAC answers with |
| `Settings\MessagingGateway\GetMessagingGatewayRequest` | GET | `/settings/integration/messaging-gateway/{id}` | `MessagingGateway` or null |
| `Settings\MessagingGateway\CountAllMessagingGatewaysRequest` | GET | `/settings/integration/messaging-gateway/count/all` | the number or value FortiNAC answers with |
| `Settings\MessagingGateway\GetMessagingGatewayGlobalMaxLengthRequest` | GET | `/settings/integration/messaging-gateway/global/max-length` | the number or value FortiNAC answers with |
| `Settings\MessagingGateway\CountMessagingGatewaysRequest` | GET | `/settings/integration/messaging-gateway/count` | the number or value FortiNAC answers with |
| `Settings\MessagingGateway\DeleteManyMessagingGatewaysRequest` | POST | `/settings/integration/messaging-gateway/delete` | true |
| `Settings\MessagingGateway\CreateMessagingGatewayRequest` | POST | `/settings/integration/messaging-gateway` | the number or value FortiNAC answers with |
| `Settings\MessagingGateway\PostMessagingGatewayGlobalDefaultMessagingGatewayRequest` | POST | `/settings/integration/messaging-gateway/global/default-messaging-gateway` | the number or value FortiNAC answers with |
| `Settings\MessagingGateway\PostMessagingGatewayGlobalMaxLengthRequest` | POST | `/settings/integration/messaging-gateway/global/max-length` | true |
| `Settings\MessagingGateway\UpdateMessagingGatewayRequest` | POST | `/settings/integration/messaging-gateway/{id}` | `MessagingGateway` or null |
| `Settings\MessagingGateway\DeleteMessagingGatewayViaPostRequest` | POST | `/settings/integration/messaging-gateway/{id}/delete` | true |
| `Settings\MessagingGateway\SendMessagingGatewaySmsRequest` | POST | `/settings/integration/messaging-gateway/send-sms` | true |
| `Settings\MessagingGateway\DisableMessagingGatewayRequest` | POST | `/settings/integration/messaging-gateway/{id}/disable` | true |
| `Settings\MessagingGateway\TestMessagingGatewayRequest` | POST | `/settings/integration/messaging-gateway/{id}/test` | true |
| `Settings\MessagingGateway\EnableMessagingGatewayRequest` | POST | `/settings/integration/messaging-gateway/{id}/enable` | true |
| `Settings\MessagingGateway\DeleteMessagingGatewayRequest` | DELETE | `/settings/integration/messaging-gateway/{id}` | true |
| `Settings\PatchManagement\GetPatchManagementRequest` | GET | `/settings/integration/patch-management` | Collection of `PatchManagement` |
| `Settings\PatchManagement\PostPatchManagementBigFixRequest` | POST | `/settings/integration/patch-management/big-fix` | `PatchManagementBigFix` or null |
| `Settings\PatchManagement\PostPatchManagementPatchLinkByIdRequest` | POST | `/settings/integration/patch-management/patch-link/{id}` | `PatchManagement` or null |
| `Settings\PatchManagement\PostPatchManagementPropertiesBigFixByIdRequest` | POST | `/settings/integration/patch-management/properties/big-fix/{id}` | true |
| `Settings\PatchManagement\PostPatchManagementPropertiesPatchLinkByIdRequest` | POST | `/settings/integration/patch-management/properties/patch-link/{id}` | true |
| `Settings\PatchManagement\TestPatchManagementRequest` | POST | `/settings/integration/patch-management/test` | `PatchManagementBigFix` or null |
| `Settings\PatchManagement\TestPatchManagementByIdRequest` | POST | `/settings/integration/patch-management/test/{id}` | true |
| `Settings\ProxySettings\GetProxySettingsRequest` | GET | `/settings/integration/proxy` | `ProxySettings` or null |
| `Settings\ProxySettings\UpdateProxySettingsRequest` | POST | `/settings/integration/proxy` | `ProxySettings` or null |
| `Settings\SecurityEventParser\GetSecurityEventParsersRequest` | GET | `/settings/integration/security-event-parser` | Collection of `SecurityEventParser` |
| `Settings\SecurityEventParser\GetSecurityEventParserRequest` | GET | `/settings/integration/security-event-parser/{id}` | `SecurityEventParser` or null |
| `Settings\SecurityEventParser\GetSecurityEventParserRecentSyslogRequest` | GET | `/settings/integration/security-event-parser/recent-syslog` | Collection of arrays |
| `Settings\SecurityEventParser\GetSecurityEventParserUsageRequest` | GET | `/settings/integration/security-event-parser/{id}/usage` | Collection of arrays |
| `Settings\SecurityEventParser\CreateSecurityEventParserRequest` | POST | `/settings/integration/security-event-parser` | `SecurityEventParser` or null |
| `Settings\SecurityEventParser\DeleteManySecurityEventParsersRequest` | POST | `/settings/integration/security-event-parser/delete` | true |
| `Settings\SecurityEventParser\DisableManySecurityEventParsersRequest` | POST | `/settings/integration/security-event-parser/disable` | true |
| `Settings\SecurityEventParser\UpdateSecurityEventParserRequest` | POST | `/settings/integration/security-event-parser/{id}` | `SecurityEventParser` or null |
| `Settings\SecurityEventParser\ParseSecurityEventParserMessageRequest` | POST | `/settings/integration/security-event-parser/parse-message` | `SecurityEventParserParseSecurityEventParserMessage` or null |
| `Settings\SecurityEventParser\DeleteSecurityEventParserViaPostRequest` | POST | `/settings/integration/security-event-parser/{id}/delete` | true |
| `Settings\SecurityEventParser\TestSecurityEventParserRequest` | POST | `/settings/integration/security-event-parser/{id}/test` | `SecurityEventParserTestSecurityEventParser` or null |
| `Settings\SecurityEventParser\EnableManySecurityEventParsersRequest` | POST | `/settings/integration/security-event-parser/enable` | true |
| `Settings\SecurityEventParser\DeleteSecurityEventParserRequest` | DELETE | `/settings/integration/security-event-parser/{id}` | true |
| `Settings\SmsProvider\CountSmsProvidersRequest` | GET | `/settings/integration/sms/count` | the number or value FortiNAC answers with |
| `Settings\SmsProvider\GetSmsProvidersRequest` | GET | `/settings/integration/sms` | Collection of `SmsProvider` |
| `Settings\SmsProvider\CountAllSmsProvidersRequest` | GET | `/settings/integration/sms/count/all` | the number or value FortiNAC answers with |
| `Settings\SmsProvider\GetSmsProviderGlobalMaxLengthRequest` | GET | `/settings/integration/sms/global/max-length` | the number or value FortiNAC answers with |
| `Settings\SmsProvider\GetSmsProviderRequest` | GET | `/settings/integration/sms/{id}` | `SmsProvider` or null |
| `Settings\SmsProvider\GetSmsProviderUsageRequest` | GET | `/settings/integration/sms/{id}/usage` | Collection of arrays |
| `Settings\SmsProvider\PostSmsProviderGlobalMaxLengthRequest` | POST | `/settings/integration/sms/global/max-length` | true |
| `Settings\SmsProvider\CreateSmsProviderRequest` | POST | `/settings/integration/sms` | `SmsProvider` or null |
| `Settings\SmsProvider\UpdateSmsProviderRequest` | POST | `/settings/integration/sms/{id}` | `SmsProvider` or null |
| `Settings\SmsProvider\DeleteManySmsProvidersRequest` | POST | `/settings/integration/sms/delete` | true |
| `Settings\SmsProvider\DisableSmsProviderRequest` | POST | `/settings/integration/sms/{id}/disable` | true |
| `Settings\SmsProvider\EnableSmsProviderRequest` | POST | `/settings/integration/sms/{id}/enable` | true |
| `Settings\SmsProvider\DeleteSmsProviderViaPostRequest` | POST | `/settings/integration/sms/{id}/delete` | true |
| `Settings\SmsProvider\DeleteSmsProviderRequest` | DELETE | `/settings/integration/sms/{id}` | true |
| `Settings\SnmpSettings\GetSnmpSettingsRequest` | GET | `/settings/integration/SNMP` | `SnmpSettings` or null |
| `Settings\SnmpSettings\GetSnmpSettingsAuthPsswordRequest` | GET | `/settings/integration/SNMP/auth-pssword` | the decoded JSON |
| `Settings\SnmpSettings\GetSnmpSettingsPrivPsswordRequest` | GET | `/settings/integration/SNMP/priv-pssword` | the decoded JSON |
| `Settings\SnmpSettings\UpdateSnmpSettingsRequest` | POST | `/settings/integration/SNMP` | `SnmpSettings` or null |
| `Settings\SyslogServer\GetSyslogServerRequest` | GET | `/settings/integration/syslog/{id}` | `SyslogServer` or null |
| `Settings\SyslogServer\GetSyslogServerUsageRequest` | GET | `/settings/integration/syslog/{id}/usage` | true |
| `Settings\SyslogServer\GetSyslogServersRequest` | GET | `/settings/integration/syslog` | Collection of `SyslogServer` |
| `Settings\SyslogServer\DeleteManySyslogServersRequest` | POST | `/settings/integration/syslog/delete` | true |
| `Settings\SyslogServer\UpdateSyslogServerRequest` | POST | `/settings/integration/syslog/{id}` | `SyslogServer` or null |
| `Settings\SyslogServer\CreateSyslogServerRequest` | POST | `/settings/integration/syslog` | `SyslogServer` or null |
| `Settings\SyslogServer\DisableSyslogServerRequest` | POST | `/settings/integration/syslog/{id}/disable` | true |
| `Settings\SyslogServer\EnableSyslogServerRequest` | POST | `/settings/integration/syslog/{id}/enable` | true |
| `Settings\SyslogServer\DeleteSyslogServerViaPostRequest` | POST | `/settings/integration/syslog/{id}/delete` | true |
| `Settings\SyslogServer\DeleteSyslogServerRequest` | DELETE | `/settings/integration/syslog/{id}` | true |
| `Settings\TrapMib\GetTrapMibsRequest` | GET | `/settings/integration/trap-mib` | Collection of `TrapMib` |
| `Settings\TrapMib\AddTrapMibRequest` | POST | `/settings/integration/trap-mib/add` | true |
| `Settings\TrapMib\DeleteManyTrapMibsRequest` | POST | `/settings/integration/trap-mib/delete` | true |
| `Settings\TrapMib\PostTrapMibMibNameRequest` | POST | `/settings/integration/trap-mib/mib-name` | true |
| `Settings\TrapMib\UpdateTrapMibRequest` | POST | `/settings/integration/trap-mib/update` | true |
| `Settings\TrapMib\DeleteTrapMibRequest` | DELETE | `/settings/integration/trap-mib` | true |
| `Settings\TrapMib\DeleteTrapMibTrapOidRequest` | DELETE | `/settings/integration/trap-mib/trap-oid` | true |
| `Settings\VendorOui\DeleteVendorOuiViaPostRequest` | POST | `/settings/integration/vendor-oui/{id}/delete` | true |
| `Settings\VendorOui\DeleteVendorOuiRequest` | DELETE | `/settings/integration/vendor-oui/{id}` | true |
| `Settings\VendorOui\GetVendorOuisRequest` | GET | `/settings/integration/vendor-oui` | Collection of `VendorOui` |
| `Settings\VendorOui\CountVendorOuisRequest` | GET | `/settings/integration/vendor-oui/count` | the number or value FortiNAC answers with |
| `Settings\VendorOui\CountAllVendorOuisRequest` | GET | `/settings/integration/vendor-oui/count/all` | the number or value FortiNAC answers with |
| `Settings\VendorOui\GetVendorOuiCountByIdRequest` | GET | `/settings/integration/vendor-oui/count/{id}` | `VendorOui` or null |
| `Settings\VendorOui\GetVendorOuiSupportingInfoRequest` | GET | `/settings/integration/vendor-oui/supporting-info` | true |
| `Settings\VendorOui\CreateVendorOuiRequest` | POST | `/settings/integration/vendor-oui` | `VendorOui` or null |
| `Settings\VendorOui\DeleteManyVendorOuisRequest` | POST | `/settings/integration/vendor-oui/delete` | true |
| `Settings\VendorOui\UpdateVendorOuiRequest` | POST | `/settings/integration/vendor-oui/{id}` | `VendorOui` or null |
| `Settings\VulnerabilityScanner\GetVulnerabilityScannersRequest` | GET | `/settings/integration/vulnerability-scanner` | Collection of `VulnerabilityScanner` |
| `Settings\VulnerabilityScanner\GetVulnerabilityScannerRequest` | GET | `/settings/integration/vulnerability-scanner/{id}` | `VulnerabilityScanner` or null |
| `Settings\VulnerabilityScanner\GetVulnerabilityScannerScansRequest` | GET | `/settings/integration/vulnerability-scanner/{id}/scans` | `VulnerabilityScannerScans` or null |
| `Settings\VulnerabilityScanner\GetVulnerabilityScannerQualysAppliancesRequest` | GET | `/settings/integration/vulnerability-scanner/{id}/qualys-appliances` | `VulnerabilityScannerScans` or null |
| `Settings\VulnerabilityScanner\GetVulnerabilityScannerUsageRequest` | GET | `/settings/integration/vulnerability-scanner/{id}/usage` | Collection of arrays |
| `Settings\VulnerabilityScanner\CreateVulnerabilityScannerRequest` | POST | `/settings/integration/vulnerability-scanner` | `VulnerabilityScanner` or null |
| `Settings\VulnerabilityScanner\DeleteManyVulnerabilityScannersRequest` | POST | `/settings/integration/vulnerability-scanner/delete` | true |
| `Settings\VulnerabilityScanner\UpdateVulnerabilityScannerRequest` | POST | `/settings/integration/vulnerability-scanner/{id}` | `VulnerabilityScanner` or null |
| `Settings\VulnerabilityScanner\DeleteVulnerabilityScannerViaPostRequest` | POST | `/settings/integration/vulnerability-scanner/{id}/delete` | true |
| `Settings\VulnerabilityScanner\PollVulnerabilityScannerRequest` | POST | `/settings/integration/vulnerability-scanner/{id}/poll` | true |
| `Settings\VulnerabilityScanner\TestVulnerabilityScannerRequest` | POST | `/settings/integration/vulnerability-scanner/{id}/test` | true |
| `Settings\VulnerabilityScanner\DeleteVulnerabilityScannerRequest` | DELETE | `/settings/integration/vulnerability-scanner/{id}` | true |
| `Settings\Certificate\GetCertificatesRequest` | GET | `/settings/security/certificate-server` | Collection of arrays |
| `Settings\Certificate\CopyCertificateRequest` | POST | `/settings/security/certificate-server/copy` | true |
| `Settings\Certificate\PostCertificateCsrGenerateRequest` | POST | `/settings/security/certificate-server/csr/generate` | `CertificateCsrGenerate` or null |
| `Settings\Certificate\UpdateCertificateRequest` | POST | `/settings/security/certificate-server/{name}` | true |
| `Settings\Certificate\DeleteCertificateViaPostRequest` | POST | `/settings/security/certificate-server/{name}/delete` | true |
| `Settings\Certificate\DeleteCertificateServerCertRequest` | POST | `/settings/security/certificate-server/{name}/deleteServerCert` | true |
| `Settings\Certificate\RestartCertificateRequest` | POST | `/settings/security/certificate-server/restart` | true |
| `Settings\WebServiceDefinition\GetWebServiceDefinitionsRequest` | GET | `/settings/security/web-service-definition` | Collection of `WebServiceDefinition` |
| `Settings\WebServiceDefinition\GetWebServiceDefinitionRequest` | GET | `/settings/security/web-service-definition/{id}` | `WebServiceDefinition` or null |
| `Settings\WebServiceDefinition\GetWebServiceDefinitionUsageRequest` | GET | `/settings/security/web-service-definition/{id}/usage` | Collection of arrays |
| `Settings\WebServiceDefinition\CreateWebServiceDefinitionRequest` | POST | `/settings/security/web-service-definition` | the number or value FortiNAC answers with |
| `Settings\WebServiceDefinition\DeleteManyWebServiceDefinitionsRequest` | POST | `/settings/security/web-service-definition/delete` | true |
| `Settings\WebServiceDefinition\DeployWebServiceDefinitionRequest` | POST | `/settings/security/web-service-definition/deploy` | true |
| `Settings\WebServiceDefinition\UpdateWebServiceDefinitionRequest` | POST | `/settings/security/web-service-definition/{id}` | `WebServiceDefinition` or null |
| `Settings\WebServiceDefinition\DeleteWebServiceDefinitionViaPostRequest` | POST | `/settings/security/web-service-definition/{id}/delete` | true |
| `Settings\WebServiceDefinition\DeleteWebServiceDefinitionRequest` | DELETE | `/settings/security/web-service-definition/{id}` | true |
| `Settings\FortiGateTelemetry\GetFortiGateTelemetryUsageRequest` | GET | `/settings/security-fabric/{id}/usage` | Collection of arrays |
| `Settings\FortiGateTelemetry\GetFortiGateTelemetriesRequest` | GET | `/settings/security-fabric` | Collection of `FortiGateTelemetry` |
| `Settings\FortiGateTelemetry\GetFortiGateTelemetryRequest` | GET | `/settings/security-fabric/{id}` | `FortiGateTelemetry` or null |
| `Settings\FortiGateTelemetry\CreateFortiGateTelemetryRequest` | POST | `/settings/security-fabric` | `FortiGateTelemetry` or null |
| `Settings\FortiGateTelemetry\DeleteManyFortiGateTelemetriesRequest` | POST | `/settings/security-fabric/delete` | true |
| `Settings\FortiGateTelemetry\DeleteFortiGateTelemetryViaPostRequest` | POST | `/settings/security-fabric/{id}/delete` | true |
| `Settings\FortiGateTelemetry\UpdateFortiGateTelemetryRequest` | POST | `/settings/security-fabric/{id}` | `FortiGateTelemetry` or null |
| `Settings\FortiGateTelemetry\DeleteFortiGateTelemetryRequest` | DELETE | `/settings/security-fabric/{id}` | true |
| `Settings\TlsServiceConfiguration\GetTlsServiceConfigurationsRequest` | GET | `/settings/tls-service-configuration` | Collection of `TlsServiceConfiguration` |
| `Settings\TlsServiceConfiguration\GetTlsServiceConfigurationRequest` | GET | `/settings/tls-service-configuration/{id}` | `TlsServiceConfiguration` or null |
| `Settings\TlsServiceConfiguration\GetTlsServiceConfigurationUsageRequest` | GET | `/settings/tls-service-configuration/{id}/usage` | Collection of arrays |
| `Settings\TlsServiceConfiguration\GetTlsServiceConfigurationRadiusciphersRequest` | GET | `/settings/tls-service-configuration/radiusciphers` | Collection of arrays |
| `Settings\TlsServiceConfiguration\GetTlsServiceConfigurationAliasesRequest` | GET | `/settings/tls-service-configuration/aliases` | `TlsServiceConfigurationAliases` or null |
| `Settings\TlsServiceConfiguration\CreateTlsServiceConfigurationRequest` | POST | `/settings/tls-service-configuration` | Collection of `TlsServiceConfiguration` |
| `Settings\TlsServiceConfiguration\DeleteManyTlsServiceConfigurationsRequest` | POST | `/settings/tls-service-configuration/delete` | true |
| `Settings\TlsServiceConfiguration\DeployTlsServiceConfigurationRequest` | POST | `/settings/tls-service-configuration/deploy` | true |
| `Settings\TlsServiceConfiguration\DeleteTlsServiceConfigurationViaPostRequest` | POST | `/settings/tls-service-configuration/{id}/delete` | true |
| `Settings\TlsServiceConfiguration\UpdateTlsServiceConfigurationRequest` | POST | `/settings/tls-service-configuration/{id}` | `TlsServiceConfiguration` or null |
| `Settings\TlsServiceConfiguration\DeleteTlsServiceConfigurationRequest` | DELETE | `/settings/tls-service-configuration/{id}` | true |
| `Settings\OsUpdate\GetOsUpdatesRequest` | GET | `/settings/udpates/os-updates` | Collection of `OsUpdate` |
| `Settings\OsUpdate\GetOsUpdateLogsRequest` | GET | `/settings/udpates/os-updates/logs` | `OsUpdateLogs` or null |
| `Settings\OsUpdate\GetOsUpdateUpdateDataRequest` | GET | `/settings/udpates/os-updates/update-data` | `OsUpdateUpdateData` or null |

## Ssid

`FortiNac::ssids()`

| Call | Returns |
|---|---|
| `FortiNac::ssids()` | a builder over `Ssid` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)` |
| `FortiNac::ssids()->config(array $options)` | true |
| `FortiNac::ssids()->putConfig(array|Data $attributes, array $options)` | `SsidConfig` or null |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Ssid\Ssid\GetSsidConfigRequest` | GET | `/ssid/config` | true |
| `Ssid\Ssid\PutSsidConfigRequest` | PUT | `/ssid/config` | `SsidConfig` or null |
| `Ssid\Ssid\GetSsidsRequest` | GET | `/ssid` | Collection of `Ssid` |

## System

`FortiNac::system()`

| Call | Returns |
|---|---|
| `FortiNac::system()->analytics()` | the setting as `AnalyticsProperties`: `get()`, `update()` |
| `FortiNac::system()->backgroundTasks()` | a builder over `BackgroundTask` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()` |
| `FortiNac::system()->backgroundTasks()->currentUser(Query|array $query)` | Collection of `BackgroundTask` |
| `FortiNac::system()->backgroundTasks()->complete(int $id, array $options)` | true |
| `FortiNac::system()->backgroundTasks()->deleteMany(array $ids)` | true |
| `FortiNac::system()->backupConfiguration()` | the actions below |
| `FortiNac::system()->backupConfiguration()->ftp()` | true |
| `FortiNac::system()->backupConfiguration()->sftp()` | true |
| `FortiNac::system()->backupConfiguration()->ssh()` | true |
| `FortiNac::system()->backupConfiguration()->ftp2(array|Data $attributes, array $options)` | `BackupConfigurationFtp` or null |
| `FortiNac::system()->backupConfiguration()->sftp2(array|Data $attributes, array $options)` | `BackupConfigurationSftp` or null |
| `FortiNac::system()->backupConfiguration()->ssh2(array|Data $attributes, array $options)` | `BackupConfigurationSftp` or null |
| `FortiNac::system()->backupSettings()` | the actions below |
| `FortiNac::system()->backupSettings()->archives()` | `BackupSettingsArchives` or null |
| `FortiNac::system()->backupSettings()->database()` | true |
| `FortiNac::system()->backupSettings()->databaseArchive()` | the decoded JSON |
| `FortiNac::system()->backupSettings()->systemBackup()` | true |
| `FortiNac::system()->backupSettings()->archives2(array $options)` | true |
| `FortiNac::system()->backupSettings()->database2(array $options)` | true |
| `FortiNac::system()->backupSettings()->databaseRestoreArchives(array $options)` | true |
| `FortiNac::system()->backupSettings()->systemBackup2(array $options)` | true |
| `FortiNac::system()->groups()` | a builder over `Group` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `update()`, `delete()` |
| `FortiNac::system()->groups()->countAll()` | the number of records |
| `FortiNac::system()->groups()->descendants(int $id, array $options)` | true |
| `FortiNac::system()->groups()->memberIds(int $id)` | the decoded JSON |
| `FortiNac::system()->groups()->members(int $id, array $options)` | `GroupMembers` or null |
| `FortiNac::system()->groups()->usage(int $id)` | Collection of arrays |
| `FortiNac::system()->groups()->addMembers(array $options)` | true |
| `FortiNac::system()->groups()->addToParents(array $options)` | true |
| `FortiNac::system()->groups()->aging(array $options)` | true |
| `FortiNac::system()->groups()->copy(array $options)` | true |
| `FortiNac::system()->groups()->deleteMany(array $ids)` | true |
| `FortiNac::system()->groups()->manages(int $groupId, array $options)` | true |
| `FortiNac::system()->groups()->byId(string $groupType, int $id, array|Data $attributes, array $options)` | `Group` or null |
| `FortiNac::system()->groups()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::system()->groups()->membership(array $options)` | true |
| `FortiNac::system()->groups()->removeFromParent(array $options)` | true |
| `FortiNac::system()->groups()->removeMembers(array $options)` | true |
| `FortiNac::system()->highAvailability()` | the setting as `HighAvailability`: `get()`, `update()` |
| `FortiNac::system()->highAvailability()->passwordByPwkey(string $pwkey)` | the number or value FortiNAC answers with |
| `FortiNac::system()->licenseManagement()` | the setting as arrays: `get()` |
| `FortiNac::system()->localProperties()` | the actions below |
| `FortiNac::system()->localProperties()->cluster(Query|array $query)` | Collection of `LocalPropertiesCluster` |
| `FortiNac::system()->localProperties()->configStatus()` | true |
| `FortiNac::system()->localProperties()->globaloptionByParam(string $param)` | the number or value FortiNAC answers with |
| `FortiNac::system()->localProperties()->hardware()` | true |
| `FortiNac::system()->localProperties()->hardwarePerformance()` | true |
| `FortiNac::system()->localProperties()->license()` | true |
| `FortiNac::system()->localProperties()->licenseConcurrent(array $options)` | true |
| `FortiNac::system()->localProperties()->softwareDetails()` | true |
| `FortiNac::system()->localProperties()->clusterApplicationPrimaryRestart(array $options)` | true |
| `FortiNac::system()->localProperties()->clusterControlPrimaryRestart(array $options)` | true |
| `FortiNac::system()->localProperties()->hardwareThresholds(array $options)` | true |
| `FortiNac::system()->localProperties()->licenseApply(array $options)` | true |
| `FortiNac::system()->localProperties()->passwordsChange(array|Data $attributes, array $options)` | `LocalPropertiesPasswordsChange` or null |
| `FortiNac::system()->localProperties()->systemInitialize(array|Data $attributes, array $options)` | `LocalPropertiesSystemInitialize` or null |
| `FortiNac::system()->ntp()` | the setting as arrays: `get()`, `update()` |
| `FortiNac::system()->ntp()->servers(Query|array $query)` | Collection of arrays |
| `FortiNac::system()->scheduler()` | a builder over `ScheduledTask` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `delete()` |
| `FortiNac::system()->scheduler()->countAll()` | the number of records |
| `FortiNac::system()->scheduler()->running(string $name)` | the number or value FortiNAC answers with |
| `FortiNac::system()->scheduler()->activityTypes()` | `ScheduledTaskActivityTypes` or null |
| `FortiNac::system()->scheduler()->deleteMany(array $ids)` | true |
| `FortiNac::system()->scheduler()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::system()->scheduler()->disable(int $id, array $options)` | true |
| `FortiNac::system()->scheduler()->enable(int $id, array $options)` | true |
| `FortiNac::system()->scheduler()->run(array $options)` | true |
| `FortiNac::system()->serviceConnector()` | the actions below |
| `FortiNac::system()->serviceConnector()->get(Query|array $query)` | Collection of `ServiceConnector` |
| `FortiNac::system()->managedServers()` | the actions below |
| `FortiNac::system()->managedServers()->license()` | `ManagedServerLicense` or null |
| `FortiNac::system()->managedServers()->hardware()` | true |
| `FortiNac::system()->managedServers()->properties(int $id)` | the decoded JSON |
| `FortiNac::system()->managedServers()->summary()` | true |
| `FortiNac::system()->managedServers()->scans(int $id)` | the decoded JSON |
| `FortiNac::system()->managedServers()->create(array $options)` | true |
| `FortiNac::system()->managedServers()->deleteMany(array $ids)` | true |
| `FortiNac::system()->managedServers()->properties2(int $id, array $options)` | true |
| `FortiNac::system()->managedServers()->sync(array $options)` | true |
| `FortiNac::system()->managedServers()->ping(array $options)` | true |
| `FortiNac::system()->debug()` | the actions below |
| `FortiNac::system()->debug()->log(array $options)` | true |
| `FortiNac::system()->debug()->databaseRelations(Query|array $query)` | Collection of `DebugDatabaseRelation` |
| `FortiNac::system()->debug()->databaseTables()` | true |
| `FortiNac::system()->debug()->databaseTablesData(Query|array $query)` | Collection of arrays |
| `FortiNac::system()->debug()->elements(array $options)` | the decoded JSON |
| `FortiNac::system()->debug()->elementsAttributes(Query|array $query)` | Collection of `DebugElementsAttribute` |
| `FortiNac::system()->debug()->grabLogSnapshotDownload(array $options)` | the decoded JSON |
| `FortiNac::system()->debug()->grabLogSnapshotStatus(array $options)` | the number or value FortiNAC answers with |
| `FortiNac::system()->debug()->guiExperiments()` | the decoded JSON |
| `FortiNac::system()->debug()->loggerNames()` | the decoded JSON |
| `FortiNac::system()->debug()->pluginResourcesReloaders()` | the decoded JSON |
| `FortiNac::system()->debug()->pluginNames()` | the decoded JSON |
| `FortiNac::system()->debug()->pluginPerformance(array $options)` | the decoded JSON |
| `FortiNac::system()->debug()->pluginStatus()` | `DebugPluginStatus` or null |
| `FortiNac::system()->debug()->grabLogSnapshotStart(array|Data $attributes, array $options)` | the number or value FortiNAC answers with |
| `FortiNac::system()->debug()->guiSnapshot(array $options)` | true |
| `FortiNac::system()->debug()->plugin(array $options)` | true |
| `FortiNac::system()->debug()->pluginResourcesReload(array $options)` | true |
| `FortiNac::system()->debug()->elementsAttributesDelete(array $options)` | true |
| `FortiNac::system()->tasks()` | a builder over `Task` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::system()->tasks()->countAll()` | the number of records |
| `FortiNac::system()->tasks()->usage(int $id)` | Collection of arrays |
| `FortiNac::system()->tasks()->deleteMany(array $ids)` | true |
| `FortiNac::system()->tasks()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::system()->update()` | the actions below |
| `FortiNac::system()->update()->test(array $options)` | the number or value FortiNAC answers with |

| Request | Method | Path | Returns |
|---|---|---|---|
| `System\AnalyticsProperties\GetAnalyticsPropertiesRequest` | GET | `/system/analytics-properties` | `AnalyticsProperties` or null |
| `System\AnalyticsProperties\UpdateAnalyticsPropertiesRequest` | POST | `/system/analytics-properties` | `AnalyticsProperties` or null |
| `System\BackgroundTask\GetBackgroundTasksRequest` | GET | `/system/background-task` | Collection of `BackgroundTask` |
| `System\BackgroundTask\GetBackgroundTaskCurrentUserRequest` | GET | `/system/background-task/current-user` | Collection of `BackgroundTask` |
| `System\BackgroundTask\GetBackgroundTaskRequest` | GET | `/system/background-task/{id}` | `BackgroundTask` or null |
| `System\BackgroundTask\CreateBackgroundTaskRequest` | POST | `/system/background-task` | `BackgroundTask` or null |
| `System\BackgroundTask\UpdateBackgroundTaskRequest` | POST | `/system/background-task/{id}` | `BackgroundTask` or null |
| `System\BackgroundTask\PostBackgroundTaskCompleteRequest` | POST | `/system/background-task/{id}/complete` | true |
| `System\BackgroundTask\DeleteManyBackgroundTasksRequest` | POST | `/system/background-task/delete` | true |
| `System\BackupConfiguration\GetBackupConfigurationFtpRequest` | GET | `/system/backup/configuration/ftp` | true |
| `System\BackupConfiguration\GetBackupConfigurationSftpRequest` | GET | `/system/backup/configuration/sftp` | true |
| `System\BackupConfiguration\GetBackupConfigurationSshRequest` | GET | `/system/backup/configuration/ssh` | true |
| `System\BackupConfiguration\PostBackupConfigurationFtpRequest` | POST | `/system/backup/configuration/ftp` | `BackupConfigurationFtp` or null |
| `System\BackupConfiguration\PostBackupConfigurationSftpRequest` | POST | `/system/backup/configuration/sftp` | `BackupConfigurationSftp` or null |
| `System\BackupConfiguration\PostBackupConfigurationSshRequest` | POST | `/system/backup/configuration/ssh` | `BackupConfigurationSftp` or null |
| `System\BackupSettings\GetBackupSettingsArchivesRequest` | GET | `/system/backup-settings/archives` | `BackupSettingsArchives` or null |
| `System\BackupSettings\GetBackupSettingsDatabaseRequest` | GET | `/system/backup-settings/database` | true |
| `System\BackupSettings\GetBackupSettingsDatabaseArchiveRequest` | GET | `/system/backup-settings/database/archive` | the decoded JSON |
| `System\BackupSettings\GetBackupSettingsSystemBackupRequest` | GET | `/system/backup-settings/system-backup` | true |
| `System\BackupSettings\PostBackupSettingsArchivesRequest` | POST | `/system/backup-settings/archives` | true |
| `System\BackupSettings\PostBackupSettingsDatabaseRequest` | POST | `/system/backup-settings/database` | true |
| `System\BackupSettings\PostBackupSettingsDatabaseRestoreArchivesRequest` | POST | `/system/backup-settings/database/restore-archives` | true |
| `System\BackupSettings\PostBackupSettingsSystemBackupRequest` | POST | `/system/backup-settings/system-backup` | true |
| `System\Group\DeleteGroupRequest` | DELETE | `/system/group/{id}` | true |
| `System\Group\GetGroupsRequest` | GET | `/system/group` | Collection of `Group` |
| `System\Group\CountGroupsRequest` | GET | `/system/group/count` | the number or value FortiNAC answers with |
| `System\Group\CountAllGroupsRequest` | GET | `/system/group/count/all` | the number or value FortiNAC answers with |
| `System\Group\GetGroupRequest` | GET | `/system/group/{id}` | `Group` or null |
| `System\Group\GetGroupDescendantsRequest` | GET | `/system/group/{id}/descendants` | true |
| `System\Group\GetGroupMemberIdsRequest` | GET | `/system/group/{id}/member-ids` | the decoded JSON |
| `System\Group\GetGroupMembersRequest` | GET | `/system/group/{id}/members` | `GroupMembers` or null |
| `System\Group\GetGroupUsageRequest` | GET | `/system/group/{id}/usage` | Collection of arrays |
| `System\Group\AddGroupMembersRequest` | POST | `/system/group/add-members` | true |
| `System\Group\AddGroupToParentsRequest` | POST | `/system/group/add-to-parents` | true |
| `System\Group\PostGroupAgingRequest` | POST | `/system/group/aging` | true |
| `System\Group\CopyGroupRequest` | POST | `/system/group/copy` | true |
| `System\Group\DeleteManyGroupsRequest` | POST | `/system/group/delete` | true |
| `System\Group\PostGroupManagesRequest` | POST | `/system/group/{groupID}/manages` | true |
| `System\Group\UpdateGroupRequest` | POST | `/system/group/{groupType}` | `Group` or null |
| `System\Group\PostGroupByIdRequest` | POST | `/system/group/{groupType}/{id}` | `Group` or null |
| `System\Group\DeleteGroupViaPostRequest` | POST | `/system/group/{id}/delete` | true |
| `System\Group\PostGroupMembershipRequest` | POST | `/system/group/membership` | true |
| `System\Group\RemoveGroupFromParentRequest` | POST | `/system/group/remove-from-parent` | true |
| `System\Group\RemoveGroupMembersRequest` | POST | `/system/group/remove-members` | true |
| `System\HighAvailability\GetHighAvailabilityRequest` | GET | `/system/high-availability` | `HighAvailability` or null |
| `System\HighAvailability\GetHighAvailabilityPasswordByPwkeyRequest` | GET | `/system/high-availability/password/{pwkey}` | the number or value FortiNAC answers with |
| `System\HighAvailability\UpdateHighAvailabilityRequest` | POST | `/system/high-availability` | `HighAvailability` or null |
| `System\LicenseManagement\GetLicenseManagementRequest` | GET | `/system/license-management` | true |
| `System\LocalProperties\GetLocalPropertiesClusterRequest` | GET | `/system/local-properties/cluster` | Collection of `LocalPropertiesCluster` |
| `System\LocalProperties\GetLocalPropertiesConfigStatusRequest` | GET | `/system/local-properties/config-status` | true |
| `System\LocalProperties\GetLocalPropertiesGlobaloptionByParamRequest` | GET | `/system/local-properties/globaloption/{param}` | the number or value FortiNAC answers with |
| `System\LocalProperties\GetLocalPropertiesHardwareRequest` | GET | `/system/local-properties/hardware` | true |
| `System\LocalProperties\GetLocalPropertiesHardwarePerformanceRequest` | GET | `/system/local-properties/hardware/performance` | true |
| `System\LocalProperties\GetLocalPropertiesLicenseRequest` | GET | `/system/local-properties/license` | true |
| `System\LocalProperties\GetLocalPropertiesLicenseConcurrentRequest` | GET | `/system/local-properties/license/concurrent` | true |
| `System\LocalProperties\GetLocalPropertiesSoftwareDetailsRequest` | GET | `/system/local-properties/software-details` | true |
| `System\LocalProperties\PostLocalPropertiesClusterApplicationPrimaryRestartRequest` | POST | `/system/local-properties/cluster/application/primary/restart` | true |
| `System\LocalProperties\PostLocalPropertiesClusterControlPrimaryRestartRequest` | POST | `/system/local-properties/cluster/control/primary/restart` | true |
| `System\LocalProperties\PostLocalPropertiesHardwareThresholdsRequest` | POST | `/system/local-properties/hardware/thresholds` | true |
| `System\LocalProperties\PostLocalPropertiesLicenseApplyRequest` | POST | `/system/local-properties/license/apply` | true |
| `System\LocalProperties\PostLocalPropertiesPasswordsChangeRequest` | POST | `/system/local-properties/passwords/change` | `LocalPropertiesPasswordsChange` or null |
| `System\LocalProperties\PostLocalPropertiesSystemInitializeRequest` | POST | `/system/local-properties/system/initialize` | `LocalPropertiesSystemInitialize` or null |
| `System\NtpSettings\GetNtpSettingsRequest` | GET | `/system/ntp` | true |
| `System\NtpSettings\GetNtpSettingsServersRequest` | GET | `/system/ntp/servers` | Collection of arrays |
| `System\NtpSettings\UpdateNtpSettingsRequest` | POST | `/system/ntp` | true |
| `System\ScheduledTask\GetScheduledTasksRequest` | GET | `/system/scheduler` | Collection of `ScheduledTask` |
| `System\ScheduledTask\GetScheduledTaskRequest` | GET | `/system/scheduler/{id}` | `ScheduledTask` or null |
| `System\ScheduledTask\CountAllScheduledTasksRequest` | GET | `/system/scheduler/count/all` | the number or value FortiNAC answers with |
| `System\ScheduledTask\CountScheduledTasksRequest` | GET | `/system/scheduler/count` | the number or value FortiNAC answers with |
| `System\ScheduledTask\GetScheduledTaskRunningRequest` | GET | `/system/scheduler/{name}/running` | the number or value FortiNAC answers with |
| `System\ScheduledTask\GetScheduledTaskActivityTypesRequest` | GET | `/system/scheduler/activity-types` | `ScheduledTaskActivityTypes` or null |
| `System\ScheduledTask\DeleteManyScheduledTasksRequest` | POST | `/system/scheduler/delete` | true |
| `System\ScheduledTask\DeleteScheduledTaskViaPostRequest` | POST | `/system/scheduler/{id}/delete` | true |
| `System\ScheduledTask\DisableScheduledTaskRequest` | POST | `/system/scheduler/{id}/disable` | true |
| `System\ScheduledTask\EnableScheduledTaskRequest` | POST | `/system/scheduler/{id}/enable` | true |
| `System\ScheduledTask\RunScheduledTaskRequest` | POST | `/system/scheduler/run` | true |
| `System\ScheduledTask\DeleteScheduledTaskRequest` | DELETE | `/system/scheduler/{id}` | true |
| `System\ServiceConnector\GetServiceConnectorsRequest` | GET | `/system/service-connector` | Collection of `ServiceConnector` |
| `System\ManagedServer\GetManagedServerLicenseRequest` | GET | `/system/properties/license` | `ManagedServerLicense` or null |
| `System\ManagedServer\GetManagedServerHardwareRequest` | GET | `/system/properties/hardware` | true |
| `System\ManagedServer\GetManagedServerPropertiesRequest` | GET | `/system/managed-server/{id}/properties` | the decoded JSON |
| `System\ManagedServer\GetManagedServerSummaryRequest` | GET | `/system/managed-server/summary` | true |
| `System\ManagedServer\GetManagedServerScansRequest` | GET | `/system/managed-server/{id}/scans` | the decoded JSON |
| `System\ManagedServer\CreateManagedServerRequest` | POST | `/system/managed-server` | true |
| `System\ManagedServer\DeleteManyManagedServersRequest` | POST | `/system/managed-server/delete` | true |
| `System\ManagedServer\PostManagedServerPropertiesRequest` | POST | `/system/managed-server/{id}/properties` | true |
| `System\ManagedServer\SyncManagedServerRequest` | POST | `/system/managed-server/sync` | true |
| `System\ManagedServer\PingManagedServerRequest` | POST | `/system/managed-server/ping` | true |
| `System\Debug\GetDebugLogRequest` | GET | `/system/debug/log` | true |
| `System\Debug\GetDebugDatabaseRelationsRequest` | GET | `/system/debug/database/relations` | Collection of `DebugDatabaseRelation` |
| `System\Debug\GetDebugDatabaseTablesRequest` | GET | `/system/debug/database/tables` | true |
| `System\Debug\GetDebugDatabaseTablesDataRequest` | GET | `/system/debug/database/tables/data` | Collection of arrays |
| `System\Debug\GetDebugElementsRequest` | GET | `/system/debug/elements` | the decoded JSON |
| `System\Debug\GetDebugElementsAttributesRequest` | GET | `/system/debug/elements/attributes` | Collection of `DebugElementsAttribute` |
| `System\Debug\GetDebugGrabLogSnapshotDownloadRequest` | GET | `/system/debug/grabLogSnapshot-download` | the decoded JSON |
| `System\Debug\GetDebugGrabLogSnapshotStatusRequest` | GET | `/system/debug/grabLogSnapshot-status` | the number or value FortiNAC answers with |
| `System\Debug\GetDebugGuiExperimentsRequest` | GET | `/system/debug/gui/experiments` | the decoded JSON |
| `System\Debug\GetDebugLoggerNamesRequest` | GET | `/system/debug/logger-names` | the decoded JSON |
| `System\Debug\GetDebugPluginResourcesReloadersRequest` | GET | `/system/debug/plugin/resources/reloaders` | the decoded JSON |
| `System\Debug\GetDebugPluginNamesRequest` | GET | `/system/debug/plugin-names` | the decoded JSON |
| `System\Debug\GetDebugPluginPerformanceRequest` | GET | `/system/debug/plugin-performance` | the decoded JSON |
| `System\Debug\GetDebugPluginStatusRequest` | GET | `/system/debug/plugin-status` | `DebugPluginStatus` or null |
| `System\Debug\PostDebugGrabLogSnapshotStartRequest` | POST | `/system/debug/grabLogSnapshot-start` | the number or value FortiNAC answers with |
| `System\Debug\PostDebugGuiSnapshotRequest` | POST | `/system/debug/gui/snapshot` | true |
| `System\Debug\PostDebugPluginRequest` | POST | `/system/debug/plugin` | true |
| `System\Debug\PostDebugPluginResourcesReloadRequest` | POST | `/system/debug/plugin/resources/reload` | true |
| `System\Debug\PostDebugElementsAttributesDeleteRequest` | POST | `/system/debug/elements/attributes/delete` | true |
| `System\Task\GetTasksRequest` | GET | `/system/task` | Collection of `Task` |
| `System\Task\CountTasksRequest` | GET | `/system/task/count` | the number or value FortiNAC answers with |
| `System\Task\CountAllTasksRequest` | GET | `/system/task/count/all` | the number or value FortiNAC answers with |
| `System\Task\GetTaskRequest` | GET | `/system/task/{id}` | `Task` or null |
| `System\Task\GetTaskUsageRequest` | GET | `/system/task/{id}/usage` | Collection of arrays |
| `System\Task\CreateTaskRequest` | POST | `/system/task` | `Task` or null |
| `System\Task\UpdateTaskRequest` | POST | `/system/task/{id}` | `Task` or null |
| `System\Task\DeleteManyTasksRequest` | POST | `/system/task/delete` | true |
| `System\Task\DeleteTaskViaPostRequest` | POST | `/system/task/{id}/delete` | true |
| `System\Task\DeleteTaskRequest` | DELETE | `/system/task/{id}` | true |
| `System\Update\TestUpdateRequest` | POST | `/system/update/test` | the number or value FortiNAC answers with |

## User

`FortiNac::user()`

| Call | Returns |
|---|---|
| `FortiNac::user()` | a builder over `User` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::user()->allowHosts()` | the number or value FortiNAC answers with |
| `FortiNac::user()->idById(int $id)` | `User` or null |
| `FortiNac::user()->countAll()` | the number of records |
| `FortiNac::user()->hasHosts()` | the decoded JSON |
| `FortiNac::user()->getPolicy(int $id)` | the decoded JSON |
| `FortiNac::user()->usage(int $id)` | Collection of arrays |
| `FortiNac::user()->searchUserByUserID(array $options)` | `UserSearch` or null |
| `FortiNac::user()->getAgent(int $id, array $options)` | the number or value FortiNAC answers with |
| `FortiNac::user()->allowHosts2(array $options)` | true |
| `FortiNac::user()->deleteMany(array $ids)` | true |
| `FortiNac::user()->disableMany(array $options)` | true |
| `FortiNac::user()->enableMany(array $options)` | true |
| `FortiNac::user()->disable(int $id, array $options)` | true |
| `FortiNac::user()->enable(int $id, array $options)` | true |
| `FortiNac::user()->setRole(array $options)` | true |
| `FortiNac::user()->setProfile(array $options)` | true |
| `FortiNac::user()->setPassword(array $options)` | true |
| `FortiNac::user()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::user()->adminProfiles()` | a builder over `AdminProfile` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::user()->adminProfiles()->deleteMappingById(int $id, array $options)` | true |
| `FortiNac::user()->adminProfiles()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::user()->adminProfiles()->mapping(Query|array $query)` | Collection of `AdminProfileMapping` |
| `FortiNac::user()->adminProfiles()->mappingById(int $id, Query|array $query)` | Collection of `AdminProfileMapping` |
| `FortiNac::user()->adminProfiles()->mappingSupportingInfo()` | true |
| `FortiNac::user()->adminProfiles()->new()` | `AdminProfile` or null |
| `FortiNac::user()->adminProfiles()->permissionViewMap()` | true |
| `FortiNac::user()->adminProfiles()->deleteMany(array $ids)` | true |
| `FortiNac::user()->adminProfiles()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::user()->adminProfiles()->mapping2(array|Data $attributes, array $options)` | `AdminProfileMapping` or null |
| `FortiNac::user()->adminProfiles()->mappingDelete(array $options)` | true |
| `FortiNac::user()->adminProfiles()->mappingById2(int $id, array|Data $attributes, array $options)` | `AdminProfileMapping` or null |
| `FortiNac::user()->adminProfiles()->mappingRankSet(array $options)` | true |
| `FortiNac::user()->adminProfiles()->mappingRankSwap(array $options)` | true |
| `FortiNac::user()->dashboards()` | a builder over `Dashboard` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::user()->dashboards()->agentSummary()` | the decoded JSON |
| `FortiNac::user()->dashboards()->deviceSummary(Query|array $query)` | Collection of `DashboardDeviceSummary` |
| `FortiNac::user()->dashboards()->deviceSummaryDeviceByStatus(string $tag, string $status, array $options)` | Collection of `DashboardDeviceSummaryDeviceByStatus` |
| `FortiNac::user()->dashboards()->deviceSummaryPortOffline(Query|array $query)` | Collection of `DashboardDeviceSummaryDeviceByStatus` |
| `FortiNac::user()->dashboards()->deviceSummaryPortOnline(Query|array $query)` | Collection of `DashboardDeviceSummaryDeviceByStatus` |
| `FortiNac::user()->dashboards()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::user()->dashboards()->scanSummaryPerDay(array $options)` | `DashboardScanSummaryPerDay` or null |
| `FortiNac::user()->dashboards()->scanSummaryPerHour(array $options)` | `DashboardScanSummaryPerDay` or null |
| `FortiNac::user()->dashboards()->hostSummary()` | true |
| `FortiNac::user()->dashboards()->userSummary()` | true |
| `FortiNac::user()->dashboards()->deleteMany(array $ids)` | true |
| `FortiNac::user()->dashboards()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::user()->dashboards()->resetToDefault(int $id, array $options)` | true |
| `FortiNac::user()->dashboards()->setRank(array $options)` | true |
| `FortiNac::user()->guestTemplates()` | a builder over `GuestTemplate` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::user()->guestTemplates()->countAll()` | the number of records |
| `FortiNac::user()->guestTemplates()->usage(int $id, Query|array $query)` | Collection of arrays |
| `FortiNac::user()->guestTemplates()->resolveIp(array $options)` | the decoded JSON |
| `FortiNac::user()->guestTemplates()->deleteMany(array $ids)` | true |
| `FortiNac::user()->guestTemplates()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::user()->selfRegistrations()` | a builder over `SelfRegistration` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)` |
| `FortiNac::user()->selfRegistrations()->details(int $id)` | `SelfRegistrationDetails` or null |
| `FortiNac::user()->selfRegistrations()->countAll()` | the number of records |
| `FortiNac::user()->selfRegistrations()->deny(int $id, array $options)` | the decoded JSON |
| `FortiNac::user()->selfRegistrations()->approve(int $id, array $options)` | true |
| `FortiNac::user()->guests()` | a builder over `Guest` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::user()->guests()->conferenceRegistrationsCount(array $options)` | `GuestConferenceRegistrationsCount` or null |
| `FortiNac::user()->guests()->countAll()` | the number of records |
| `FortiNac::user()->guests()->getPassword(int $id)` | the decoded JSON |
| `FortiNac::user()->guests()->bulk(array|Data $attributes, array $options)` | `Guest` or null |
| `FortiNac::user()->guests()->deleteViaPost(int $id, array $options)` | true |
| `FortiNac::user()->guests()->generatePasswordFromTemplate(array $options)` | true |
| `FortiNac::user()->guests()->disable(int $id, array $options)` | true |
| `FortiNac::user()->guests()->generatePassword(int $id, array $options)` | the number or value FortiNAC answers with |
| `FortiNac::user()->guests()->deleteMany(array $ids)` | true |
| `FortiNac::user()->guests()->enable(int $id, array $options)` | true |
| `FortiNac::user()->guests()->getPassword2(array $options)` | true |
| `FortiNac::user()->guests()->resetPassword(array $options)` | true |
| `FortiNac::user()->guests()->sendEmail(array $options)` | true |
| `FortiNac::user()->guests()->conference(array $options)` | true |
| `FortiNac::user()->guests()->sendSms(array $options)` | true |
| `FortiNac::user()->attributes()` | the actions below |
| `FortiNac::user()->attributes()->find(string $name)` | true |
| `FortiNac::user()->attributes()->userByName(string $name, array $options)` | true |
| `FortiNac::user()->attributes()->update(string $name, array $options)` | true |
| `FortiNac::user()->attributes()->userByName2(string $name, array $options)` | true |
| `FortiNac::user()->currentSession()` | the actions below |
| `FortiNac::user()->currentSession()->cache(array $options)` | true |
| `FortiNac::user()->currentSession()->featureVisibility()` | true |
| `FortiNac::user()->currentSession()->bookmark(Query|array $query)` | Collection of `CurrentSessionBookmark` |
| `FortiNac::user()->currentSession()->timeout()` | `SessionTimeout` or null |
| `FortiNac::user()->currentSession()->securityKey()` | true |
| `FortiNac::user()->currentSession()->navigationSettings()` | true |
| `FortiNac::user()->currentSession()->bookmarkById(int $id, array|Data $attributes, array $options)` | `CurrentSessionBookmark` or null |
| `FortiNac::user()->currentSession()->bookmarkUuidDelete(int $uuid, array $options)` | true |
| `FortiNac::user()->currentSession()->bookmark2(array|Data $attributes, array $options)` | `CurrentSessionBookmark` or null |
| `FortiNac::user()->currentSession()->bookmarkDelete(array $options)` | true |
| `FortiNac::user()->currentSession()->bookmarkDelete2(int $id, array $options)` | true |
| `FortiNac::user()->currentSession()->cache2(array $options)` | true |
| `FortiNac::user()->currentSession()->bookmarkSync(array|Data $attributes, array $options)` | true |
| `FortiNac::user()->currentSession()->featureVisibility2(array|Data $attributes, array $options)` | true |
| `FortiNac::user()->currentSession()->initializeRootUser(array $options)` | true |
| `FortiNac::user()->currentSession()->login(array $options)` | true |
| `FortiNac::user()->currentSession()->logout(array $options)` | true |
| `FortiNac::user()->currentSession()->acceptUsagePolicy(array $options)` | true |
| `FortiNac::user()->currentSession()->deleteBookmarkById(int $id, array $options)` | true |

| Request | Method | Path | Returns |
|---|---|---|---|
| `User\AdminProfile\DeleteAdminProfileRequest` | DELETE | `/user/admin-profile/{id}` | true |
| `User\AdminProfile\DeleteAdminProfileMappingByIdRequest` | DELETE | `/user/admin-profile/mapping/{id}` | true |
| `User\AdminProfile\GetAdminProfilesRequest` | GET | `/user/admin-profile` | Collection of `AdminProfile` |
| `User\AdminProfile\GetAdminProfileRequest` | GET | `/user/admin-profile/{id}` | `AdminProfile` or null |
| `User\AdminProfile\GetAdminProfileUsageRequest` | GET | `/user/admin-profile/{id}/usage` | Collection of arrays |
| `User\AdminProfile\GetAdminProfileMappingRequest` | GET | `/user/admin-profile/mapping` | Collection of `AdminProfileMapping` |
| `User\AdminProfile\GetAdminProfileMappingByIdRequest` | GET | `/user/admin-profile/mapping/{id}` | Collection of `AdminProfileMapping` |
| `User\AdminProfile\GetAdminProfileMappingSupportingInfoRequest` | GET | `/user/admin-profile/mapping/supporting-info` | true |
| `User\AdminProfile\GetAdminProfileNewRequest` | GET | `/user/admin-profile/new` | `AdminProfile` or null |
| `User\AdminProfile\GetAdminProfilePermissionViewMapRequest` | GET | `/user/admin-profile/permission-view-map` | true |
| `User\AdminProfile\CreateAdminProfileRequest` | POST | `/user/admin-profile` | `AdminProfile` or null |
| `User\AdminProfile\DeleteManyAdminProfilesRequest` | POST | `/user/admin-profile/delete` | true |
| `User\AdminProfile\UpdateAdminProfileRequest` | POST | `/user/admin-profile/{id}` | `AdminProfile` or null |
| `User\AdminProfile\DeleteAdminProfileViaPostRequest` | POST | `/user/admin-profile/{id}/delete` | true |
| `User\AdminProfile\PostAdminProfileMappingRequest` | POST | `/user/admin-profile/mapping` | `AdminProfileMapping` or null |
| `User\AdminProfile\PostAdminProfileMappingDeleteRequest` | POST | `/user/admin-profile/mapping/delete` | true |
| `User\AdminProfile\PostAdminProfileMappingByIdRequest` | POST | `/user/admin-profile/mapping/{id}` | `AdminProfileMapping` or null |
| `User\AdminProfile\PostAdminProfileMappingRankSetRequest` | POST | `/user/admin-profile/mapping/rank/set` | true |
| `User\AdminProfile\PostAdminProfileMappingRankSwapRequest` | POST | `/user/admin-profile/mapping/rank/swap` | true |
| `User\Dashboard\DeleteDashboardRequest` | DELETE | `/user/dashboard/{id}` | true |
| `User\Dashboard\GetDashboardAgentSummaryRequest` | GET | `/user/dashboard/agent-summary` | the decoded JSON |
| `User\Dashboard\GetDashboardDeviceSummaryRequest` | GET | `/user/dashboard/device-summary` | Collection of `DashboardDeviceSummary` |
| `User\Dashboard\PostDashboardDeviceSummaryDeviceByStatusRequest` | POST | `/user/dashboard/device-summary/device/{tag}/{status}` | Collection of `DashboardDeviceSummaryDeviceByStatus` |
| `User\Dashboard\GetDashboardDeviceSummaryPortOfflineRequest` | GET | `/user/dashboard/device-summary/port/offline` | Collection of `DashboardDeviceSummaryDeviceByStatus` |
| `User\Dashboard\GetDashboardDeviceSummaryPortOnlineRequest` | GET | `/user/dashboard/device-summary/port/online` | Collection of `DashboardDeviceSummaryDeviceByStatus` |
| `User\Dashboard\GetDashboardUsageRequest` | GET | `/user/dashboard/{id}/usage` | Collection of arrays |
| `User\Dashboard\GetDashboardScanSummaryPerDayRequest` | GET | `/user/dashboard/scan-summary/per-day` | `DashboardScanSummaryPerDay` or null |
| `User\Dashboard\GetDashboardScanSummaryPerHourRequest` | GET | `/user/dashboard/scan-summary/per-hour` | `DashboardScanSummaryPerDay` or null |
| `User\Dashboard\GetDashboardHostSummaryRequest` | GET | `/user/dashboard/host-summary` | true |
| `User\Dashboard\GetDashboardUserSummaryRequest` | GET | `/user/dashboard/user-summary` | true |
| `User\Dashboard\GetDashboardsRequest` | GET | `/user/dashboard` | Collection of `Dashboard` |
| `User\Dashboard\GetDashboardRequest` | GET | `/user/dashboard/{id}` | `Dashboard` or null |
| `User\Dashboard\DeleteManyDashboardsRequest` | POST | `/user/dashboard/delete` | true |
| `User\Dashboard\DeleteDashboardViaPostRequest` | POST | `/user/dashboard/{id}/delete` | true |
| `User\Dashboard\ResetDashboardToDefaultRequest` | POST | `/user/dashboard/{id}/resetToDefault` | true |
| `User\Dashboard\CreateDashboardRequest` | POST | `/user/dashboard` | `Dashboard` or null |
| `User\Dashboard\UpdateDashboardRequest` | POST | `/user/dashboard/{id}` | Collection of `Dashboard` |
| `User\Dashboard\SetDashboardRankRequest` | POST | `/user/dashboard/rank/set` | true |
| `User\GuestTemplate\DeleteGuestTemplateRequest` | DELETE | `/user/guest-template/{id}` | true |
| `User\GuestTemplate\GetGuestTemplatesRequest` | GET | `/user/guest-template` | Collection of `GuestTemplate` |
| `User\GuestTemplate\CountGuestTemplatesRequest` | GET | `/user/guest-template/count` | the number or value FortiNAC answers with |
| `User\GuestTemplate\CountAllGuestTemplatesRequest` | GET | `/user/guest-template/count/all` | the number or value FortiNAC answers with |
| `User\GuestTemplate\GetGuestTemplateRequest` | GET | `/user/guest-template/{id}` | `GuestTemplate` or null |
| `User\GuestTemplate\GetGuestTemplateUsageRequest` | GET | `/user/guest-template/{id}/usage` | Collection of arrays |
| `User\GuestTemplate\GetGuestTemplateResolveIpRequest` | GET | `/user/guest-template/resolve-ip` | the decoded JSON |
| `User\GuestTemplate\CreateGuestTemplateRequest` | POST | `/user/guest-template` | `GuestTemplate` or null |
| `User\GuestTemplate\DeleteManyGuestTemplatesRequest` | POST | `/user/guest-template/delete` | true |
| `User\GuestTemplate\UpdateGuestTemplateRequest` | POST | `/user/guest-template/{id}` | `GuestTemplate` or null |
| `User\GuestTemplate\DeleteGuestTemplateViaPostRequest` | POST | `/user/guest-template/{id}/delete` | true |
| `User\SelfRegistration\GetSelfRegistrationsRequest` | GET | `/user/guest-self-registration` | Collection of `SelfRegistration` |
| `User\SelfRegistration\CountSelfRegistrationsRequest` | GET | `/user/guest-self-registration/count` | the number or value FortiNAC answers with |
| `User\SelfRegistration\GetSelfRegistrationDetailsRequest` | GET | `/user/guest-self-registration/{id}/details` | `SelfRegistrationDetails` or null |
| `User\SelfRegistration\CountAllSelfRegistrationsRequest` | GET | `/user/guest-self-registration/count/all` | the number or value FortiNAC answers with |
| `User\SelfRegistration\GetSelfRegistrationDenyRequest` | GET | `/user/guest-self-registration/{id}/deny` | the decoded JSON |
| `User\SelfRegistration\GetSelfRegistrationRequest` | GET | `/user/guest-self-registration/{id}` | `SelfRegistration` or null |
| `User\SelfRegistration\ApproveSelfRegistrationRequest` | POST | `/user/guest-self-registration/{id}/approve` | true |
| `User\Guest\CountGuestsRequest` | GET | `/user/guest/count` | the number or value FortiNAC answers with |
| `User\Guest\GetGuestsRequest` | GET | `/user/guest` | Collection of `Guest` |
| `User\Guest\GetGuestConferenceRegistrationsCountRequest` | GET | `/user/guest/conference/registrations/count` | `GuestConferenceRegistrationsCount` or null |
| `User\Guest\CountAllGuestsRequest` | GET | `/user/guest/count/all` | the number or value FortiNAC answers with |
| `User\Guest\GetGuestGetPasswordRequest` | GET | `/user/guest/{id}/get-password` | the decoded JSON |
| `User\Guest\GetGuestRequest` | GET | `/user/guest/{id}` | `Guest` or null |
| `User\Guest\CreateGuestRequest` | POST | `/user/guest` | `Guest` or null |
| `User\Guest\PostGuestBulkRequest` | POST | `/user/guest/bulk` | `Guest` or null |
| `User\Guest\DeleteGuestViaPostRequest` | POST | `/user/guest/{id}/delete` | true |
| `User\Guest\UpdateGuestRequest` | POST | `/user/guest/{id}` | `Guest` or null |
| `User\Guest\GenerateGuestPasswordFromTemplateRequest` | POST | `/user/guest/generate-password-from-template` | true |
| `User\Guest\DisableGuestRequest` | POST | `/user/guest/{id}/disable` | true |
| `User\Guest\GenerateGuestPasswordRequest` | POST | `/user/guest/{id}/generate-password` | the number or value FortiNAC answers with |
| `User\Guest\DeleteManyGuestsRequest` | POST | `/user/guest/delete` | true |
| `User\Guest\EnableGuestRequest` | POST | `/user/guest/{id}/enable` | true |
| `User\Guest\GetGuestPasswordRequest` | POST | `/user/guest/get-password` | true |
| `User\Guest\ResetGuestPasswordRequest` | POST | `/user/guest/reset-password` | true |
| `User\Guest\SendGuestEmailRequest` | POST | `/user/guest/send-email` | true |
| `User\Guest\PostGuestConferenceRequest` | POST | `/user/guest/conference` | true |
| `User\Guest\SendGuestSmsRequest` | POST | `/user/guest/send-sms` | true |
| `User\Guest\DeleteGuestRequest` | DELETE | `/user/guest/{id}` | true |
| `User\UserAttribute\GetUserAttributeRequest` | GET | `/user/attributes/{name}` | true |
| `User\UserAttribute\GetUserAttributeUserByNameRequest` | GET | `/user/attributes/user/{name}` | true |
| `User\UserAttribute\UpdateUserAttributeRequest` | POST | `/user/attributes/{name}` | true |
| `User\UserAttribute\PostUserAttributeUserByNameRequest` | POST | `/user/attributes/user/{name}` | true |
| `User\CurrentSession\GetCurrentSessionCacheRequest` | GET | `/user/current-session/cache` | true |
| `User\CurrentSession\GetCurrentSessionFeatureVisibilityRequest` | GET | `/user/current-session/feature-visibility` | true |
| `User\CurrentSession\GetCurrentSessionBookmarkRequest` | GET | `/user/current-session/bookmark` | Collection of `CurrentSessionBookmark` |
| `User\CurrentSession\GetCurrentSessionTimeoutRequest` | GET | `/user/current-session/timeout` | `SessionTimeout` or null |
| `User\CurrentSession\GetCurrentSessionSecurityKeyRequest` | GET | `/user/current-session/securityKey` | true |
| `User\CurrentSession\GetCurrentSessionNavigationSettingsRequest` | GET | `/user/current-session/navigation-settings` | true |
| `User\CurrentSession\PostCurrentSessionBookmarkByIdRequest` | POST | `/user/current-session/bookmark/{id}` | `CurrentSessionBookmark` or null |
| `User\CurrentSession\PostCurrentSessionBookmarkUuidDeleteRequest` | POST | `/user/current-session/bookmark/uuid/{uuid}/delete` | true |
| `User\CurrentSession\PostCurrentSessionBookmarkRequest` | POST | `/user/current-session/bookmark` | `CurrentSessionBookmark` or null |
| `User\CurrentSession\PostCurrentSessionBookmarkDeleteRequest` | POST | `/user/current-session/bookmark/delete` | true |
| `User\CurrentSession\PostCurrentSessionBookmarkDelete2Request` | POST | `/user/current-session/bookmark/{id}/delete` | true |
| `User\CurrentSession\PostCurrentSessionCacheRequest` | POST | `/user/current-session/cache` | true |
| `User\CurrentSession\PostCurrentSessionBookmarkSyncRequest` | POST | `/user/current-session/bookmark/sync` | true |
| `User\CurrentSession\PostCurrentSessionFeatureVisibilityRequest` | POST | `/user/current-session/feature-visibility` | true |
| `User\CurrentSession\InitializeCurrentSessionRootUserRequest` | POST | `/user/current-session/initialize-root-user` | true |
| `User\CurrentSession\LoginCurrentSessionRequest` | POST | `/user/current-session/login` | true |
| `User\CurrentSession\LogoutCurrentSessionRequest` | POST | `/user/current-session/logout` | true |
| `User\CurrentSession\AcceptCurrentSessionUsagePolicyRequest` | POST | `/user/current-session/accept-usage-policy` | true |
| `User\CurrentSession\DeleteCurrentSessionBookmarkByIdRequest` | DELETE | `/user/current-session/bookmark/{id}` | true |
| `User\User\GetUsersRequest` | GET | `/user` | Collection of `User` |
| `User\User\CountUsersRequest` | GET | `/user/count` | the number or value FortiNAC answers with |
| `User\User\GetUserAllowHostsRequest` | GET | `/user/allow-hosts` | the number or value FortiNAC answers with |
| `User\User\GetUserIdByIdRequest` | GET | `/user/id/{id}` | `User` or null |
| `User\User\CountAllUsersRequest` | GET | `/user/count/all` | the number or value FortiNAC answers with |
| `User\User\GetUserHasHostsRequest` | GET | `/user/has-hosts` | the decoded JSON |
| `User\User\GetUserGetPolicyRequest` | GET | `/user/{id}/get-policy` | the decoded JSON |
| `User\User\GetUserUsageRequest` | GET | `/user/{id}/usage` | Collection of arrays |
| `User\User\GetUserSearchUserByUserIDRequest` | GET | `/user/search-user-by-userID` | `UserSearch` or null |
| `User\User\GetUserGetAgentRequest` | GET | `/user/{id}/get-agent` | the number or value FortiNAC answers with |
| `User\User\CreateUserRequest` | POST | `/user` | `User` or null |
| `User\User\PostUserAllowHostsRequest` | POST | `/user/allow-hosts` | true |
| `User\User\DeleteManyUsersRequest` | POST | `/user/delete` | true |
| `User\User\DisableManyUsersRequest` | POST | `/user/disable` | true |
| `User\User\UpdateUserRequest` | POST | `/user/{id}` | `User` or null |
| `User\User\EnableManyUsersRequest` | POST | `/user/enable` | true |
| `User\User\DisableUserRequest` | POST | `/user/{id}/disable` | true |
| `User\User\EnableUserRequest` | POST | `/user/{id}/enable` | true |
| `User\User\SetUserRoleRequest` | POST | `/user/set-role` | true |
| `User\User\SetUserProfileRequest` | POST | `/user/set-profile` | true |
| `User\User\SetUserPasswordRequest` | POST | `/user/set-password` | true |
| `User\User\DeleteUserViaPostRequest` | POST | `/user/{id}/delete` | true |
| `User\User\DeleteUserRequest` | DELETE | `/user/{id}` | true |

## Winbind

`FortiNac::winbind()`

| Call | Returns |
|---|---|
| `FortiNac::winbind()` | a builder over `WinbindConfig` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `FortiNac::winbind()->getWinbindConfigAll(Query|array $query)` | Collection of `WinbindConfig` |
| `FortiNac::winbind()->global()` | true |
| `FortiNac::winbind()->log(array $options)` | true |
| `FortiNac::winbind()->status()` | true |
| `FortiNac::winbind()->deleteMany(array $options)` | true |
| `FortiNac::winbind()->disableMany(array $ids)` | true |
| `FortiNac::winbind()->enableMany(array $ids)` | true |
| `FortiNac::winbind()->joinDomainById(int $id, array $options)` | true |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Winbind\WinbindConfig\GetWinbindConfigsRequest` | GET | `/winbind/config` | Collection of `WinbindConfig` |
| `Winbind\WinbindConfig\GetWinbindConfigAllRequest` | GET | `/winbind/config/all` | Collection of `WinbindConfig` |
| `Winbind\WinbindConfig\GetWinbindConfigGlobalRequest` | GET | `/winbind/config/global` | true |
| `Winbind\WinbindConfig\GetWinbindConfigRequest` | GET | `/winbind/config/{id}` | `WinbindConfig` or null |
| `Winbind\WinbindConfig\PostWinbindConfigLogRequest` | POST | `/winbind/config/log` | true |
| `Winbind\WinbindConfig\GetWinbindConfigStatusRequest` | GET | `/winbind/config/status` | true |
| `Winbind\WinbindConfig\CreateWinbindConfigRequest` | POST | `/winbind/config` | Collection of `WinbindConfig` |
| `Winbind\WinbindConfig\DeleteManyWinbindConfigsRequest` | POST | `/winbind/config/delete` | true |
| `Winbind\WinbindConfig\DisableManyWinbindConfigsRequest` | POST | `/winbind/config/disable` | true |
| `Winbind\WinbindConfig\EnableManyWinbindConfigsRequest` | POST | `/winbind/config/enable` | true |
| `Winbind\WinbindConfig\UpdateWinbindConfigRequest` | POST | `/winbind/config/{id}` | Collection of `WinbindConfig` |
| `Winbind\WinbindConfig\JoinWinbindConfigDomainByIdRequest` | POST | `/winbind/config/joinDomain/{id}` | true |
| `Winbind\WinbindConfig\DeleteWinbindConfigRequest` | DELETE | `/winbind/config/{id}` | true |
