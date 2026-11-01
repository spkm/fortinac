<?php

use spkm\FortiNac\Data\Adapter\Adapter;
use spkm\FortiNac\Data\Device\Container;
use spkm\FortiNac\Data\Device\ContainerStartContainerMonitor;
use spkm\FortiNac\Data\Device\DiscoveryDiscoverDiscovery;
use spkm\FortiNac\Data\Device\DiscoveryDiscoverStatus;
use spkm\FortiNac\Data\Device\NetworkDevice;
use spkm\FortiNac\Data\Device\NetworkDevicePingableById;
use spkm\FortiNac\Data\Device\NetworkDeviceProperties;
use spkm\FortiNac\Data\Device\NetworkDeviceSnmp;
use spkm\FortiNac\Data\Device\NetworkDeviceSnmpById;
use spkm\FortiNac\Data\Device\Port;
use spkm\FortiNac\Data\Device\PortByDevice;
use spkm\FortiNac\Data\Device\PortChange;
use spkm\FortiNac\Data\Device\PortProperties;
use spkm\FortiNac\Data\Dynamic\FirewallSession;
use spkm\FortiNac\Data\Dynamic\FirewallSessionPollingById;
use spkm\FortiNac\Data\Host\Aging;
use spkm\FortiNac\Data\Host\DeviceIdentity;
use spkm\FortiNac\Data\Host\DeviceIdentitySource;
use spkm\FortiNac\Data\Host\DeviceProfilingRule;
use spkm\FortiNac\Data\Host\Fingerprint;
use spkm\FortiNac\Data\Host\Host;
use spkm\FortiNac\Data\Host\HostClientFiltersCachedByName;
use spkm\FortiNac\Data\Host\HostDeviceType;
use spkm\FortiNac\Data\Host\HostHealthHistory;
use spkm\FortiNac\Data\Host\HostMultifilter;
use spkm\FortiNac\Data\Host\HostNcmPod;
use spkm\FortiNac\Data\Host\HostsForUser;
use spkm\FortiNac\Data\Host\RegistrationRequest;
use spkm\FortiNac\Data\Host\ScannedApplication;
use spkm\FortiNac\Data\Host\ScanResult;
use spkm\FortiNac\Data\Logging\Alarm;
use spkm\FortiNac\Data\Logging\AlarmStartAlarmMonitor;
use spkm\FortiNac\Data\Logging\AuditLogEntry;
use spkm\FortiNac\Data\Logging\ConnectionLogEntry;
use spkm\FortiNac\Data\Logging\ConnectionLogEntryTopHostsActivity;
use spkm\FortiNac\Data\Logging\ConnectionLogEntryTopUsersConnectedTime;
use spkm\FortiNac\Data\Logging\Event;
use spkm\FortiNac\Data\Logging\EventAlarmMapping;
use spkm\FortiNac\Data\Logging\EventType;
use spkm\FortiNac\Data\Logging\EventTypeThresholds;
use spkm\FortiNac\Data\Policy\AccessConfiguration;
use spkm\FortiNac\Data\Policy\AccessPolicy;
use spkm\FortiNac\Data\Policy\AuthenticationConfiguration;
use spkm\FortiNac\Data\Policy\AuthenticationPolicy;
use spkm\FortiNac\Data\Policy\EndpointComplianceConfiguration;
use spkm\FortiNac\Data\Policy\EndpointCompliancePolicy;
use spkm\FortiNac\Data\Policy\EndpointComplianceScan;
use spkm\FortiNac\Data\Policy\EventAction;
use spkm\FortiNac\Data\Policy\LogicalNetwork;
use spkm\FortiNac\Data\Policy\LogicalNetworkConfiguration;
use spkm\FortiNac\Data\Policy\LogicalNetworkConfigurationElementPropertiesByDeviceId;
use spkm\FortiNac\Data\Policy\PortalConfiguration;
use spkm\FortiNac\Data\Policy\PortalPolicy;
use spkm\FortiNac\Data\Policy\Role;
use spkm\FortiNac\Data\Policy\RoleMapping;
use spkm\FortiNac\Data\Policy\SecurityAlarm;
use spkm\FortiNac\Data\Policy\SecurityEvent;
use spkm\FortiNac\Data\Policy\SecurityEventSummaryAlarmsTop;
use spkm\FortiNac\Data\Policy\SecurityEventSummaryEventsTop;
use spkm\FortiNac\Data\Policy\SecurityEventSummaryHostsTop;
use spkm\FortiNac\Data\Policy\SecurityEventSummaryStatistics;
use spkm\FortiNac\Data\Policy\SecurityRule;
use spkm\FortiNac\Data\Policy\SecurityRuleTrigger;
use spkm\FortiNac\Data\Policy\SupplicantConfiguration;
use spkm\FortiNac\Data\Policy\SupplicantPolicy;
use spkm\FortiNac\Data\Policy\UserHostProfile;
use spkm\FortiNac\Data\Portal\PortalSslSettings;
use spkm\FortiNac\Data\Radius\RadiusAttributeGroup;
use spkm\FortiNac\Data\Radius\RadiusDictionaryAttribute;
use spkm\FortiNac\Data\Radius\RadiusHealth;
use spkm\FortiNac\Data\Radius\RadiusHealthTimeline;
use spkm\FortiNac\Data\Radius\RadiusServer;
use spkm\FortiNac\Data\Radius\RadiusServerGlobal;
use spkm\FortiNac\Data\Radius\RadiusServerGlobalResult;
use spkm\FortiNac\Data\Settings\AaaMappingSwapAaaMapping;
use spkm\FortiNac\Data\Settings\AaaServer;
use spkm\FortiNac\Data\Settings\AaaServerValidateAaaServer;
use spkm\FortiNac\Data\Settings\AaaServerValidateById;
use spkm\FortiNac\Data\Settings\AccessPointManagement;
use spkm\FortiNac\Data\Settings\AgentPackage;
use spkm\FortiNac\Data\Settings\AgentProperties;
use spkm\FortiNac\Data\Settings\AgentUpdate;
use spkm\FortiNac\Data\Settings\AllowedDomains;
use spkm\FortiNac\Data\Settings\CertificateCsrGenerate;
use spkm\FortiNac\Data\Settings\CredentialConfig;
use spkm\FortiNac\Data\Settings\DeviceProfilerSettings;
use spkm\FortiNac\Data\Settings\DeviceType;
use spkm\FortiNac\Data\Settings\DeviceTypeImageArchive;
use spkm\FortiNac\Data\Settings\DirectoryAgent;
use spkm\FortiNac\Data\Settings\EmailSettings;
use spkm\FortiNac\Data\Settings\FirewallTag;
use spkm\FortiNac\Data\Settings\FortiGateTelemetry;
use spkm\FortiNac\Data\Settings\FssoSettings;
use spkm\FortiNac\Data\Settings\LdapServer;
use spkm\FortiNac\Data\Settings\LogReceiver;
use spkm\FortiNac\Data\Settings\MacExclusion;
use spkm\FortiNac\Data\Settings\MdmServer;
use spkm\FortiNac\Data\Settings\MessageTemplate;
use spkm\FortiNac\Data\Settings\MessagingGateway;
use spkm\FortiNac\Data\Settings\NatDetection;
use spkm\FortiNac\Data\Settings\NetworkAddress;
use spkm\FortiNac\Data\Settings\NetworkAddressGroup;
use spkm\FortiNac\Data\Settings\OsUpdate;
use spkm\FortiNac\Data\Settings\OsUpdateLogs;
use spkm\FortiNac\Data\Settings\OsUpdateUpdateData;
use spkm\FortiNac\Data\Settings\PaPacketTransportConfig;
use spkm\FortiNac\Data\Settings\PatchManagement;
use spkm\FortiNac\Data\Settings\PatchManagementBigFix;
use spkm\FortiNac\Data\Settings\ProxySettings;
use spkm\FortiNac\Data\Settings\Quarantine;
use spkm\FortiNac\Data\Settings\RogueDhcpDetection;
use spkm\FortiNac\Data\Settings\RogueDhcpDetectionVlans;
use spkm\FortiNac\Data\Settings\SecurityEventParser;
use spkm\FortiNac\Data\Settings\SecurityEventParserParseSecurityEventParserMessage;
use spkm\FortiNac\Data\Settings\SecurityEventParserTestSecurityEventParser;
use spkm\FortiNac\Data\Settings\SmsProvider;
use spkm\FortiNac\Data\Settings\SnmpSettings;
use spkm\FortiNac\Data\Settings\StatusNotifications;
use spkm\FortiNac\Data\Settings\SyslogServer;
use spkm\FortiNac\Data\Settings\TlsServiceConfiguration;
use spkm\FortiNac\Data\Settings\TlsServiceConfigurationAliases;
use spkm\FortiNac\Data\Settings\TrapMib;
use spkm\FortiNac\Data\Settings\VendorOui;
use spkm\FortiNac\Data\Settings\VulnerabilityScanner;
use spkm\FortiNac\Data\Settings\VulnerabilityScannerScans;
use spkm\FortiNac\Data\Settings\WebServiceDefinition;
use spkm\FortiNac\Data\Ssid\Ssid;
use spkm\FortiNac\Data\Ssid\SsidConfig;
use spkm\FortiNac\Data\System\AnalyticsProperties;
use spkm\FortiNac\Data\System\BackgroundTask;
use spkm\FortiNac\Data\System\BackupConfigurationFtp;
use spkm\FortiNac\Data\System\BackupConfigurationSftp;
use spkm\FortiNac\Data\System\BackupSettingsArchives;
use spkm\FortiNac\Data\System\DebugDatabaseRelation;
use spkm\FortiNac\Data\System\DebugElementsAttribute;
use spkm\FortiNac\Data\System\DebugPluginStatus;
use spkm\FortiNac\Data\System\Group;
use spkm\FortiNac\Data\System\GroupMembers;
use spkm\FortiNac\Data\System\HighAvailability;
use spkm\FortiNac\Data\System\LocalPropertiesCluster;
use spkm\FortiNac\Data\System\LocalPropertiesPasswordsChange;
use spkm\FortiNac\Data\System\LocalPropertiesSystemInitialize;
use spkm\FortiNac\Data\System\ManagedServerLicense;
use spkm\FortiNac\Data\System\ScheduledTask;
use spkm\FortiNac\Data\System\ScheduledTaskActivityTypes;
use spkm\FortiNac\Data\System\ServiceConnector;
use spkm\FortiNac\Data\System\Task;
use spkm\FortiNac\Data\User\AdminProfile;
use spkm\FortiNac\Data\User\AdminProfileMapping;
use spkm\FortiNac\Data\User\CurrentSessionBookmark;
use spkm\FortiNac\Data\User\Dashboard;
use spkm\FortiNac\Data\User\DashboardDeviceSummary;
use spkm\FortiNac\Data\User\DashboardDeviceSummaryDeviceByStatus;
use spkm\FortiNac\Data\User\DashboardScanSummaryPerDay;
use spkm\FortiNac\Data\User\Guest;
use spkm\FortiNac\Data\User\GuestConferenceRegistrationsCount;
use spkm\FortiNac\Data\User\GuestTemplate;
use spkm\FortiNac\Data\User\SelfRegistration;
use spkm\FortiNac\Data\User\SelfRegistrationDetails;
use spkm\FortiNac\Data\User\SessionTimeout;
use spkm\FortiNac\Data\User\User;
use spkm\FortiNac\Data\User\UserSearch;
use spkm\FortiNac\Data\Winbind\WinbindConfig;
use spkm\FortiNac\Requests\Adapter\Adapter\CountAdaptersRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\CountAllAdaptersRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\CreateAdapterRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\DeleteAdapterRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\DeleteAdapterViaPostRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\DeleteManyAdaptersRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\DisableAdapterRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\EnableAdapterRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\GetAdapterConnectedToPortsRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\GetAdapterForHostRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\GetAdapterGetPortRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\GetAdapterRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\GetAdaptersRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\GetAdapterUsageRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\ReprofileAdapterRoguesRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\RunAdapterNmapScanRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\UpdateAdapterRequest;
use spkm\FortiNac\Requests\Device\Container\CountAllContainersRequest;
use spkm\FortiNac\Requests\Device\Container\CountContainersRequest;
use spkm\FortiNac\Requests\Device\Container\CreateContainerRequest;
use spkm\FortiNac\Requests\Device\Container\DeleteContainerRequest;
use spkm\FortiNac\Requests\Device\Container\DeleteContainerViaPostRequest;
use spkm\FortiNac\Requests\Device\Container\DeleteManyContainersRequest;
use spkm\FortiNac\Requests\Device\Container\GetContainerMonitorRequest;
use spkm\FortiNac\Requests\Device\Container\GetContainerRequest;
use spkm\FortiNac\Requests\Device\Container\GetContainersRequest;
use spkm\FortiNac\Requests\Device\Container\GetContainerUsageRequest;
use spkm\FortiNac\Requests\Device\Container\StartContainerMonitorRequest;
use spkm\FortiNac\Requests\Device\Container\StopContainerMonitorRequest;
use spkm\FortiNac\Requests\Device\Discovery\DiscoverDiscoveryRequest;
use spkm\FortiNac\Requests\Device\Discovery\DiscoverDiscoveryStopRequest;
use spkm\FortiNac\Requests\Device\Discovery\GetDiscoveryDiscoverStatusAllRequest;
use spkm\FortiNac\Requests\Device\Discovery\GetDiscoveryDiscoverStatusRequest;
use spkm\FortiNac\Requests\Device\L3Scan\GetL3ScanStatusRequest;
use spkm\FortiNac\Requests\Device\L3Scan\StartL3ScanRequest;
use spkm\FortiNac\Requests\Device\L3Scan\StopL3ScanRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\CountAllNetworkDevicesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\CountNetworkDevicesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\DeleteManyNetworkDevicesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\DeleteNetworkDeviceRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\DeleteNetworkDeviceViaPostRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDeviceMonitorRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDeviceMoveRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDevicePollingL3Request;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDevicePropertiesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDeviceRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDevicesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDeviceUsageRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\PostNetworkDevicePingableByIdRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\PostNetworkDevicePingableRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\PostNetworkDevicePropertiesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\PostNetworkDeviceSnmpByIdRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\PostNetworkDeviceSnmpRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\ResyncNetworkDeviceInterfacesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\StartNetworkDeviceMonitorRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\StopNetworkDeviceMonitorRequest;
use spkm\FortiNac\Requests\Device\Port\CountAllPortsRequest;
use spkm\FortiNac\Requests\Device\Port\CountPortsRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortByDeviceRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortEnforcementCountRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortEnforcementRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortFeaturePortManagementRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortMonitorRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortsRequest;
use spkm\FortiNac\Requests\Device\Port\PostPortPropertiesRequest;
use spkm\FortiNac\Requests\Device\Port\StartPortMonitorRequest;
use spkm\FortiNac\Requests\Device\Port\StopPortMonitorRequest;
use spkm\FortiNac\Requests\Device\PortChange\CountAllPortChangesRequest;
use spkm\FortiNac\Requests\Device\PortChange\CountPortChangesRequest;
use spkm\FortiNac\Requests\Device\PortChange\GetPortChangeRequest;
use spkm\FortiNac\Requests\Device\PortChange\GetPortChangesRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\CreateFirewallSessionRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\DeleteFirewallSessionRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\DeleteFirewallSessionViaPostRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\DeleteManyFirewallSessionsRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\GetFirewallSessionHostByIdRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\GetFirewallSessionPollingByIdRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\GetFirewallSessionRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\GetFirewallSessionsRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\GetFirewallSessionUsageRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\PostFirewallSessionPollingByIdRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\PostFirewallSessionPollingRunRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\UpdateFirewallSessionRequest;
use spkm\FortiNac\Requests\Host\Aging\ClearAgingRegisteredRequest;
use spkm\FortiNac\Requests\Host\Aging\ClearAgingUnregisteredRequest;
use spkm\FortiNac\Requests\Host\Aging\ClearAgingUsersRequest;
use spkm\FortiNac\Requests\Host\Aging\GetAgingRequest;
use spkm\FortiNac\Requests\Host\Aging\UpdateAgingRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\ConfirmDeviceIdentityRuleRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\CountAllDeviceIdentitiesRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\CountDeviceIdentitiesRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\CreateDeviceIdentityRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\DeleteDeviceIdentityRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\DeleteDeviceIdentityViaPostRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\DeleteManyDeviceIdentitiesRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\GetDeviceIdentitiesRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\GetDeviceIdentityFingerprintByIdRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\GetDeviceIdentityFingerprintsRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\GetDeviceIdentityRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\GetDeviceIdentityUsageRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\UpdateDeviceIdentityRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\CreateDeviceIdentitySourceRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\DeleteDeviceIdentitySourceRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\DeleteDeviceIdentitySourceViaPostRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\DeleteManyDeviceIdentitySourcesRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\DisableDeviceIdentitySourceRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\EnableDeviceIdentitySourceRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\GetDeviceIdentitySourceRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\GetDeviceIdentitySourcesRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\SetDeviceIdentitySourceRankRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\SwapDeviceIdentitySourceRanksRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\UpdateDeviceIdentitySourceRequest;
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
use spkm\FortiNac\Requests\Host\Fingerprint\CountAllFingerprintsRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\CountFingerprintsRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\CreateFingerprintRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\DeleteFingerprintRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\DeleteFingerprintViaPostRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\DeleteManyFingerprintsRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\GetFingerprintRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\GetFingerprintsRequest;
use spkm\FortiNac\Requests\Host\Fingerprint\UpdateFingerprintRequest;
use spkm\FortiNac\Requests\Host\Host\CountAllHostsRequest;
use spkm\FortiNac\Requests\Host\Host\CountHostsRequest;
use spkm\FortiNac\Requests\Host\Host\CreateHostRequest;
use spkm\FortiNac\Requests\Host\Host\DeleteHostRequest;
use spkm\FortiNac\Requests\Host\Host\DeleteHostViaPostRequest;
use spkm\FortiNac\Requests\Host\Host\DeleteManyHostsRequest;
use spkm\FortiNac\Requests\Host\Host\DisableHostByIpRequest;
use spkm\FortiNac\Requests\Host\Host\DisableHostByMacRequest;
use spkm\FortiNac\Requests\Host\Host\DisableHostRequest;
use spkm\FortiNac\Requests\Host\Host\EnableHostByIpRequest;
use spkm\FortiNac\Requests\Host\Host\EnableHostByMacRequest;
use spkm\FortiNac\Requests\Host\Host\EnableHostRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostByIpRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostByMacRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostClientFiltersCachedByNameRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostClientFiltersRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostConnectedToPortRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostDeviceTypesRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostForUserRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostGlobalAllowedHostsRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostHealthHistoryRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostMultifilterRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostMultifilterUsersRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostNcmPodsRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostPolicyRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostSearchRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostsRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostUsageRequest;
use spkm\FortiNac\Requests\Host\Host\ImportHostHostsRequest;
use spkm\FortiNac\Requests\Host\Host\PostHostWithAdaptersByIdRequest;
use spkm\FortiNac\Requests\Host\Host\PostHostWithAdaptersRequest;
use spkm\FortiNac\Requests\Host\Host\RegisterHostAsDeviceRequest;
use spkm\FortiNac\Requests\Host\Host\RescanHostWithProfileRequest;
use spkm\FortiNac\Requests\Host\Host\SendHostPersistentAgentMessageRequest;
use spkm\FortiNac\Requests\Host\Host\SetHostExpirationRequest;
use spkm\FortiNac\Requests\Host\Host\SetHostHealthRequest;
use spkm\FortiNac\Requests\Host\Host\SetHostLoggedOnUserRequest;
use spkm\FortiNac\Requests\Host\Host\SetHostRoleRequest;
use spkm\FortiNac\Requests\Host\Host\UpdateHostPersistentAgentRequest;
use spkm\FortiNac\Requests\Host\Host\UpdateHostRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\ApproveRegistrationRequestRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\DeleteManyRegistrationRequestsRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\DeleteRegistrationRequestRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\DeleteRegistrationRequestViaPostRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\DenyRegistrationRequestRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\GetRegistrationRequestRequest;
use spkm\FortiNac\Requests\Host\RegistrationRequest\GetRegistrationRequestsRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\DeleteManyScannedApplicationsRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\DeleteScannedApplicationRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\DeleteScannedApplicationViaPostRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\GetScannedApplicationForHostRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\GetScannedApplicationRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\GetScannedApplicationsRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\GetScannedApplicationUsageRequest;
use spkm\FortiNac\Requests\Host\ScannedApplication\PostScannedApplicationThreatRequest;
use spkm\FortiNac\Requests\Host\ScanResult\CountAllScanResultsRequest;
use spkm\FortiNac\Requests\Host\ScanResult\CountScanResultsRequest;
use spkm\FortiNac\Requests\Host\ScanResult\CreateScanResultRequest;
use spkm\FortiNac\Requests\Host\ScanResult\GetScanResultArchiveImportStatusRequest;
use spkm\FortiNac\Requests\Host\ScanResult\GetScanResultArchivesRequest;
use spkm\FortiNac\Requests\Host\ScanResult\GetScanResultRequest;
use spkm\FortiNac\Requests\Host\ScanResult\GetScanResultsRequest;
use spkm\FortiNac\Requests\Host\ScanResult\PostScanResultArchiveCreateRequest;
use spkm\FortiNac\Requests\Host\ScanResult\PostScanResultArchiveImportRequest;
use spkm\FortiNac\Requests\Logging\Alarm\AcknowledgeAlarm2Request;
use spkm\FortiNac\Requests\Logging\Alarm\AcknowledgeAlarmRequest;
use spkm\FortiNac\Requests\Logging\Alarm\CountAlarmsRequest;
use spkm\FortiNac\Requests\Logging\Alarm\CountAllAlarmsRequest;
use spkm\FortiNac\Requests\Logging\Alarm\DeleteAlarmRequest;
use spkm\FortiNac\Requests\Logging\Alarm\DeleteAlarmViaPostRequest;
use spkm\FortiNac\Requests\Logging\Alarm\DeleteManyAlarmsRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmArchiveImportStatusRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmArchiveRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmMonitorRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmsRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmSupportingInfoRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmUsageRequest;
use spkm\FortiNac\Requests\Logging\Alarm\PostAlarmArchiveImportRequest;
use spkm\FortiNac\Requests\Logging\Alarm\StartAlarmMonitorRequest;
use spkm\FortiNac\Requests\Logging\Alarm\StopAlarmMonitorRequest;
use spkm\FortiNac\Requests\Logging\AuditLogEntry\CountAuditLogEntriesRequest;
use spkm\FortiNac\Requests\Logging\AuditLogEntry\GetAuditLogEntriesRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\CountAllConnectionLogEntriesRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\CountConnectionLogEntriesRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntriesRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryArchiveImportStatusRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryArchiveRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryBySessionRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryTabledatatotalsRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryTopHostsActivityRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryTopUsersConnectedTimeRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryVlanChangesRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\PostConnectionLogEntryArchiveImportRequest;
use spkm\FortiNac\Requests\Logging\Event\CountAllEventsRequest;
use spkm\FortiNac\Requests\Logging\Event\CountEventsRequest;
use spkm\FortiNac\Requests\Logging\Event\CreateEventRequest;
use spkm\FortiNac\Requests\Logging\Event\DeleteEventRequest;
use spkm\FortiNac\Requests\Logging\Event\DeleteEventViaPostRequest;
use spkm\FortiNac\Requests\Logging\Event\DeleteManyEventsRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventArchiveImportStatusRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventArchiveRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventMonitorRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventsRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventSupportingInfoRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventUsageRequest;
use spkm\FortiNac\Requests\Logging\Event\PostEventArchiveImportRequest;
use spkm\FortiNac\Requests\Logging\Event\PostEventNoteRequest;
use spkm\FortiNac\Requests\Logging\Event\StartEventMonitorRequest;
use spkm\FortiNac\Requests\Logging\Event\StopEventMonitorRequest;
use spkm\FortiNac\Requests\Logging\Event\UpdateEventRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\CountAllEventAlarmMappingsRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\CountEventAlarmMappingsRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\CreateEventAlarmMappingRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\DeleteEventAlarmMappingRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\DeleteEventAlarmMappingViaPostRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\DeleteManyEventAlarmMappingsRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\DisableManyEventAlarmMappingsRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\EnableManyEventAlarmMappingsRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\GetEventAlarmMappingRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\GetEventAlarmMappingsRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\GetEventAlarmMappingSupportingInfoRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\GetEventAlarmMappingUsageRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\ModifyEventAlarmMappingRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\UpdateEventAlarmMappingRequest;
use spkm\FortiNac\Requests\Logging\EventType\CountAllEventTypesRequest;
use spkm\FortiNac\Requests\Logging\EventType\CountEventTypesRequest;
use spkm\FortiNac\Requests\Logging\EventType\GetEventTypeCountByIdRequest;
use spkm\FortiNac\Requests\Logging\EventType\GetEventTypesRequest;
use spkm\FortiNac\Requests\Logging\EventType\GetEventTypeThresholdsRequest;
use spkm\FortiNac\Requests\Logging\EventType\PostEventTypeGroupRequest;
use spkm\FortiNac\Requests\Logging\EventType\PostEventTypeLoggingStrategyRequest;
use spkm\FortiNac\Requests\Logging\EventType\PostEventTypeThresholdsRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\CountAccessConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\CountAllAccessConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\CreateAccessConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\DeleteAccessConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\DeleteAccessConfigurationViaPostRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\DeleteManyAccessConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\GetAccessConfigurationDirectConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\GetAccessConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\GetAccessConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\GetAccessConfigurationSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\GetAccessConfigurationUsageRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\UpdateAccessConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\CreateAccessPolicyRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\DeleteAccessPolicyRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\DeleteAccessPolicyViaPostRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\DeleteManyAccessPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\DisableAccessPolicyRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\DisableManyAccessPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\EnableAccessPolicyRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\EnableManyAccessPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\GetAccessPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\GetAccessPolicyRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\GetAccessPolicySupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\SetAccessPolicyRankRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\SwapAccessPolicyRanksRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\UpdateAccessPolicyRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\CreateAuthenticationConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\DeleteAuthenticationConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\DeleteAuthenticationConfigurationViaPostRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\DeleteManyAuthenticationConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\GetAuthenticationConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\GetAuthenticationConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\GetAuthenticationConfigurationUsageRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\UpdateAuthenticationConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\CreateAuthenticationPolicyRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\DeleteAuthenticationPolicyRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\DeleteAuthenticationPolicyViaPostRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\DeleteManyAuthenticationPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\DisableAuthenticationPolicyRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\DisableManyAuthenticationPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\EnableAuthenticationPolicyRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\EnableManyAuthenticationPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\GetAuthenticationPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\GetAuthenticationPolicyRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\SetAuthenticationPolicyRankRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\SwapAuthenticationPolicyRanksRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\UpdateAuthenticationPolicyRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\CreateEndpointComplianceConfigurationRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\DeleteEndpointComplianceConfigurationRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\DeleteEndpointComplianceConfigurationViaPostRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\DeleteManyEndpointComplianceConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\GetEndpointComplianceConfigurationRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\GetEndpointComplianceConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\GetEndpointComplianceConfigurationSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\GetEndpointComplianceConfigurationUsageRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\UpdateEndpointComplianceConfigurationRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan\GetEndpointComplianceCustomScanHtmlRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan\GetEndpointComplianceCustomScanRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan\GetEndpointComplianceCustomScanUsageRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan\PostEndpointComplianceCustomScanCustomScanDeleteRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan\PostEndpointComplianceCustomScanCustomScanRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\CreateEndpointCompliancePolicyRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\DeleteEndpointCompliancePolicyRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\DeleteEndpointCompliancePolicyViaPostRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\DeleteManyEndpointCompliancePoliciesRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\DisableEndpointCompliancePolicyRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\DisableManyEndpointCompliancePoliciesRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\EnableEndpointCompliancePolicyRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\EnableManyEndpointCompliancePoliciesRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\GetEndpointCompliancePoliciesRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\GetEndpointCompliancePolicyRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\GetEndpointCompliancePolicySupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\SetEndpointCompliancePolicyRankRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\SwapEndpointCompliancePolicyRanksRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\UpdateEndpointCompliancePolicyRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\CopyEndpointComplianceScanRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\CountAllEndpointComplianceScansRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\CountEndpointComplianceScansRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\CreateEndpointComplianceScanRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\DeleteEndpointComplianceScanRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\DeleteEndpointComplianceScanViaPostRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\DeleteManyEndpointComplianceScansRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\GetEndpointComplianceScanAvailableRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\GetEndpointComplianceScanDetailsRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\GetEndpointComplianceScanProductRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\GetEndpointComplianceScanRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\GetEndpointComplianceScansRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\GetEndpointComplianceScanUsageRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\PostEndpointComplianceScanDetails2Request;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\PostEndpointComplianceScanDetailsRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\RemoveEndpointComplianceScanPolicyTypesRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\UpdateEndpointComplianceScanRequest;
use spkm\FortiNac\Requests\Policy\EventAction\CreateEventActionRequest;
use spkm\FortiNac\Requests\Policy\EventAction\DeleteEventActionRequest;
use spkm\FortiNac\Requests\Policy\EventAction\DeleteEventActionViaPostRequest;
use spkm\FortiNac\Requests\Policy\EventAction\DeleteManyEventActionsRequest;
use spkm\FortiNac\Requests\Policy\EventAction\GetEventActionRequest;
use spkm\FortiNac\Requests\Policy\EventAction\GetEventActionsRequest;
use spkm\FortiNac\Requests\Policy\EventAction\GetEventActionSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\EventAction\GetEventActionUsageRequest;
use spkm\FortiNac\Requests\Policy\EventAction\UpdateEventActionRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\AddLogicalNetworkPredefinedNetworkAccessRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\CreateLogicalNetworkRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\DeleteLogicalNetworkRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\DeleteLogicalNetworkViaPostRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\DeleteManyLogicalNetworksRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\GetLogicalNetworkRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\GetLogicalNetworksRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\GetLogicalNetworkUsageRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\UpdateLogicalNetworkRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\BatchLogicalNetworkConfigurationUpsertRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\CreateLogicalNetworkConfigurationRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\DeleteLogicalNetworkConfigurationRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\DeleteLogicalNetworkConfigurationViaPostRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\DeleteManyLogicalNetworkConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationElementPropertiesRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationRadiusRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationUsageRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\PostLogicalNetworkConfigurationElementPropertiesByDeviceIdRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\PostLogicalNetworkConfigurationElementPropertiesRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\UpdateLogicalNetworkConfigurationRequest;
use spkm\FortiNac\Requests\Policy\PortalConfiguration\DeletePortalConfigurationRequest;
use spkm\FortiNac\Requests\Policy\PortalConfiguration\GetPortalConfigurationRequest;
use spkm\FortiNac\Requests\Policy\PortalConfiguration\GetPortalConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\PortalConfiguration\GetPortalConfigurationUsageRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\CreatePortalPolicyRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\DeleteManyPortalPoliciesRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\DeletePortalPolicyViaPostRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\DisableManyPortalPoliciesRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\EnableManyPortalPoliciesRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\GetPortalPoliciesRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\GetPortalPolicyRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\GetPortalPolicySupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\SetPortalPolicyRankRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\SwapPortalPolicyRanksRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\UpdatePortalPolicyRequest;
use spkm\FortiNac\Requests\Policy\Role\CreateRoleRequest;
use spkm\FortiNac\Requests\Policy\Role\DeleteManyRolesRequest;
use spkm\FortiNac\Requests\Policy\Role\DeleteRoleRequest;
use spkm\FortiNac\Requests\Policy\Role\DeleteRoleViaPostRequest;
use spkm\FortiNac\Requests\Policy\Role\GetRoleRequest;
use spkm\FortiNac\Requests\Policy\Role\GetRoleSimpleRequest;
use spkm\FortiNac\Requests\Policy\Role\GetRolesRequest;
use spkm\FortiNac\Requests\Policy\Role\GetRoleSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\Role\PostRoleUsageRequest;
use spkm\FortiNac\Requests\Policy\Role\SetRoleRankRequest;
use spkm\FortiNac\Requests\Policy\Role\SwapRoleRanksRequest;
use spkm\FortiNac\Requests\Policy\Role\UpdateRoleRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\CreateRoleMappingRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\DeleteManyRoleMappingsRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\DeleteRoleMappingRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\DeleteRoleMappingViaPostRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\GetRoleMappingDirectConfigurationRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\GetRoleMappingMembershipRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\GetRoleMappingRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\GetRoleMappingsRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\GetRoleMappingSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\GetRoleMappingUsageRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\SetRoleMappingRankRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\SwapRoleMappingRanksRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\UpdateRoleMappingRequest;
use spkm\FortiNac\Requests\Policy\SecurityAlarm\GetSecurityAlarmMonitorRequest;
use spkm\FortiNac\Requests\Policy\SecurityAlarm\GetSecurityAlarmRequest;
use spkm\FortiNac\Requests\Policy\SecurityAlarm\GetSecurityAlarmsRequest;
use spkm\FortiNac\Requests\Policy\SecurityAlarm\PostSecurityAlarmMonitorStopRequest;
use spkm\FortiNac\Requests\Policy\SecurityAlarm\StartSecurityAlarmMonitorRequest;
use spkm\FortiNac\Requests\Policy\SecurityEvent\GetSecurityEventMonitorRequest;
use spkm\FortiNac\Requests\Policy\SecurityEvent\GetSecurityEventRequest;
use spkm\FortiNac\Requests\Policy\SecurityEvent\GetSecurityEventsRequest;
use spkm\FortiNac\Requests\Policy\SecurityEvent\PostSecurityEventMonitorStopRequest;
use spkm\FortiNac\Requests\Policy\SecurityEvent\StartSecurityEventMonitorRequest;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryAlarmsTopRequest;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryDashSecurityHostsForAlarmRequest;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryEventsTopRequest;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryHostsIsolatedRequest;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryHostsRemediatedRequest;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryHostsTopRequest;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryStatisticsRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\CreateSecurityRuleRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\DeleteManySecurityRulesRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\DeleteSecurityRuleRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\DeleteSecurityRuleViaPostRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\DisableSecurityRuleRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\EnableSecurityRuleRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\GetSecurityRuleRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\GetSecurityRulesRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\SetSecurityRuleRankRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\SwapSecurityRuleRanksRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\UpdateSecurityRuleRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\CreateSecurityRuleTriggerRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\DeleteManySecurityRuleTriggersRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\DeleteSecurityRuleTriggerRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\DeleteSecurityRuleTriggerViaPostRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\GetSecurityRuleTriggerRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\GetSecurityRuleTriggersRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\GetSecurityRuleTriggerUsageRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\UpdateSecurityRuleTriggerRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\CreateSupplicantConfigurationRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\DeleteManySupplicantConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\DeleteSupplicantConfigurationRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\DeleteSupplicantConfigurationViaPostRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\GetSupplicantConfigurationRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\GetSupplicantConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\GetSupplicantConfigurationSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\GetSupplicantConfigurationUsageRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\UpdateSupplicantConfigurationRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\CreateSupplicantPolicyRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\DeleteManySupplicantPoliciesRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\DeleteSupplicantPolicyRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\DeleteSupplicantPolicyViaPostRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\DisableManySupplicantPoliciesRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\DisableSupplicantPolicyRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\EnableManySupplicantPoliciesRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\EnableSupplicantPolicyRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\GetSupplicantPoliciesRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\GetSupplicantPolicyRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\GetSupplicantPolicySupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\SetSupplicantPolicyRankRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\SwapSupplicantPolicyRanksRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\UpdateSupplicantPolicyRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\CreateUserHostProfileRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\DeleteManyUserHostProfilesRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\DeleteUserHostProfileRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\DeleteUserHostProfileViaPostRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\GetUserHostProfileRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\GetUserHostProfilesRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\GetUserHostProfileSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\GetUserHostProfileUsageRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\UpdateUserHostProfileRequest;
use spkm\FortiNac\Requests\Portal\PortalSslSettings\GetPortalSslSettingsRequest;
use spkm\FortiNac\Requests\Portal\PortalSslSettings\UpdatePortalSslSettingsRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\CreateRadiusAttributeGroupRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\DeleteManyRadiusAttributeGroupsRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\DeleteRadiusAttributeGroupModelcfgByDeviceIdRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\DeleteRadiusAttributeGroupRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupListRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupModelcfgByDeviceIdRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupNameByGroupNameRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupResponsevaluesByLogicalNetworkAttrGrpIdRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupsRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupUsageRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\PostRadiusAttributeGroupModelcfgByAttrGroupIdRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\UpdateRadiusAttributeGroupRequest;
use spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute\CreateRadiusDictionaryAttributeRequest;
use spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute\DeleteManyRadiusDictionaryAttributesRequest;
use spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute\DeleteRadiusDictionaryAttributeRequest;
use spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute\GetRadiusDictionaryAttributeAttributeByNameRequest;
use spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute\GetRadiusDictionaryAttributesRequest;
use spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute\UpdateRadiusDictionaryAttributeRequest;
use spkm\FortiNac\Requests\Radius\RadiusHealth\GetRadiusHealth2Request;
use spkm\FortiNac\Requests\Radius\RadiusHealth\GetRadiusHealthLatestRequest;
use spkm\FortiNac\Requests\Radius\RadiusHealth\GetRadiusHealthRequest;
use spkm\FortiNac\Requests\Radius\RadiusHealth\GetRadiusHealthSnapshotIntervalRequest;
use spkm\FortiNac\Requests\Radius\RadiusHealth\GetRadiusHealthTimelineRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\CreateRadiusServerRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\DeleteManyRadiusServersRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\DeleteRadiusServerRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\DisableManyRadiusServersRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\EnableManyRadiusServersRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServerActivityStatusRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServerEapTypesRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServerGlobalRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServerLogRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServerRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServersRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServerStatusRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\PostRadiusServerGlobalRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\PostRadiusServerNasFixstaleByIdRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\UpdateRadiusServerRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\CreateAaaMappingRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\DeleteManyAaaMappingsRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\GetAaaMappingDefaultsRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\GetAaaMappingLocalDomainsRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\GetAaaMappingRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\PostAaaMappingDefaultsRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\PostAaaMappingLocalDomainsDeleteRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\PostAaaMappingLocalDomainsRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\SwapAaaMappingRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\CountAaaServersRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\CountAllAaaServersRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\CreateAaaServerRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\DeleteAaaServerRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\DeleteAaaServerViaPostRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\DeleteManyAaaServersRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServerRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServerSecretRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServersRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServerSupportsValidationRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServerUsageRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServerValidateByIdRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\GetAaaServerValidateUserPasswordRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\UpdateAaaServerRequest;
use spkm\FortiNac\Requests\Settings\AaaServer\ValidateAaaServerRequest;
use spkm\FortiNac\Requests\Settings\AccessPointManagement\GetAccessPointManagementRequest;
use spkm\FortiNac\Requests\Settings\AgentPackage\DeleteAgentPackageRequest;
use spkm\FortiNac\Requests\Settings\AgentPackage\DeleteAgentPackageViaPostRequest;
use spkm\FortiNac\Requests\Settings\AgentPackage\GetAgentPackageAvailableAgentsRequest;
use spkm\FortiNac\Requests\Settings\AgentPackage\GetAgentPackagesRequest;
use spkm\FortiNac\Requests\Settings\AgentProperties\GetAgentPropertiesRequest;
use spkm\FortiNac\Requests\Settings\AgentProperties\UpdateAgentPropertiesRequest;
use spkm\FortiNac\Requests\Settings\AgentUpdate\GetAgentUpdateRequest;
use spkm\FortiNac\Requests\Settings\AgentUpdate\ResetAgentUpdateCounterRequest;
use spkm\FortiNac\Requests\Settings\AgentUpdate\UpdateAgentUpdateRequest;
use spkm\FortiNac\Requests\Settings\AllowedDomains\GetAllowedDomainsRequest;
use spkm\FortiNac\Requests\Settings\AllowedDomains\ResetAllowedDomainsRequest;
use spkm\FortiNac\Requests\Settings\AllowedDomains\UpdateAllowedDomainsRequest;
use spkm\FortiNac\Requests\Settings\Certificate\CopyCertificateRequest;
use spkm\FortiNac\Requests\Settings\Certificate\DeleteCertificateServerCertRequest;
use spkm\FortiNac\Requests\Settings\Certificate\DeleteCertificateViaPostRequest;
use spkm\FortiNac\Requests\Settings\Certificate\GetCertificatesRequest;
use spkm\FortiNac\Requests\Settings\Certificate\PostCertificateCsrGenerateRequest;
use spkm\FortiNac\Requests\Settings\Certificate\RestartCertificateRequest;
use spkm\FortiNac\Requests\Settings\Certificate\UpdateCertificateRequest;
use spkm\FortiNac\Requests\Settings\CredentialConfig\GetCredentialConfigRequest;
use spkm\FortiNac\Requests\Settings\CredentialConfig\UpdateCredentialConfigRequest;
use spkm\FortiNac\Requests\Settings\DeviceProfilerSettings\GetDeviceProfilerSettingsRequest;
use spkm\FortiNac\Requests\Settings\DeviceProfilerSettings\UpdateDeviceProfilerSettingsRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\CreateDeviceTypeFromArchiveRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\CreateDeviceTypeRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\DeleteDeviceTypeRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\DeleteDeviceTypeViaPostRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\DeleteManyDeviceTypesRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\GetDeviceTypeImageArchiveRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\GetDeviceTypeRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\GetDeviceTypesRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\GetDeviceTypeUsageRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\UpdateDeviceTypeRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\CreateDirectoryAgentRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\DeleteDirectoryAgentRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\DeleteDirectoryAgentViaPostRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\DeleteManyDirectoryAgentsRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\DisableDirectoryAgentRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\EnableDirectoryAgentRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentDirectoryGroupsRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentGroupsRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentsRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentSubnetRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentSubnetTestRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentUsageRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\PostDirectoryAgentSubnetDeleteRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\PostDirectoryAgentSubnetRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\SetDirectoryAgentRankRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\SwapDirectoryAgentRanksRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\TestDirectoryAgentRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\UpdateDirectoryAgentRequest;
use spkm\FortiNac\Requests\Settings\EmailSettings\CreateEmailSettingsRequest;
use spkm\FortiNac\Requests\Settings\EmailSettings\DeleteManyEmailSettingsRequest;
use spkm\FortiNac\Requests\Settings\EmailSettings\PostEmailSettingsPasswordRequest;
use spkm\FortiNac\Requests\Settings\EmailSettings\TestEmailSettingsRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\CreateFirewallTagRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\DeleteFirewallTagRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\DeleteFirewallTagViaPostRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\DeleteManyFirewallTagsRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\GetFirewallTagRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\GetFirewallTagsRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\GetFirewallTagUsageRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\UpdateFirewallTagRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\CreateFortiGateTelemetryRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\DeleteFortiGateTelemetryRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\DeleteFortiGateTelemetryViaPostRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\DeleteManyFortiGateTelemetriesRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\GetFortiGateTelemetriesRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\GetFortiGateTelemetryRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\GetFortiGateTelemetryUsageRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\UpdateFortiGateTelemetryRequest;
use spkm\FortiNac\Requests\Settings\FssoSettings\GetFssoSettingsPasswordRequest;
use spkm\FortiNac\Requests\Settings\FssoSettings\GetFssoSettingsRequest;
use spkm\FortiNac\Requests\Settings\FssoSettings\UpdateFssoSettingsRequest;
use spkm\FortiNac\Requests\Settings\GoogleSettings\GetGoogleSettingsClientIdRequest;
use spkm\FortiNac\Requests\Settings\GoogleSettings\GetGoogleSettingsDomainsRequest;
use spkm\FortiNac\Requests\Settings\GoogleSettings\PostGoogleSettingsClientIdRequest;
use spkm\FortiNac\Requests\Settings\GoogleSettings\PostGoogleSettingsDomainsByIdRequest;
use spkm\FortiNac\Requests\Settings\GoogleSettings\PostGoogleSettingsDomainsDeleteRequest;
use spkm\FortiNac\Requests\Settings\GoogleSettings\PostGoogleSettingsDomainsRequest;
use spkm\FortiNac\Requests\Settings\GoogleSettings\PostGoogleSettingsDomainsSetRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\CountAllLdapServersRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\CountLdapServersRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\CreateLdapServerRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\DeleteLdapServerRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\DeleteLdapServerViaPostRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\DeleteManyLdapServersRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\GetLdapServerRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\GetLdapServersRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\GetLdapServerUsageRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\UpdateLdapServerRequest;
use spkm\FortiNac\Requests\Settings\LogReceiver\DeleteManyLogReceiversRequest;
use spkm\FortiNac\Requests\Settings\LogReceiver\GetLogReceiversRequest;
use spkm\FortiNac\Requests\Settings\LogReceiver\UpdateLogReceiverRequest;
use spkm\FortiNac\Requests\Settings\MacExclusion\CreateMacExclusionRequest;
use spkm\FortiNac\Requests\Settings\MacExclusion\DeleteManyMacExclusionsRequest;
use spkm\FortiNac\Requests\Settings\MacExclusion\GetMacExclusionsRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\AuthenticateMdmServerRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\CreateMdmServerRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\DeleteManyMdmServersRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\DeleteMdmServerRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\DeleteMdmServerViaPostRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\GetMdmServerPasswordRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\GetMdmServerRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\GetMdmServersRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\GetMdmServerUsageRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\PollMdmServerRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\TestMdmServerRequest;
use spkm\FortiNac\Requests\Settings\MdmServer\UpdateMdmServerRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\CreateMessageTemplateRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\DeleteManyMessageTemplatesRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\DeleteMessageTemplateRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\DeleteMessageTemplateViaPostRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\GetMessageTemplateRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\GetMessageTemplatesRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\GetMessageTemplateUsageRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\TestMessageTemplateRequest;
use spkm\FortiNac\Requests\Settings\MessageTemplate\UpdateMessageTemplateRequest;
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
use spkm\FortiNac\Requests\Settings\NatDetection\GetNatDetectionRequest;
use spkm\FortiNac\Requests\Settings\NatDetection\PostNatDetectionIpRangesByIdRequest;
use spkm\FortiNac\Requests\Settings\NatDetection\PostNatDetectionIpRangesDeleteRequest;
use spkm\FortiNac\Requests\Settings\NatDetection\PostNatDetectionIpRangesRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\CreateNetworkAddressRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\DeleteManyNetworkAddressesRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\DeleteNetworkAddressRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\DeleteNetworkAddressViaPostRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\GetNetworkAddressesRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\GetNetworkAddressRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\GetNetworkAddressUsageRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\UpdateNetworkAddressRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\CreateNetworkAddressGroupRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\DeleteManyNetworkAddressGroupsRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\DeleteNetworkAddressGroupRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\DeleteNetworkAddressGroupViaPostRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\GetNetworkAddressGroupRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\GetNetworkAddressGroupsRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\GetNetworkAddressGroupUsageRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\UpdateNetworkAddressGroupRequest;
use spkm\FortiNac\Requests\Settings\OsUpdate\GetOsUpdateLogsRequest;
use spkm\FortiNac\Requests\Settings\OsUpdate\GetOsUpdatesRequest;
use spkm\FortiNac\Requests\Settings\OsUpdate\GetOsUpdateUpdateDataRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\CreatePaPacketTransportConfigRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\DeleteManyPaPacketTransportConfigsRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\DeletePaPacketTransportConfigRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\DeletePaPacketTransportConfigViaPostRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\DeployPaPacketTransportConfigRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\GetPaPacketTransportConfigPerformanceRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\GetPaPacketTransportConfigRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\GetPaPacketTransportConfigsRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\GetPaPacketTransportConfigUsageRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\UpdatePaPacketTransportConfigRequest;
use spkm\FortiNac\Requests\Settings\PatchManagement\GetPatchManagementRequest;
use spkm\FortiNac\Requests\Settings\PatchManagement\PostPatchManagementBigFixRequest;
use spkm\FortiNac\Requests\Settings\PatchManagement\PostPatchManagementPatchLinkByIdRequest;
use spkm\FortiNac\Requests\Settings\PatchManagement\PostPatchManagementPropertiesBigFixByIdRequest;
use spkm\FortiNac\Requests\Settings\PatchManagement\PostPatchManagementPropertiesPatchLinkByIdRequest;
use spkm\FortiNac\Requests\Settings\PatchManagement\TestPatchManagementByIdRequest;
use spkm\FortiNac\Requests\Settings\PatchManagement\TestPatchManagementRequest;
use spkm\FortiNac\Requests\Settings\ProxySettings\GetProxySettingsRequest;
use spkm\FortiNac\Requests\Settings\ProxySettings\UpdateProxySettingsRequest;
use spkm\FortiNac\Requests\Settings\Quarantine\GetQuarantineRequest;
use spkm\FortiNac\Requests\Settings\Quarantine\MarkQuarantineAllHostsSafeRequest;
use spkm\FortiNac\Requests\Settings\Quarantine\UpdateQuarantineRequest;
use spkm\FortiNac\Requests\Settings\RogueDhcpDetection\GetRogueDhcpDetectionRequest;
use spkm\FortiNac\Requests\Settings\RogueDhcpDetection\GetRogueDhcpDetectionVlansRequest;
use spkm\FortiNac\Requests\Settings\RogueDhcpDetection\PostRogueDhcpDetectionVlanDeleteRequest;
use spkm\FortiNac\Requests\Settings\RogueDhcpDetection\PostRogueDhcpDetectionVlanRequest;
use spkm\FortiNac\Requests\Settings\RogueDhcpDetection\UpdateRogueDhcpDetectionRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\CreateSecurityEventParserRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\DeleteManySecurityEventParsersRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\DeleteSecurityEventParserRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\DeleteSecurityEventParserViaPostRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\DisableManySecurityEventParsersRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\EnableManySecurityEventParsersRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\GetSecurityEventParserRecentSyslogRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\GetSecurityEventParserRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\GetSecurityEventParsersRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\GetSecurityEventParserUsageRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\ParseSecurityEventParserMessageRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\TestSecurityEventParserRequest;
use spkm\FortiNac\Requests\Settings\SecurityEventParser\UpdateSecurityEventParserRequest;
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
use spkm\FortiNac\Requests\Settings\SnmpSettings\GetSnmpSettingsAuthPsswordRequest;
use spkm\FortiNac\Requests\Settings\SnmpSettings\GetSnmpSettingsPrivPsswordRequest;
use spkm\FortiNac\Requests\Settings\SnmpSettings\GetSnmpSettingsRequest;
use spkm\FortiNac\Requests\Settings\SnmpSettings\UpdateSnmpSettingsRequest;
use spkm\FortiNac\Requests\Settings\StatusNotifications\GetStatusNotificationsRequest;
use spkm\FortiNac\Requests\Settings\StatusNotifications\UpdateStatusNotificationsRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\CreateSyslogServerRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\DeleteManySyslogServersRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\DeleteSyslogServerRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\DeleteSyslogServerViaPostRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\DisableSyslogServerRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\EnableSyslogServerRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\GetSyslogServerRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\GetSyslogServersRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\GetSyslogServerUsageRequest;
use spkm\FortiNac\Requests\Settings\SyslogServer\UpdateSyslogServerRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\CreateTlsServiceConfigurationRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\DeleteManyTlsServiceConfigurationsRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\DeleteTlsServiceConfigurationRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\DeleteTlsServiceConfigurationViaPostRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\DeployTlsServiceConfigurationRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\GetTlsServiceConfigurationAliasesRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\GetTlsServiceConfigurationRadiusciphersRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\GetTlsServiceConfigurationRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\GetTlsServiceConfigurationsRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\GetTlsServiceConfigurationUsageRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\UpdateTlsServiceConfigurationRequest;
use spkm\FortiNac\Requests\Settings\TrapMib\AddTrapMibRequest;
use spkm\FortiNac\Requests\Settings\TrapMib\DeleteManyTrapMibsRequest;
use spkm\FortiNac\Requests\Settings\TrapMib\DeleteTrapMibRequest;
use spkm\FortiNac\Requests\Settings\TrapMib\DeleteTrapMibTrapOidRequest;
use spkm\FortiNac\Requests\Settings\TrapMib\GetTrapMibsRequest;
use spkm\FortiNac\Requests\Settings\TrapMib\PostTrapMibMibNameRequest;
use spkm\FortiNac\Requests\Settings\TrapMib\UpdateTrapMibRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\CountAllVendorOuisRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\CountVendorOuisRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\CreateVendorOuiRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\DeleteManyVendorOuisRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\DeleteVendorOuiRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\DeleteVendorOuiViaPostRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\GetVendorOuiCountByIdRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\GetVendorOuisRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\GetVendorOuiSupportingInfoRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\UpdateVendorOuiRequest;
use spkm\FortiNac\Requests\Settings\VulnerabilityScanner\CreateVulnerabilityScannerRequest;
use spkm\FortiNac\Requests\Settings\VulnerabilityScanner\DeleteManyVulnerabilityScannersRequest;
use spkm\FortiNac\Requests\Settings\VulnerabilityScanner\DeleteVulnerabilityScannerRequest;
use spkm\FortiNac\Requests\Settings\VulnerabilityScanner\DeleteVulnerabilityScannerViaPostRequest;
use spkm\FortiNac\Requests\Settings\VulnerabilityScanner\GetVulnerabilityScannerQualysAppliancesRequest;
use spkm\FortiNac\Requests\Settings\VulnerabilityScanner\GetVulnerabilityScannerRequest;
use spkm\FortiNac\Requests\Settings\VulnerabilityScanner\GetVulnerabilityScannerScansRequest;
use spkm\FortiNac\Requests\Settings\VulnerabilityScanner\GetVulnerabilityScannersRequest;
use spkm\FortiNac\Requests\Settings\VulnerabilityScanner\GetVulnerabilityScannerUsageRequest;
use spkm\FortiNac\Requests\Settings\VulnerabilityScanner\PollVulnerabilityScannerRequest;
use spkm\FortiNac\Requests\Settings\VulnerabilityScanner\TestVulnerabilityScannerRequest;
use spkm\FortiNac\Requests\Settings\VulnerabilityScanner\UpdateVulnerabilityScannerRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\CreateWebServiceDefinitionRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\DeleteManyWebServiceDefinitionsRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\DeleteWebServiceDefinitionRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\DeleteWebServiceDefinitionViaPostRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\DeployWebServiceDefinitionRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\GetWebServiceDefinitionRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\GetWebServiceDefinitionsRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\GetWebServiceDefinitionUsageRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\UpdateWebServiceDefinitionRequest;
use spkm\FortiNac\Requests\Ssid\Ssid\GetSsidConfigRequest;
use spkm\FortiNac\Requests\Ssid\Ssid\GetSsidsRequest;
use spkm\FortiNac\Requests\Ssid\Ssid\PutSsidConfigRequest;
use spkm\FortiNac\Requests\System\AnalyticsProperties\GetAnalyticsPropertiesRequest;
use spkm\FortiNac\Requests\System\AnalyticsProperties\UpdateAnalyticsPropertiesRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\CreateBackgroundTaskRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\DeleteManyBackgroundTasksRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\GetBackgroundTaskCurrentUserRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\GetBackgroundTaskRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\GetBackgroundTasksRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\PostBackgroundTaskCompleteRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\UpdateBackgroundTaskRequest;
use spkm\FortiNac\Requests\System\BackupConfiguration\GetBackupConfigurationFtpRequest;
use spkm\FortiNac\Requests\System\BackupConfiguration\GetBackupConfigurationSftpRequest;
use spkm\FortiNac\Requests\System\BackupConfiguration\GetBackupConfigurationSshRequest;
use spkm\FortiNac\Requests\System\BackupConfiguration\PostBackupConfigurationFtpRequest;
use spkm\FortiNac\Requests\System\BackupConfiguration\PostBackupConfigurationSftpRequest;
use spkm\FortiNac\Requests\System\BackupConfiguration\PostBackupConfigurationSshRequest;
use spkm\FortiNac\Requests\System\BackupSettings\GetBackupSettingsArchivesRequest;
use spkm\FortiNac\Requests\System\BackupSettings\GetBackupSettingsDatabaseArchiveRequest;
use spkm\FortiNac\Requests\System\BackupSettings\GetBackupSettingsDatabaseRequest;
use spkm\FortiNac\Requests\System\BackupSettings\GetBackupSettingsSystemBackupRequest;
use spkm\FortiNac\Requests\System\BackupSettings\PostBackupSettingsArchivesRequest;
use spkm\FortiNac\Requests\System\BackupSettings\PostBackupSettingsDatabaseRequest;
use spkm\FortiNac\Requests\System\BackupSettings\PostBackupSettingsDatabaseRestoreArchivesRequest;
use spkm\FortiNac\Requests\System\BackupSettings\PostBackupSettingsSystemBackupRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugDatabaseRelationsRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugDatabaseTablesDataRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugDatabaseTablesRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugElementsAttributesRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugElementsRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugGrabLogSnapshotDownloadRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugGrabLogSnapshotStatusRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugGuiExperimentsRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugLoggerNamesRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugLogRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugPluginNamesRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugPluginPerformanceRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugPluginResourcesReloadersRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugPluginStatusRequest;
use spkm\FortiNac\Requests\System\Debug\PostDebugElementsAttributesDeleteRequest;
use spkm\FortiNac\Requests\System\Debug\PostDebugGrabLogSnapshotStartRequest;
use spkm\FortiNac\Requests\System\Debug\PostDebugGuiSnapshotRequest;
use spkm\FortiNac\Requests\System\Debug\PostDebugPluginRequest;
use spkm\FortiNac\Requests\System\Debug\PostDebugPluginResourcesReloadRequest;
use spkm\FortiNac\Requests\System\Group\AddGroupMembersRequest;
use spkm\FortiNac\Requests\System\Group\AddGroupToParentsRequest;
use spkm\FortiNac\Requests\System\Group\CopyGroupRequest;
use spkm\FortiNac\Requests\System\Group\CountAllGroupsRequest;
use spkm\FortiNac\Requests\System\Group\CountGroupsRequest;
use spkm\FortiNac\Requests\System\Group\DeleteGroupRequest;
use spkm\FortiNac\Requests\System\Group\DeleteGroupViaPostRequest;
use spkm\FortiNac\Requests\System\Group\DeleteManyGroupsRequest;
use spkm\FortiNac\Requests\System\Group\GetGroupDescendantsRequest;
use spkm\FortiNac\Requests\System\Group\GetGroupMemberIdsRequest;
use spkm\FortiNac\Requests\System\Group\GetGroupMembersRequest;
use spkm\FortiNac\Requests\System\Group\GetGroupRequest;
use spkm\FortiNac\Requests\System\Group\GetGroupsRequest;
use spkm\FortiNac\Requests\System\Group\GetGroupUsageRequest;
use spkm\FortiNac\Requests\System\Group\PostGroupAgingRequest;
use spkm\FortiNac\Requests\System\Group\PostGroupByIdRequest;
use spkm\FortiNac\Requests\System\Group\PostGroupManagesRequest;
use spkm\FortiNac\Requests\System\Group\PostGroupMembershipRequest;
use spkm\FortiNac\Requests\System\Group\RemoveGroupFromParentRequest;
use spkm\FortiNac\Requests\System\Group\RemoveGroupMembersRequest;
use spkm\FortiNac\Requests\System\Group\UpdateGroupRequest;
use spkm\FortiNac\Requests\System\HighAvailability\GetHighAvailabilityPasswordByPwkeyRequest;
use spkm\FortiNac\Requests\System\HighAvailability\GetHighAvailabilityRequest;
use spkm\FortiNac\Requests\System\HighAvailability\UpdateHighAvailabilityRequest;
use spkm\FortiNac\Requests\System\LicenseManagement\GetLicenseManagementRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesClusterRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesConfigStatusRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesGlobaloptionByParamRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesHardwarePerformanceRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesHardwareRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesLicenseConcurrentRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesLicenseRequest;
use spkm\FortiNac\Requests\System\LocalProperties\GetLocalPropertiesSoftwareDetailsRequest;
use spkm\FortiNac\Requests\System\LocalProperties\PostLocalPropertiesClusterApplicationPrimaryRestartRequest;
use spkm\FortiNac\Requests\System\LocalProperties\PostLocalPropertiesClusterControlPrimaryRestartRequest;
use spkm\FortiNac\Requests\System\LocalProperties\PostLocalPropertiesHardwareThresholdsRequest;
use spkm\FortiNac\Requests\System\LocalProperties\PostLocalPropertiesLicenseApplyRequest;
use spkm\FortiNac\Requests\System\LocalProperties\PostLocalPropertiesPasswordsChangeRequest;
use spkm\FortiNac\Requests\System\LocalProperties\PostLocalPropertiesSystemInitializeRequest;
use spkm\FortiNac\Requests\System\ManagedServer\CreateManagedServerRequest;
use spkm\FortiNac\Requests\System\ManagedServer\DeleteManyManagedServersRequest;
use spkm\FortiNac\Requests\System\ManagedServer\GetManagedServerHardwareRequest;
use spkm\FortiNac\Requests\System\ManagedServer\GetManagedServerLicenseRequest;
use spkm\FortiNac\Requests\System\ManagedServer\GetManagedServerPropertiesRequest;
use spkm\FortiNac\Requests\System\ManagedServer\GetManagedServerScansRequest;
use spkm\FortiNac\Requests\System\ManagedServer\GetManagedServerSummaryRequest;
use spkm\FortiNac\Requests\System\ManagedServer\PingManagedServerRequest;
use spkm\FortiNac\Requests\System\ManagedServer\PostManagedServerPropertiesRequest;
use spkm\FortiNac\Requests\System\ManagedServer\SyncManagedServerRequest;
use spkm\FortiNac\Requests\System\NtpSettings\GetNtpSettingsRequest;
use spkm\FortiNac\Requests\System\NtpSettings\GetNtpSettingsServersRequest;
use spkm\FortiNac\Requests\System\NtpSettings\UpdateNtpSettingsRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\CountAllScheduledTasksRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\CountScheduledTasksRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\DeleteManyScheduledTasksRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\DeleteScheduledTaskRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\DeleteScheduledTaskViaPostRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\DisableScheduledTaskRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\EnableScheduledTaskRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\GetScheduledTaskActivityTypesRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\GetScheduledTaskRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\GetScheduledTaskRunningRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\GetScheduledTasksRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\RunScheduledTaskRequest;
use spkm\FortiNac\Requests\System\ServiceConnector\GetServiceConnectorsRequest;
use spkm\FortiNac\Requests\System\Task\CountAllTasksRequest;
use spkm\FortiNac\Requests\System\Task\CountTasksRequest;
use spkm\FortiNac\Requests\System\Task\CreateTaskRequest;
use spkm\FortiNac\Requests\System\Task\DeleteManyTasksRequest;
use spkm\FortiNac\Requests\System\Task\DeleteTaskRequest;
use spkm\FortiNac\Requests\System\Task\DeleteTaskViaPostRequest;
use spkm\FortiNac\Requests\System\Task\GetTaskRequest;
use spkm\FortiNac\Requests\System\Task\GetTasksRequest;
use spkm\FortiNac\Requests\System\Task\GetTaskUsageRequest;
use spkm\FortiNac\Requests\System\Task\UpdateTaskRequest;
use spkm\FortiNac\Requests\System\Update\TestUpdateRequest;
use spkm\FortiNac\Requests\User\AdminProfile\CreateAdminProfileRequest;
use spkm\FortiNac\Requests\User\AdminProfile\DeleteAdminProfileMappingByIdRequest;
use spkm\FortiNac\Requests\User\AdminProfile\DeleteAdminProfileRequest;
use spkm\FortiNac\Requests\User\AdminProfile\DeleteAdminProfileViaPostRequest;
use spkm\FortiNac\Requests\User\AdminProfile\DeleteManyAdminProfilesRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfileMappingByIdRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfileMappingRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfileMappingSupportingInfoRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfileNewRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfilePermissionViewMapRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfileRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfilesRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfileUsageRequest;
use spkm\FortiNac\Requests\User\AdminProfile\PostAdminProfileMappingByIdRequest;
use spkm\FortiNac\Requests\User\AdminProfile\PostAdminProfileMappingDeleteRequest;
use spkm\FortiNac\Requests\User\AdminProfile\PostAdminProfileMappingRankSetRequest;
use spkm\FortiNac\Requests\User\AdminProfile\PostAdminProfileMappingRankSwapRequest;
use spkm\FortiNac\Requests\User\AdminProfile\PostAdminProfileMappingRequest;
use spkm\FortiNac\Requests\User\AdminProfile\UpdateAdminProfileRequest;
use spkm\FortiNac\Requests\User\CurrentSession\AcceptCurrentSessionUsagePolicyRequest;
use spkm\FortiNac\Requests\User\CurrentSession\DeleteCurrentSessionBookmarkByIdRequest;
use spkm\FortiNac\Requests\User\CurrentSession\GetCurrentSessionBookmarkRequest;
use spkm\FortiNac\Requests\User\CurrentSession\GetCurrentSessionCacheRequest;
use spkm\FortiNac\Requests\User\CurrentSession\GetCurrentSessionFeatureVisibilityRequest;
use spkm\FortiNac\Requests\User\CurrentSession\GetCurrentSessionNavigationSettingsRequest;
use spkm\FortiNac\Requests\User\CurrentSession\GetCurrentSessionSecurityKeyRequest;
use spkm\FortiNac\Requests\User\CurrentSession\GetCurrentSessionTimeoutRequest;
use spkm\FortiNac\Requests\User\CurrentSession\InitializeCurrentSessionRootUserRequest;
use spkm\FortiNac\Requests\User\CurrentSession\LoginCurrentSessionRequest;
use spkm\FortiNac\Requests\User\CurrentSession\LogoutCurrentSessionRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionBookmarkByIdRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionBookmarkDelete2Request;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionBookmarkDeleteRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionBookmarkRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionBookmarkSyncRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionBookmarkUuidDeleteRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionCacheRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionFeatureVisibilityRequest;
use spkm\FortiNac\Requests\User\Dashboard\CreateDashboardRequest;
use spkm\FortiNac\Requests\User\Dashboard\DeleteDashboardRequest;
use spkm\FortiNac\Requests\User\Dashboard\DeleteDashboardViaPostRequest;
use spkm\FortiNac\Requests\User\Dashboard\DeleteManyDashboardsRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardAgentSummaryRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardDeviceSummaryPortOfflineRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardDeviceSummaryPortOnlineRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardDeviceSummaryRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardHostSummaryRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardScanSummaryPerDayRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardScanSummaryPerHourRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardsRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardUsageRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardUserSummaryRequest;
use spkm\FortiNac\Requests\User\Dashboard\PostDashboardDeviceSummaryDeviceByStatusRequest;
use spkm\FortiNac\Requests\User\Dashboard\ResetDashboardToDefaultRequest;
use spkm\FortiNac\Requests\User\Dashboard\SetDashboardRankRequest;
use spkm\FortiNac\Requests\User\Dashboard\UpdateDashboardRequest;
use spkm\FortiNac\Requests\User\Guest\CountAllGuestsRequest;
use spkm\FortiNac\Requests\User\Guest\CountGuestsRequest;
use spkm\FortiNac\Requests\User\Guest\CreateGuestRequest;
use spkm\FortiNac\Requests\User\Guest\DeleteGuestRequest;
use spkm\FortiNac\Requests\User\Guest\DeleteGuestViaPostRequest;
use spkm\FortiNac\Requests\User\Guest\DeleteManyGuestsRequest;
use spkm\FortiNac\Requests\User\Guest\DisableGuestRequest;
use spkm\FortiNac\Requests\User\Guest\EnableGuestRequest;
use spkm\FortiNac\Requests\User\Guest\GenerateGuestPasswordFromTemplateRequest;
use spkm\FortiNac\Requests\User\Guest\GenerateGuestPasswordRequest;
use spkm\FortiNac\Requests\User\Guest\GetGuestConferenceRegistrationsCountRequest;
use spkm\FortiNac\Requests\User\Guest\GetGuestGetPasswordRequest;
use spkm\FortiNac\Requests\User\Guest\GetGuestPasswordRequest;
use spkm\FortiNac\Requests\User\Guest\GetGuestRequest;
use spkm\FortiNac\Requests\User\Guest\GetGuestsRequest;
use spkm\FortiNac\Requests\User\Guest\PostGuestBulkRequest;
use spkm\FortiNac\Requests\User\Guest\PostGuestConferenceRequest;
use spkm\FortiNac\Requests\User\Guest\ResetGuestPasswordRequest;
use spkm\FortiNac\Requests\User\Guest\SendGuestEmailRequest;
use spkm\FortiNac\Requests\User\Guest\SendGuestSmsRequest;
use spkm\FortiNac\Requests\User\Guest\UpdateGuestRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\CountAllGuestTemplatesRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\CountGuestTemplatesRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\CreateGuestTemplateRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\DeleteGuestTemplateRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\DeleteGuestTemplateViaPostRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\DeleteManyGuestTemplatesRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\GetGuestTemplateRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\GetGuestTemplateResolveIpRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\GetGuestTemplatesRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\GetGuestTemplateUsageRequest;
use spkm\FortiNac\Requests\User\GuestTemplate\UpdateGuestTemplateRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\ApproveSelfRegistrationRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\CountAllSelfRegistrationsRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\CountSelfRegistrationsRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\GetSelfRegistrationDenyRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\GetSelfRegistrationDetailsRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\GetSelfRegistrationRequest;
use spkm\FortiNac\Requests\User\SelfRegistration\GetSelfRegistrationsRequest;
use spkm\FortiNac\Requests\User\User\CountAllUsersRequest;
use spkm\FortiNac\Requests\User\User\CountUsersRequest;
use spkm\FortiNac\Requests\User\User\CreateUserRequest;
use spkm\FortiNac\Requests\User\User\DeleteManyUsersRequest;
use spkm\FortiNac\Requests\User\User\DeleteUserRequest;
use spkm\FortiNac\Requests\User\User\DeleteUserViaPostRequest;
use spkm\FortiNac\Requests\User\User\DisableManyUsersRequest;
use spkm\FortiNac\Requests\User\User\DisableUserRequest;
use spkm\FortiNac\Requests\User\User\EnableManyUsersRequest;
use spkm\FortiNac\Requests\User\User\EnableUserRequest;
use spkm\FortiNac\Requests\User\User\GetUserAllowHostsRequest;
use spkm\FortiNac\Requests\User\User\GetUserGetAgentRequest;
use spkm\FortiNac\Requests\User\User\GetUserGetPolicyRequest;
use spkm\FortiNac\Requests\User\User\GetUserHasHostsRequest;
use spkm\FortiNac\Requests\User\User\GetUserIdByIdRequest;
use spkm\FortiNac\Requests\User\User\GetUserSearchUserByUserIDRequest;
use spkm\FortiNac\Requests\User\User\GetUsersRequest;
use spkm\FortiNac\Requests\User\User\GetUserUsageRequest;
use spkm\FortiNac\Requests\User\User\PostUserAllowHostsRequest;
use spkm\FortiNac\Requests\User\User\SetUserPasswordRequest;
use spkm\FortiNac\Requests\User\User\SetUserProfileRequest;
use spkm\FortiNac\Requests\User\User\SetUserRoleRequest;
use spkm\FortiNac\Requests\User\User\UpdateUserRequest;
use spkm\FortiNac\Requests\User\UserAttribute\GetUserAttributeRequest;
use spkm\FortiNac\Requests\User\UserAttribute\GetUserAttributeUserByNameRequest;
use spkm\FortiNac\Requests\User\UserAttribute\PostUserAttributeUserByNameRequest;
use spkm\FortiNac\Requests\User\UserAttribute\UpdateUserAttributeRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\CreateWinbindConfigRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\DeleteManyWinbindConfigsRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\DeleteWinbindConfigRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\DisableManyWinbindConfigsRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\EnableManyWinbindConfigsRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\GetWinbindConfigAllRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\GetWinbindConfigGlobalRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\GetWinbindConfigRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\GetWinbindConfigsRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\GetWinbindConfigStatusRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\JoinWinbindConfigDomainByIdRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\PostWinbindConfigLogRequest;
use spkm\FortiNac\Requests\Winbind\WinbindConfig\UpdateWinbindConfigRequest;

/*
 * Every request the package has, with the arguments to build it, the method and path it resolves, the shape of
 * its response, its model, whether it carries a body and whether it pages: [class, args, method, path, shape, dto,
 * hasBody, paginatable].
 */

return [
    'Adapter\\Adapter\\DeleteAdapterRequest' => [DeleteAdapterRequest::class, [7], 'DELETE', '/adapter/7', 'none', null, false, false],
    'Adapter\\Adapter\\GetAdaptersRequest' => [GetAdaptersRequest::class, [], 'GET', '/adapter', 'list', Adapter::class, false, true],
    'Adapter\\Adapter\\CountAdaptersRequest' => [CountAdaptersRequest::class, [], 'GET', '/adapter/count', 'scalar', null, false, false],
    'Adapter\\Adapter\\CountAllAdaptersRequest' => [CountAllAdaptersRequest::class, [], 'GET', '/adapter/count/all', 'scalar', null, false, false],
    'Adapter\\Adapter\\GetAdapterRequest' => [GetAdapterRequest::class, [7], 'GET', '/adapter/7', 'one', Adapter::class, false, false],
    'Adapter\\Adapter\\GetAdapterUsageRequest' => [GetAdapterUsageRequest::class, [7], 'GET', '/adapter/7/usage', 'list', null, false, false],
    'Adapter\\Adapter\\GetAdapterConnectedToPortsRequest' => [GetAdapterConnectedToPortsRequest::class, [], 'GET', '/adapter/connected-to-ports', 'list', Adapter::class, false, true],
    'Adapter\\Adapter\\GetAdapterForHostRequest' => [GetAdapterForHostRequest::class, [], 'GET', '/adapter/for-host', 'list', Adapter::class, false, true],
    'Adapter\\Adapter\\GetAdapterGetPortRequest' => [GetAdapterGetPortRequest::class, [7], 'GET', '/adapter/7/get-port', 'raw', null, false, false],
    'Adapter\\Adapter\\CreateAdapterRequest' => [CreateAdapterRequest::class, [['name' => 'x']], 'POST', '/adapter', 'one', Adapter::class, true, false],
    'Adapter\\Adapter\\DeleteManyAdaptersRequest' => [DeleteManyAdaptersRequest::class, [], 'POST', '/adapter/delete', 'one', null, false, false],
    'Adapter\\Adapter\\UpdateAdapterRequest' => [UpdateAdapterRequest::class, [7, ['name' => 'x']], 'POST', '/adapter/7', 'one', Adapter::class, true, false],
    'Adapter\\Adapter\\DeleteAdapterViaPostRequest' => [DeleteAdapterViaPostRequest::class, [7], 'POST', '/adapter/7/delete', 'one', null, false, false],
    'Adapter\\Adapter\\ReprofileAdapterRoguesRequest' => [ReprofileAdapterRoguesRequest::class, [], 'POST', '/adapter/reprofile-rogues', 'one', null, false, false],
    'Adapter\\Adapter\\EnableAdapterRequest' => [EnableAdapterRequest::class, [7], 'POST', '/adapter/7/enable', 'one', null, false, false],
    'Adapter\\Adapter\\DisableAdapterRequest' => [DisableAdapterRequest::class, [7], 'POST', '/adapter/7/disable', 'one', null, false, false],
    'Adapter\\Adapter\\RunAdapterNmapScanRequest' => [RunAdapterNmapScanRequest::class, [], 'POST', '/adapter/run-nmap-scan', 'one', null, false, false],
    'Device\\Container\\DeleteContainerRequest' => [DeleteContainerRequest::class, [7], 'DELETE', '/device/container/7', 'none', null, false, false],
    'Device\\Container\\GetContainersRequest' => [GetContainersRequest::class, [], 'GET', '/device/container', 'list', Container::class, false, true],
    'Device\\Container\\CountContainersRequest' => [CountContainersRequest::class, [], 'GET', '/device/container/count', 'scalar', null, false, false],
    'Device\\Container\\CountAllContainersRequest' => [CountAllContainersRequest::class, [], 'GET', '/device/container/count/all', 'scalar', null, false, false],
    'Device\\Container\\GetContainerRequest' => [GetContainerRequest::class, [7], 'GET', '/device/container/7', 'one', Container::class, false, false],
    'Device\\Container\\GetContainerUsageRequest' => [GetContainerUsageRequest::class, [7], 'GET', '/device/container/7/usage', 'list', null, false, false],
    'Device\\Container\\GetContainerMonitorRequest' => [GetContainerMonitorRequest::class, [7], 'GET', '/device/container/monitor/7', 'one', null, false, false],
    'Device\\Container\\CreateContainerRequest' => [CreateContainerRequest::class, [['name' => 'x']], 'POST', '/device/container', 'one', Container::class, true, false],
    'Device\\Container\\DeleteManyContainersRequest' => [DeleteManyContainersRequest::class, [], 'POST', '/device/container/delete', 'one', null, false, false],
    'Device\\Container\\DeleteContainerViaPostRequest' => [DeleteContainerViaPostRequest::class, [7], 'POST', '/device/container/7/delete', 'one', null, false, false],
    'Device\\Container\\StartContainerMonitorRequest' => [StartContainerMonitorRequest::class, [['name' => 'x']], 'POST', '/device/container/monitor/start', 'list', ContainerStartContainerMonitor::class, true, false],
    'Device\\Container\\StopContainerMonitorRequest' => [StopContainerMonitorRequest::class, [7], 'POST', '/device/container/monitor/7/stop', 'one', null, false, false],
    'Device\\Discovery\\GetDiscoveryDiscoverStatusAllRequest' => [GetDiscoveryDiscoverStatusAllRequest::class, [], 'GET', '/device/discovery/discover/status/all', 'raw', null, false, false],
    'Device\\Discovery\\GetDiscoveryDiscoverStatusRequest' => [GetDiscoveryDiscoverStatusRequest::class, [], 'GET', '/device/discovery/discover/status', 'one', DiscoveryDiscoverStatus::class, false, false],
    'Device\\Discovery\\DiscoverDiscoveryStopRequest' => [DiscoverDiscoveryStopRequest::class, [], 'POST', '/device/discovery/discover/stop', 'scalar', null, false, false],
    'Device\\Discovery\\DiscoverDiscoveryRequest' => [DiscoverDiscoveryRequest::class, [['name' => 'x']], 'POST', '/device/discovery/discover', 'one', DiscoveryDiscoverDiscovery::class, true, false],
    'Device\\L3Scan\\GetL3ScanStatusRequest' => [GetL3ScanStatusRequest::class, [], 'GET', '/device/l3scan/status', 'raw', null, false, false],
    'Device\\L3Scan\\StopL3ScanRequest' => [StopL3ScanRequest::class, [], 'POST', '/device/l3scan/stop', 'one', null, false, false],
    'Device\\L3Scan\\StartL3ScanRequest' => [StartL3ScanRequest::class, [], 'POST', '/device/l3scan/start', 'one', null, false, false],
    'Device\\PortChange\\GetPortChangesRequest' => [GetPortChangesRequest::class, [], 'GET', '/device/port-changes', 'list', PortChange::class, false, true],
    'Device\\PortChange\\CountPortChangesRequest' => [CountPortChangesRequest::class, [], 'GET', '/device/port-changes/count', 'scalar', null, false, false],
    'Device\\PortChange\\CountAllPortChangesRequest' => [CountAllPortChangesRequest::class, [], 'GET', '/device/port-changes/count/all', 'scalar', null, false, false],
    'Device\\PortChange\\GetPortChangeRequest' => [GetPortChangeRequest::class, [7], 'GET', '/device/port-changes/7', 'one', PortChange::class, false, false],
    'Device\\Port\\GetPortsRequest' => [GetPortsRequest::class, [], 'GET', '/device/port', 'list', Port::class, false, true],
    'Device\\Port\\GetPortByDeviceRequest' => [GetPortByDeviceRequest::class, [], 'GET', '/device/port/by-device', 'one', PortByDevice::class, false, false],
    'Device\\Port\\CountPortsRequest' => [CountPortsRequest::class, [], 'GET', '/device/port/count', 'scalar', null, false, false],
    'Device\\Port\\CountAllPortsRequest' => [CountAllPortsRequest::class, [], 'GET', '/device/port/count/all', 'scalar', null, false, false],
    'Device\\Port\\GetPortEnforcementRequest' => [GetPortEnforcementRequest::class, [], 'GET', '/device/port/enforcement', 'list', Port::class, false, true],
    'Device\\Port\\GetPortEnforcementCountRequest' => [GetPortEnforcementCountRequest::class, [], 'GET', '/device/port/enforcement/count', 'one', null, false, false],
    'Device\\Port\\GetPortFeaturePortManagementRequest' => [GetPortFeaturePortManagementRequest::class, [], 'GET', '/device/port/feature/port-management', 'one', null, false, false],
    'Device\\Port\\GetPortRequest' => [GetPortRequest::class, [7], 'GET', '/device/port/7', 'one', Port::class, false, false],
    'Device\\Port\\GetPortMonitorRequest' => [GetPortMonitorRequest::class, [7], 'GET', '/device/port/monitor/7', 'one', null, false, false],
    'Device\\Port\\StopPortMonitorRequest' => [StopPortMonitorRequest::class, [7], 'POST', '/device/port/monitor/7/stop', 'one', null, false, false],
    'Device\\Port\\StartPortMonitorRequest' => [StartPortMonitorRequest::class, [], 'POST', '/device/port/monitor/start', 'list', Port::class, false, false],
    'Device\\Port\\PostPortPropertiesRequest' => [PostPortPropertiesRequest::class, [['name' => 'x']], 'POST', '/device/port/properties', 'one', PortProperties::class, true, false],
    'Device\\NetworkDevice\\CountNetworkDevicesRequest' => [CountNetworkDevicesRequest::class, [], 'GET', '/device/count', 'scalar', null, false, false],
    'Device\\NetworkDevice\\GetNetworkDeviceRequest' => [GetNetworkDeviceRequest::class, [7], 'GET', '/device/7', 'one', NetworkDevice::class, false, false],
    'Device\\NetworkDevice\\GetNetworkDeviceMonitorRequest' => [GetNetworkDeviceMonitorRequest::class, [7], 'GET', '/device/monitor/7', 'one', null, false, false],
    'Device\\NetworkDevice\\CountAllNetworkDevicesRequest' => [CountAllNetworkDevicesRequest::class, [], 'GET', '/device/count/all', 'scalar', null, false, false],
    'Device\\NetworkDevice\\GetNetworkDevicesRequest' => [GetNetworkDevicesRequest::class, [], 'GET', '/device', 'list', NetworkDevice::class, false, true],
    'Device\\NetworkDevice\\GetNetworkDeviceUsageRequest' => [GetNetworkDeviceUsageRequest::class, [7], 'GET', '/device/7/usage', 'list', null, false, true],
    'Device\\NetworkDevice\\GetNetworkDevicePollingL3Request' => [GetNetworkDevicePollingL3Request::class, [], 'GET', '/device/polling/l3', 'raw', null, false, false],
    'Device\\NetworkDevice\\GetNetworkDeviceMoveRequest' => [GetNetworkDeviceMoveRequest::class, [], 'GET', '/device/move', 'raw', null, false, false],
    'Device\\NetworkDevice\\GetNetworkDevicePropertiesRequest' => [GetNetworkDevicePropertiesRequest::class, [], 'GET', '/device/properties', 'one', NetworkDeviceProperties::class, false, false],
    'Device\\NetworkDevice\\DeleteManyNetworkDevicesRequest' => [DeleteManyNetworkDevicesRequest::class, [], 'POST', '/device/delete', 'one', null, false, false],
    'Device\\NetworkDevice\\DeleteNetworkDeviceViaPostRequest' => [DeleteNetworkDeviceViaPostRequest::class, [7], 'POST', '/device/7/delete', 'one', null, false, false],
    'Device\\NetworkDevice\\StopNetworkDeviceMonitorRequest' => [StopNetworkDeviceMonitorRequest::class, [7], 'POST', '/device/monitor/7/stop', 'one', null, false, false],
    'Device\\NetworkDevice\\StartNetworkDeviceMonitorRequest' => [StartNetworkDeviceMonitorRequest::class, [], 'POST', '/device/monitor/start', 'list', NetworkDevice::class, false, false],
    'Device\\NetworkDevice\\PostNetworkDevicePingableByIdRequest' => [PostNetworkDevicePingableByIdRequest::class, [7, ['name' => 'x']], 'POST', '/device/pingable/7', 'one', NetworkDevicePingableById::class, true, false],
    'Device\\NetworkDevice\\PostNetworkDevicePingableRequest' => [PostNetworkDevicePingableRequest::class, [['name' => 'x']], 'POST', '/device/pingable', 'one', NetworkDevicePingableById::class, true, false],
    'Device\\NetworkDevice\\PostNetworkDevicePropertiesRequest' => [PostNetworkDevicePropertiesRequest::class, [], 'POST', '/device/properties', 'one', NetworkDeviceProperties::class, false, false],
    'Device\\NetworkDevice\\PostNetworkDeviceSnmpRequest' => [PostNetworkDeviceSnmpRequest::class, [['name' => 'x']], 'POST', '/device/snmp', 'one', NetworkDeviceSnmp::class, true, false],
    'Device\\NetworkDevice\\PostNetworkDeviceSnmpByIdRequest' => [PostNetworkDeviceSnmpByIdRequest::class, [7, ['name' => 'x']], 'POST', '/device/snmp/7', 'one', NetworkDeviceSnmpById::class, true, false],
    'Device\\NetworkDevice\\ResyncNetworkDeviceInterfacesRequest' => [ResyncNetworkDeviceInterfacesRequest::class, [], 'POST', '/device/resync-interfaces', 'one', null, false, false],
    'Device\\NetworkDevice\\DeleteNetworkDeviceRequest' => [DeleteNetworkDeviceRequest::class, [7], 'DELETE', '/device/7', 'none', null, false, false],
    'Host\\DeviceProfilingRule\\GetDeviceProfilingRuleRuleExportRequest' => [GetDeviceProfilingRuleRuleExportRequest::class, [], 'GET', '/DeviceProfiler/Rule/export', 'one', null, false, false],
    'Host\\DeviceProfilingRule\\DeleteDeviceProfilingRuleRequest' => [DeleteDeviceProfilingRuleRequest::class, [7], 'DELETE', '/host/device-profiling-rule/7', 'none', null, false, false],
    'Host\\DeviceProfilingRule\\CountDeviceProfilingRulesRequest' => [CountDeviceProfilingRulesRequest::class, [], 'GET', '/host/device-profiling-rule/count', 'scalar', null, false, false],
    'Host\\DeviceProfilingRule\\CountAllDeviceProfilingRulesRequest' => [CountAllDeviceProfilingRulesRequest::class, [], 'GET', '/host/device-profiling-rule/count/all', 'scalar', null, false, false],
    'Host\\DeviceProfilingRule\\GetDeviceProfilingRuleCreateFromAdapterRequest' => [GetDeviceProfilingRuleCreateFromAdapterRequest::class, [], 'GET', '/host/device-profiling-rule/create-from-adapter', 'one', DeviceProfilingRule::class, false, false],
    'Host\\DeviceProfilingRule\\GetDeviceProfilingRuleRequest' => [GetDeviceProfilingRuleRequest::class, [7], 'GET', '/host/device-profiling-rule/7', 'one', DeviceProfilingRule::class, false, false],
    'Host\\DeviceProfilingRule\\GetDeviceProfilingRuleQueueRequest' => [GetDeviceProfilingRuleQueueRequest::class, [], 'GET', '/host/device-profiling-rule/queue', 'scalar', null, false, false],
    'Host\\DeviceProfilingRule\\GetDeviceProfilingRulesRequest' => [GetDeviceProfilingRulesRequest::class, [], 'GET', '/host/device-profiling-rule', 'list', DeviceProfilingRule::class, false, true],
    'Host\\DeviceProfilingRule\\CreateDeviceProfilingRuleRequest' => [CreateDeviceProfilingRuleRequest::class, [['name' => 'x']], 'POST', '/host/device-profiling-rule', 'one', DeviceProfilingRule::class, true, false],
    'Host\\DeviceProfilingRule\\DeleteManyDeviceProfilingRulesRequest' => [DeleteManyDeviceProfilingRulesRequest::class, [], 'POST', '/host/device-profiling-rule/delete', 'one', null, false, false],
    'Host\\DeviceProfilingRule\\UpdateDeviceProfilingRuleRequest' => [UpdateDeviceProfilingRuleRequest::class, [7, ['name' => 'x']], 'POST', '/host/device-profiling-rule/7', 'one', DeviceProfilingRule::class, true, false],
    'Host\\DeviceProfilingRule\\DeleteDeviceProfilingRuleViaPostRequest' => [DeleteDeviceProfilingRuleViaPostRequest::class, [7], 'POST', '/host/device-profiling-rule/7/delete', 'one', null, false, false],
    'Host\\DeviceProfilingRule\\DisableDeviceProfilingRuleRequest' => [DisableDeviceProfilingRuleRequest::class, [7], 'POST', '/host/device-profiling-rule/7/disable', 'one', null, false, false],
    'Host\\DeviceProfilingRule\\EnableDeviceProfilingRuleRequest' => [EnableDeviceProfilingRuleRequest::class, [7], 'POST', '/host/device-profiling-rule/7/enable', 'one', null, false, false],
    'Host\\DeviceProfilingRule\\PostDeviceProfilingRuleUsageRequest' => [PostDeviceProfilingRuleUsageRequest::class, [7], 'POST', '/host/device-profiling-rule/7/usage', 'list', null, false, false],
    'Host\\DeviceProfilingRule\\ScanDeviceProfilingRuleRequest' => [ScanDeviceProfilingRuleRequest::class, [], 'POST', '/host/device-profiling-rule/scan', 'scalar', null, false, false],
    'Host\\DeviceProfilingRule\\SwapDeviceProfilingRuleRuleRanksRequest' => [SwapDeviceProfilingRuleRuleRanksRequest::class, [], 'POST', '/host/device-profiling-rule/swap-rule-ranks', 'one', null, false, false],
    'Host\\DeviceProfilingRule\\TestDeviceProfilingRuleRequest' => [TestDeviceProfilingRuleRequest::class, [], 'POST', '/host/device-profiling-rule/test', 'scalar', null, false, false],
    'Host\\Aging\\GetAgingRequest' => [GetAgingRequest::class, [], 'GET', '/host/aging', 'one', Aging::class, false, false],
    'Host\\Aging\\UpdateAgingRequest' => [UpdateAgingRequest::class, [], 'POST', '/host/aging', 'one', Aging::class, false, false],
    'Host\\Aging\\ClearAgingRegisteredRequest' => [ClearAgingRegisteredRequest::class, [], 'POST', '/host/aging/clear-registered', 'one', null, false, false],
    'Host\\Aging\\ClearAgingUnregisteredRequest' => [ClearAgingUnregisteredRequest::class, [], 'POST', '/host/aging/clear-unregistered', 'one', null, false, false],
    'Host\\Aging\\ClearAgingUsersRequest' => [ClearAgingUsersRequest::class, [], 'POST', '/host/aging/clear-users', 'one', null, false, false],
    'Host\\DeviceIdentitySource\\DeleteDeviceIdentitySourceRequest' => [DeleteDeviceIdentitySourceRequest::class, [7], 'DELETE', '/host/device-identity-source/7', 'none', null, false, false],
    'Host\\DeviceIdentitySource\\GetDeviceIdentitySourcesRequest' => [GetDeviceIdentitySourcesRequest::class, [], 'GET', '/host/device-identity-source', 'list', DeviceIdentitySource::class, false, true],
    'Host\\DeviceIdentitySource\\GetDeviceIdentitySourceRequest' => [GetDeviceIdentitySourceRequest::class, [7], 'GET', '/host/device-identity-source/7', 'one', DeviceIdentitySource::class, false, false],
    'Host\\DeviceIdentitySource\\CreateDeviceIdentitySourceRequest' => [CreateDeviceIdentitySourceRequest::class, [['name' => 'x']], 'POST', '/host/device-identity-source', 'one', DeviceIdentitySource::class, true, false],
    'Host\\DeviceIdentitySource\\DeleteManyDeviceIdentitySourcesRequest' => [DeleteManyDeviceIdentitySourcesRequest::class, [], 'POST', '/host/device-identity-source/delete', 'one', null, false, false],
    'Host\\DeviceIdentitySource\\UpdateDeviceIdentitySourceRequest' => [UpdateDeviceIdentitySourceRequest::class, [7, ['name' => 'x']], 'POST', '/host/device-identity-source/7', 'one', DeviceIdentitySource::class, true, false],
    'Host\\DeviceIdentitySource\\DeleteDeviceIdentitySourceViaPostRequest' => [DeleteDeviceIdentitySourceViaPostRequest::class, [7], 'POST', '/host/device-identity-source/7/delete', 'one', null, false, false],
    'Host\\DeviceIdentitySource\\DisableDeviceIdentitySourceRequest' => [DisableDeviceIdentitySourceRequest::class, [7], 'POST', '/host/device-identity-source/7/disable', 'one', null, false, false],
    'Host\\DeviceIdentitySource\\EnableDeviceIdentitySourceRequest' => [EnableDeviceIdentitySourceRequest::class, [7], 'POST', '/host/device-identity-source/7/enable', 'one', null, false, false],
    'Host\\DeviceIdentitySource\\SetDeviceIdentitySourceRankRequest' => [SetDeviceIdentitySourceRankRequest::class, [], 'POST', '/host/device-identity-source/rank/set', 'one', null, false, false],
    'Host\\DeviceIdentitySource\\SwapDeviceIdentitySourceRanksRequest' => [SwapDeviceIdentitySourceRanksRequest::class, [], 'POST', '/host/device-identity-source/rank/swap', 'one', null, false, false],
    'Host\\DeviceIdentity\\DeleteDeviceIdentityRequest' => [DeleteDeviceIdentityRequest::class, [7], 'DELETE', '/host/device-identity/7', 'none', null, false, false],
    'Host\\DeviceIdentity\\GetDeviceIdentitiesRequest' => [GetDeviceIdentitiesRequest::class, [], 'GET', '/host/device-identity', 'list', DeviceIdentity::class, false, true],
    'Host\\DeviceIdentity\\CountDeviceIdentitiesRequest' => [CountDeviceIdentitiesRequest::class, [], 'GET', '/host/device-identity/count', 'scalar', null, false, false],
    'Host\\DeviceIdentity\\CountAllDeviceIdentitiesRequest' => [CountAllDeviceIdentitiesRequest::class, [], 'GET', '/host/device-identity/count/all', 'scalar', null, false, false],
    'Host\\DeviceIdentity\\GetDeviceIdentityRequest' => [GetDeviceIdentityRequest::class, [7], 'GET', '/host/device-identity/7', 'one', DeviceIdentity::class, false, false],
    'Host\\DeviceIdentity\\GetDeviceIdentityUsageRequest' => [GetDeviceIdentityUsageRequest::class, [7], 'GET', '/host/device-identity/7/usage', 'list', null, false, false],
    'Host\\DeviceIdentity\\GetDeviceIdentityFingerprintsRequest' => [GetDeviceIdentityFingerprintsRequest::class, [], 'GET', '/host/device-identity/fingerprints', 'one', null, false, false],
    'Host\\DeviceIdentity\\GetDeviceIdentityFingerprintByIdRequest' => [GetDeviceIdentityFingerprintByIdRequest::class, [7], 'GET', '/host/device-identity/fingerprint/7', 'one', null, false, false],
    'Host\\DeviceIdentity\\CreateDeviceIdentityRequest' => [CreateDeviceIdentityRequest::class, [['name' => 'x']], 'POST', '/host/device-identity', 'one', DeviceIdentity::class, true, false],
    'Host\\DeviceIdentity\\DeleteManyDeviceIdentitiesRequest' => [DeleteManyDeviceIdentitiesRequest::class, [], 'POST', '/host/device-identity/delete', 'one', null, false, false],
    'Host\\DeviceIdentity\\UpdateDeviceIdentityRequest' => [UpdateDeviceIdentityRequest::class, [7, ['name' => 'x']], 'POST', '/host/device-identity/7', 'one', DeviceIdentity::class, true, false],
    'Host\\DeviceIdentity\\DeleteDeviceIdentityViaPostRequest' => [DeleteDeviceIdentityViaPostRequest::class, [7], 'POST', '/host/device-identity/7/delete', 'one', null, false, false],
    'Host\\DeviceIdentity\\ConfirmDeviceIdentityRuleRequest' => [ConfirmDeviceIdentityRuleRequest::class, [], 'POST', '/host/device-identity/confirm-rule', 'one', null, false, false],
    'Host\\Fingerprint\\GetFingerprintsRequest' => [GetFingerprintsRequest::class, [], 'GET', '/host/fingerprint', 'list', Fingerprint::class, false, true],
    'Host\\Fingerprint\\CountFingerprintsRequest' => [CountFingerprintsRequest::class, [], 'GET', '/host/fingerprint/count', 'scalar', null, false, false],
    'Host\\Fingerprint\\CountAllFingerprintsRequest' => [CountAllFingerprintsRequest::class, [], 'GET', '/host/fingerprint/count/all', 'scalar', null, false, false],
    'Host\\Fingerprint\\GetFingerprintRequest' => [GetFingerprintRequest::class, [7], 'GET', '/host/fingerprint/7', 'one', Fingerprint::class, false, false],
    'Host\\Fingerprint\\DeleteManyFingerprintsRequest' => [DeleteManyFingerprintsRequest::class, [], 'POST', '/host/fingerprint/delete', 'one', null, false, false],
    'Host\\Fingerprint\\DeleteFingerprintViaPostRequest' => [DeleteFingerprintViaPostRequest::class, [7], 'POST', '/host/fingerprint/7/delete', 'one', null, false, false],
    'Host\\Fingerprint\\UpdateFingerprintRequest' => [UpdateFingerprintRequest::class, [7, ['name' => 'x']], 'POST', '/host/fingerprint/7', 'one', Fingerprint::class, true, false],
    'Host\\Fingerprint\\CreateFingerprintRequest' => [CreateFingerprintRequest::class, [['name' => 'x']], 'POST', '/host/fingerprint', 'one', Fingerprint::class, true, false],
    'Host\\Fingerprint\\DeleteFingerprintRequest' => [DeleteFingerprintRequest::class, [7], 'DELETE', '/host/fingerprint/7', 'none', null, false, false],
    'Host\\RegistrationRequest\\GetRegistrationRequestsRequest' => [GetRegistrationRequestsRequest::class, [], 'GET', '/host/registration-request', 'list', RegistrationRequest::class, false, true],
    'Host\\RegistrationRequest\\GetRegistrationRequestRequest' => [GetRegistrationRequestRequest::class, [7], 'GET', '/host/registration-request/7', 'one', RegistrationRequest::class, false, false],
    'Host\\RegistrationRequest\\DenyRegistrationRequestRequest' => [DenyRegistrationRequestRequest::class, [['name' => 'x']], 'POST', '/host/registration-request/deny', 'one', null, true, false],
    'Host\\RegistrationRequest\\DeleteRegistrationRequestViaPostRequest' => [DeleteRegistrationRequestViaPostRequest::class, [7], 'POST', '/host/registration-request/7/delete', 'one', null, false, false],
    'Host\\RegistrationRequest\\DeleteManyRegistrationRequestsRequest' => [DeleteManyRegistrationRequestsRequest::class, [], 'POST', '/host/registration-request/delete', 'one', null, false, false],
    'Host\\RegistrationRequest\\ApproveRegistrationRequestRequest' => [ApproveRegistrationRequestRequest::class, [['name' => 'x']], 'POST', '/host/registration-request/approve', 'one', null, true, false],
    'Host\\RegistrationRequest\\DeleteRegistrationRequestRequest' => [DeleteRegistrationRequestRequest::class, [7], 'DELETE', '/host/registration-request/7', 'none', null, false, false],
    'Host\\ScannedApplication\\GetScannedApplicationsRequest' => [GetScannedApplicationsRequest::class, [], 'GET', '/host/scanned-application', 'list', ScannedApplication::class, false, true],
    'Host\\ScannedApplication\\GetScannedApplicationRequest' => [GetScannedApplicationRequest::class, [7], 'GET', '/host/scanned-application/7', 'one', ScannedApplication::class, false, false],
    'Host\\ScannedApplication\\GetScannedApplicationForHostRequest' => [GetScannedApplicationForHostRequest::class, [], 'GET', '/host/scanned-application/for-host', 'list', ScannedApplication::class, false, true],
    'Host\\ScannedApplication\\GetScannedApplicationUsageRequest' => [GetScannedApplicationUsageRequest::class, [7], 'GET', '/host/scanned-application/7/usage', 'list', null, false, true],
    'Host\\ScannedApplication\\DeleteManyScannedApplicationsRequest' => [DeleteManyScannedApplicationsRequest::class, [], 'POST', '/host/scanned-application/delete', 'one', null, false, false],
    'Host\\ScannedApplication\\PostScannedApplicationThreatRequest' => [PostScannedApplicationThreatRequest::class, [], 'POST', '/host/scanned-application/threat', 'one', null, false, false],
    'Host\\ScannedApplication\\DeleteScannedApplicationViaPostRequest' => [DeleteScannedApplicationViaPostRequest::class, [7], 'POST', '/host/scanned-application/7/delete', 'one', null, false, false],
    'Host\\ScannedApplication\\DeleteScannedApplicationRequest' => [DeleteScannedApplicationRequest::class, [7], 'DELETE', '/host/scanned-application/7', 'none', null, false, false],
    'Host\\ScanResult\\GetScanResultsRequest' => [GetScanResultsRequest::class, [], 'GET', '/host/scan', 'list', ScanResult::class, false, true],
    'Host\\ScanResult\\CreateScanResultRequest' => [CreateScanResultRequest::class, [], 'POST', '/host/scan', 'one', ScanResult::class, false, false],
    'Host\\ScanResult\\GetScanResultArchivesRequest' => [GetScanResultArchivesRequest::class, [], 'GET', '/host/scan/archives', 'raw', null, false, false],
    'Host\\ScanResult\\GetScanResultArchiveImportStatusRequest' => [GetScanResultArchiveImportStatusRequest::class, [], 'GET', '/host/scan/archive/import/status', 'scalar', null, false, false],
    'Host\\ScanResult\\CountScanResultsRequest' => [CountScanResultsRequest::class, [], 'GET', '/host/scan/count', 'scalar', null, false, false],
    'Host\\ScanResult\\CountAllScanResultsRequest' => [CountAllScanResultsRequest::class, [], 'GET', '/host/scan/count/all', 'scalar', null, false, false],
    'Host\\ScanResult\\GetScanResultRequest' => [GetScanResultRequest::class, [7], 'GET', '/host/scan/7', 'one', ScanResult::class, false, false],
    'Host\\ScanResult\\PostScanResultArchiveCreateRequest' => [PostScanResultArchiveCreateRequest::class, [], 'POST', '/host/scan/archive/create', 'one', null, false, false],
    'Host\\ScanResult\\PostScanResultArchiveImportRequest' => [PostScanResultArchiveImportRequest::class, [], 'POST', '/host/scan/archive/import', 'one', null, false, false],
    'Host\\Host\\GetHostByIpRequest' => [GetHostByIpRequest::class, ['sample'], 'GET', '/host/by-ip/sample', 'one', Host::class, false, false],
    'Host\\Host\\GetHostByMacRequest' => [GetHostByMacRequest::class, ['sample'], 'GET', '/host/by-mac/sample', 'one', Host::class, false, false],
    'Host\\Host\\CountAllHostsRequest' => [CountAllHostsRequest::class, [], 'GET', '/host/count/all', 'scalar', null, false, false],
    'Host\\Host\\GetHostDeviceTypesRequest' => [GetHostDeviceTypesRequest::class, [], 'GET', '/host/device-types', 'list', HostDeviceType::class, false, true],
    'Host\\Host\\GetHostConnectedToPortRequest' => [GetHostConnectedToPortRequest::class, [], 'GET', '/host/connected-to-port', 'raw', null, false, false],
    'Host\\Host\\GetHostRequest' => [GetHostRequest::class, [7], 'GET', '/host/7', 'one', Host::class, false, false],
    'Host\\Host\\GetHostUsageRequest' => [GetHostUsageRequest::class, [7], 'GET', '/host/7/usage', 'list', null, false, false],
    'Host\\Host\\CountHostsRequest' => [CountHostsRequest::class, [], 'GET', '/host/count', 'scalar', null, false, false],
    'Host\\Host\\GetHostForUserRequest' => [GetHostForUserRequest::class, [], 'GET', '/host/for-user', 'one', HostsForUser::class, false, false],
    'Host\\Host\\GetHostGlobalAllowedHostsRequest' => [GetHostGlobalAllowedHostsRequest::class, [], 'GET', '/host/global-allowed-hosts', 'raw', null, false, false],
    'Host\\Host\\GetHostClientFiltersCachedByNameRequest' => [GetHostClientFiltersCachedByNameRequest::class, ['sample'], 'GET', '/host/client-filters/cached/sample', 'one', HostClientFiltersCachedByName::class, false, false],
    'Host\\Host\\GetHostPolicyRequest' => [GetHostPolicyRequest::class, [7], 'GET', '/host/7/policy', 'one', null, false, false],
    'Host\\Host\\GetHostClientFiltersRequest' => [GetHostClientFiltersRequest::class, [], 'GET', '/host/client-filters', 'list', HostClientFiltersCachedByName::class, false, true],
    'Host\\Host\\DeleteManyHostsRequest' => [DeleteManyHostsRequest::class, [], 'POST', '/host/delete', 'one', null, false, false],
    'Host\\Host\\SetHostRoleRequest' => [SetHostRoleRequest::class, [], 'POST', '/host/set-role', 'one', null, false, false],
    'Host\\Host\\UpdateHostRequest' => [UpdateHostRequest::class, [7, ['name' => 'x']], 'POST', '/host/7', 'one', Host::class, true, false],
    'Host\\Host\\EnableHostRequest' => [EnableHostRequest::class, [7], 'POST', '/host/7/enable', 'one', null, false, false],
    'Host\\Host\\DisableHostRequest' => [DisableHostRequest::class, [7], 'POST', '/host/7/disable', 'one', null, false, false],
    'Host\\Host\\ImportHostHostsRequest' => [ImportHostHostsRequest::class, [], 'POST', '/host/import-hosts', 'one', null, false, false],
    'Host\\Host\\PostHostWithAdaptersByIdRequest' => [PostHostWithAdaptersByIdRequest::class, [7], 'POST', '/host/with-adapters/7', 'one', null, false, false],
    'Host\\Host\\SetHostHealthRequest' => [SetHostHealthRequest::class, [7], 'POST', '/host/7/set-health', 'one', null, false, false],
    'Host\\Host\\DeleteHostViaPostRequest' => [DeleteHostViaPostRequest::class, [7], 'POST', '/host/7/delete', 'one', null, false, false],
    'Host\\Host\\SetHostExpirationRequest' => [SetHostExpirationRequest::class, [], 'POST', '/host/set-expiration', 'one', null, false, false],
    'Host\\Host\\RescanHostWithProfileRequest' => [RescanHostWithProfileRequest::class, [7], 'POST', '/host/7/rescan-with-profile', 'one', null, false, false],
    'Host\\Host\\SendHostPersistentAgentMessageRequest' => [SendHostPersistentAgentMessageRequest::class, [], 'POST', '/host/send-persistent-agent-message', 'one', null, false, false],
    'Host\\Host\\UpdateHostPersistentAgentRequest' => [UpdateHostPersistentAgentRequest::class, [7], 'POST', '/host/7/update-persistent-agent', 'one', null, false, false],
    'Host\\Host\\DeleteHostRequest' => [DeleteHostRequest::class, [7], 'DELETE', '/host/7', 'none', null, false, false],
    'Host\\Host\\GetHostsRequest' => [GetHostsRequest::class, [], 'GET', '/host', 'list', Host::class, false, true],
    'Host\\Host\\GetHostHealthHistoryRequest' => [GetHostHealthHistoryRequest::class, [7], 'GET', '/host/7/health-history', 'one', HostHealthHistory::class, false, false],
    'Host\\Host\\GetHostMultifilterRequest' => [GetHostMultifilterRequest::class, [], 'GET', '/host/multifilter', 'list', HostMultifilter::class, false, true],
    'Host\\Host\\GetHostMultifilterUsersRequest' => [GetHostMultifilterUsersRequest::class, [], 'GET', '/host/multifilter/users', 'list', HostMultifilter::class, false, true],
    'Host\\Host\\GetHostNcmPodsRequest' => [GetHostNcmPodsRequest::class, [], 'GET', '/host/ncm-pods', 'list', HostNcmPod::class, false, true],
    'Host\\Host\\GetHostSearchRequest' => [GetHostSearchRequest::class, [], 'GET', '/host/search', 'raw', null, false, false],
    'Host\\Host\\CreateHostRequest' => [CreateHostRequest::class, [['name' => 'x']], 'POST', '/host', 'one', Host::class, true, false],
    'Host\\Host\\DisableHostByIpRequest' => [DisableHostByIpRequest::class, [], 'POST', '/host/disable-by-ip', 'one', null, false, false],
    'Host\\Host\\DisableHostByMacRequest' => [DisableHostByMacRequest::class, [], 'POST', '/host/disable-by-mac', 'one', null, false, false],
    'Host\\Host\\EnableHostByIpRequest' => [EnableHostByIpRequest::class, [], 'POST', '/host/enable-by-ip', 'one', null, false, false],
    'Host\\Host\\EnableHostByMacRequest' => [EnableHostByMacRequest::class, [], 'POST', '/host/enable-by-mac', 'one', null, false, false],
    'Host\\Host\\RegisterHostAsDeviceRequest' => [RegisterHostAsDeviceRequest::class, [], 'POST', '/host/register-as-device', 'one', null, false, false],
    'Host\\Host\\SetHostLoggedOnUserRequest' => [SetHostLoggedOnUserRequest::class, [], 'POST', '/host/set-logged-on-user', 'one', null, false, false],
    'Host\\Host\\PostHostWithAdaptersRequest' => [PostHostWithAdaptersRequest::class, [['name' => 'x']], 'POST', '/host/with-adapters', 'one', Host::class, true, false],
    'Dynamic\\FirewallSession\\GetFirewallSessionRequest' => [GetFirewallSessionRequest::class, [7], 'GET', '/dynamic/dynamic-connection/7', 'one', FirewallSession::class, false, false],
    'Dynamic\\FirewallSession\\GetFirewallSessionsRequest' => [GetFirewallSessionsRequest::class, [], 'GET', '/dynamic/dynamic-connection', 'list', FirewallSession::class, false, true],
    'Dynamic\\FirewallSession\\PostFirewallSessionPollingRunRequest' => [PostFirewallSessionPollingRunRequest::class, [7], 'POST', '/dynamic/dynamic-connection/polling/7/run', 'one', null, false, false],
    'Dynamic\\FirewallSession\\GetFirewallSessionPollingByIdRequest' => [GetFirewallSessionPollingByIdRequest::class, [7], 'GET', '/dynamic/dynamic-connection/polling/7', 'one', null, false, false],
    'Dynamic\\FirewallSession\\GetFirewallSessionHostByIdRequest' => [GetFirewallSessionHostByIdRequest::class, [7], 'GET', '/dynamic/dynamic-connection/host/7', 'raw', null, false, false],
    'Dynamic\\FirewallSession\\GetFirewallSessionUsageRequest' => [GetFirewallSessionUsageRequest::class, [7], 'GET', '/dynamic/dynamic-connection/7/usage', 'list', null, false, false],
    'Dynamic\\FirewallSession\\DeleteFirewallSessionViaPostRequest' => [DeleteFirewallSessionViaPostRequest::class, [7], 'POST', '/dynamic/dynamic-connection/7/delete', 'one', null, false, false],
    'Dynamic\\FirewallSession\\PostFirewallSessionPollingByIdRequest' => [PostFirewallSessionPollingByIdRequest::class, [7, ['name' => 'x']], 'POST', '/dynamic/dynamic-connection/polling/7', 'one', FirewallSessionPollingById::class, true, false],
    'Dynamic\\FirewallSession\\CreateFirewallSessionRequest' => [CreateFirewallSessionRequest::class, [['name' => 'x']], 'POST', '/dynamic/dynamic-connection', 'one', FirewallSession::class, true, false],
    'Dynamic\\FirewallSession\\UpdateFirewallSessionRequest' => [UpdateFirewallSessionRequest::class, [7, ['name' => 'x']], 'POST', '/dynamic/dynamic-connection/7', 'one', FirewallSession::class, true, false],
    'Dynamic\\FirewallSession\\DeleteManyFirewallSessionsRequest' => [DeleteManyFirewallSessionsRequest::class, [], 'POST', '/dynamic/dynamic-connection/delete', 'one', null, false, false],
    'Dynamic\\FirewallSession\\DeleteFirewallSessionRequest' => [DeleteFirewallSessionRequest::class, [7], 'DELETE', '/dynamic/dynamic-connection/7', 'none', null, false, false],
    'Logging\\Alarm\\GetAlarmsRequest' => [GetAlarmsRequest::class, [], 'GET', '/logging/alarm', 'list', Alarm::class, false, true],
    'Logging\\Alarm\\CountAlarmsRequest' => [CountAlarmsRequest::class, [], 'GET', '/logging/alarm/count', 'scalar', null, false, false],
    'Logging\\Alarm\\CountAllAlarmsRequest' => [CountAllAlarmsRequest::class, [], 'GET', '/logging/alarm/count/all', 'scalar', null, false, false],
    'Logging\\Alarm\\GetAlarmArchiveRequest' => [GetAlarmArchiveRequest::class, [], 'GET', '/logging/alarm/archive', 'raw', null, false, false],
    'Logging\\Alarm\\GetAlarmArchiveImportStatusRequest' => [GetAlarmArchiveImportStatusRequest::class, [], 'GET', '/logging/alarm/archive/import/status', 'scalar', null, false, false],
    'Logging\\Alarm\\GetAlarmRequest' => [GetAlarmRequest::class, [7], 'GET', '/logging/alarm/7', 'one', Alarm::class, false, false],
    'Logging\\Alarm\\GetAlarmUsageRequest' => [GetAlarmUsageRequest::class, [7], 'GET', '/logging/alarm/7/usage', 'list', null, false, true],
    'Logging\\Alarm\\GetAlarmMonitorRequest' => [GetAlarmMonitorRequest::class, [7], 'GET', '/logging/alarm/monitor/7', 'one', null, false, false],
    'Logging\\Alarm\\GetAlarmSupportingInfoRequest' => [GetAlarmSupportingInfoRequest::class, [], 'GET', '/logging/alarm/supporting-info', 'one', null, false, false],
    'Logging\\Alarm\\AcknowledgeAlarmRequest' => [AcknowledgeAlarmRequest::class, [], 'POST', '/logging/alarm/acknowledge', 'one', null, false, false],
    'Logging\\Alarm\\DeleteAlarmViaPostRequest' => [DeleteAlarmViaPostRequest::class, [7], 'POST', '/logging/alarm/7/delete', 'one', null, false, false],
    'Logging\\Alarm\\PostAlarmArchiveImportRequest' => [PostAlarmArchiveImportRequest::class, [], 'POST', '/logging/alarm/archive/import', 'one', null, false, false],
    'Logging\\Alarm\\DeleteManyAlarmsRequest' => [DeleteManyAlarmsRequest::class, [], 'POST', '/logging/alarm/delete', 'one', null, false, false],
    'Logging\\Alarm\\AcknowledgeAlarm2Request' => [AcknowledgeAlarm2Request::class, [7], 'POST', '/logging/alarm/7/acknowledge', 'one', null, false, false],
    'Logging\\Alarm\\StopAlarmMonitorRequest' => [StopAlarmMonitorRequest::class, [7], 'POST', '/logging/alarm/monitor/7/stop', 'one', null, false, false],
    'Logging\\Alarm\\StartAlarmMonitorRequest' => [StartAlarmMonitorRequest::class, [], 'POST', '/logging/alarm/monitor/start', 'list', AlarmStartAlarmMonitor::class, false, false],
    'Logging\\Alarm\\DeleteAlarmRequest' => [DeleteAlarmRequest::class, [7], 'DELETE', '/logging/alarm/7', 'none', null, false, false],
    'Logging\\AuditLogEntry\\GetAuditLogEntriesRequest' => [GetAuditLogEntriesRequest::class, [], 'GET', '/logging/audit', 'list', AuditLogEntry::class, false, true],
    'Logging\\AuditLogEntry\\CountAuditLogEntriesRequest' => [CountAuditLogEntriesRequest::class, [], 'GET', '/logging/audit/count', 'scalar', null, false, false],
    'Logging\\ConnectionLogEntry\\GetConnectionLogEntriesRequest' => [GetConnectionLogEntriesRequest::class, [], 'GET', '/logging/connection', 'list', ConnectionLogEntry::class, false, true],
    'Logging\\ConnectionLogEntry\\CountAllConnectionLogEntriesRequest' => [CountAllConnectionLogEntriesRequest::class, [], 'GET', '/logging/connection/count/all', 'scalar', null, false, false],
    'Logging\\ConnectionLogEntry\\GetConnectionLogEntryArchiveRequest' => [GetConnectionLogEntryArchiveRequest::class, [], 'GET', '/logging/connection/archive', 'raw', null, false, false],
    'Logging\\ConnectionLogEntry\\GetConnectionLogEntryArchiveImportStatusRequest' => [GetConnectionLogEntryArchiveImportStatusRequest::class, [], 'GET', '/logging/connection/archive/import/status', 'scalar', null, false, false],
    'Logging\\ConnectionLogEntry\\GetConnectionLogEntryBySessionRequest' => [GetConnectionLogEntryBySessionRequest::class, [], 'GET', '/logging/connection/by-session', 'list', ConnectionLogEntry::class, false, true],
    'Logging\\ConnectionLogEntry\\CountConnectionLogEntriesRequest' => [CountConnectionLogEntriesRequest::class, [], 'GET', '/logging/connection/count', 'scalar', null, false, false],
    'Logging\\ConnectionLogEntry\\GetConnectionLogEntryRequest' => [GetConnectionLogEntryRequest::class, [7], 'GET', '/logging/connection/7', 'one', ConnectionLogEntry::class, false, false],
    'Logging\\ConnectionLogEntry\\GetConnectionLogEntryTabledatatotalsRequest' => [GetConnectionLogEntryTabledatatotalsRequest::class, [], 'GET', '/logging/connection/tabledatatotals', 'one', null, false, false],
    'Logging\\ConnectionLogEntry\\GetConnectionLogEntryTopHostsActivityRequest' => [GetConnectionLogEntryTopHostsActivityRequest::class, [], 'GET', '/logging/connection/top/hosts/activity', 'one', ConnectionLogEntryTopHostsActivity::class, false, false],
    'Logging\\ConnectionLogEntry\\GetConnectionLogEntryTopUsersConnectedTimeRequest' => [GetConnectionLogEntryTopUsersConnectedTimeRequest::class, [], 'GET', '/logging/connection/top/users/connected-time', 'one', ConnectionLogEntryTopUsersConnectedTime::class, false, false],
    'Logging\\ConnectionLogEntry\\GetConnectionLogEntryVlanChangesRequest' => [GetConnectionLogEntryVlanChangesRequest::class, [], 'GET', '/logging/connection/vlan/changes', 'one', null, false, false],
    'Logging\\ConnectionLogEntry\\PostConnectionLogEntryArchiveImportRequest' => [PostConnectionLogEntryArchiveImportRequest::class, [], 'POST', '/logging/connection/archive/import', 'one', null, false, false],
    'Logging\\EventAlarmMapping\\DeleteEventAlarmMappingRequest' => [DeleteEventAlarmMappingRequest::class, [7], 'DELETE', '/logging/event-alarm-mapping/7', 'none', null, false, false],
    'Logging\\EventAlarmMapping\\GetEventAlarmMappingsRequest' => [GetEventAlarmMappingsRequest::class, [], 'GET', '/logging/event-alarm-mapping', 'list', EventAlarmMapping::class, false, true],
    'Logging\\EventAlarmMapping\\CountAllEventAlarmMappingsRequest' => [CountAllEventAlarmMappingsRequest::class, [], 'GET', '/logging/event-alarm-mapping/count/all', 'scalar', null, false, false],
    'Logging\\EventAlarmMapping\\CountEventAlarmMappingsRequest' => [CountEventAlarmMappingsRequest::class, [], 'GET', '/logging/event-alarm-mapping/count', 'scalar', null, false, false],
    'Logging\\EventAlarmMapping\\GetEventAlarmMappingRequest' => [GetEventAlarmMappingRequest::class, [7], 'GET', '/logging/event-alarm-mapping/7', 'one', EventAlarmMapping::class, false, false],
    'Logging\\EventAlarmMapping\\GetEventAlarmMappingUsageRequest' => [GetEventAlarmMappingUsageRequest::class, [7], 'GET', '/logging/event-alarm-mapping/7/usage', 'list', null, false, true],
    'Logging\\EventAlarmMapping\\GetEventAlarmMappingSupportingInfoRequest' => [GetEventAlarmMappingSupportingInfoRequest::class, [], 'GET', '/logging/event-alarm-mapping/supporting-info', 'one', null, false, false],
    'Logging\\EventAlarmMapping\\CreateEventAlarmMappingRequest' => [CreateEventAlarmMappingRequest::class, [['name' => 'x']], 'POST', '/logging/event-alarm-mapping', 'scalar', null, true, false],
    'Logging\\EventAlarmMapping\\DeleteManyEventAlarmMappingsRequest' => [DeleteManyEventAlarmMappingsRequest::class, [], 'POST', '/logging/event-alarm-mapping/delete', 'one', null, false, false],
    'Logging\\EventAlarmMapping\\DisableManyEventAlarmMappingsRequest' => [DisableManyEventAlarmMappingsRequest::class, [], 'POST', '/logging/event-alarm-mapping/disable', 'one', null, false, false],
    'Logging\\EventAlarmMapping\\EnableManyEventAlarmMappingsRequest' => [EnableManyEventAlarmMappingsRequest::class, [], 'POST', '/logging/event-alarm-mapping/enable', 'one', null, false, false],
    'Logging\\EventAlarmMapping\\UpdateEventAlarmMappingRequest' => [UpdateEventAlarmMappingRequest::class, [7, ['name' => 'x']], 'POST', '/logging/event-alarm-mapping/7', 'scalar', null, true, false],
    'Logging\\EventAlarmMapping\\DeleteEventAlarmMappingViaPostRequest' => [DeleteEventAlarmMappingViaPostRequest::class, [7], 'POST', '/logging/event-alarm-mapping/7/delete', 'one', null, false, false],
    'Logging\\EventAlarmMapping\\ModifyEventAlarmMappingRequest' => [ModifyEventAlarmMappingRequest::class, [], 'POST', '/logging/event-alarm-mapping/modify', 'one', null, false, false],
    'Logging\\EventType\\GetEventTypesRequest' => [GetEventTypesRequest::class, [], 'GET', '/logging/event-types', 'list', EventType::class, false, true],
    'Logging\\EventType\\CountEventTypesRequest' => [CountEventTypesRequest::class, [], 'GET', '/logging/event-types/count', 'scalar', null, false, false],
    'Logging\\EventType\\CountAllEventTypesRequest' => [CountAllEventTypesRequest::class, [], 'GET', '/logging/event-types/count/all', 'scalar', null, false, false],
    'Logging\\EventType\\GetEventTypeCountByIdRequest' => [GetEventTypeCountByIdRequest::class, [7], 'GET', '/logging/event-types/count/7', 'one', EventType::class, false, false],
    'Logging\\EventType\\GetEventTypeThresholdsRequest' => [GetEventTypeThresholdsRequest::class, [], 'GET', '/logging/event-types/thresholds', 'one', EventTypeThresholds::class, false, false],
    'Logging\\EventType\\PostEventTypeGroupRequest' => [PostEventTypeGroupRequest::class, [], 'POST', '/logging/event-types/group', 'one', null, false, false],
    'Logging\\EventType\\PostEventTypeLoggingStrategyRequest' => [PostEventTypeLoggingStrategyRequest::class, [], 'POST', '/logging/event-types/logging-strategy', 'one', null, false, false],
    'Logging\\EventType\\PostEventTypeThresholdsRequest' => [PostEventTypeThresholdsRequest::class, [['name' => 'x']], 'POST', '/logging/event-types/thresholds', 'one', EventTypeThresholds::class, true, false],
    'Logging\\Event\\DeleteEventRequest' => [DeleteEventRequest::class, [7], 'DELETE', '/logging/event/7', 'none', null, false, false],
    'Logging\\Event\\GetEventsRequest' => [GetEventsRequest::class, [], 'GET', '/logging/event', 'list', Event::class, false, true],
    'Logging\\Event\\GetEventArchiveRequest' => [GetEventArchiveRequest::class, [], 'GET', '/logging/event/archive', 'raw', null, false, false],
    'Logging\\Event\\GetEventArchiveImportStatusRequest' => [GetEventArchiveImportStatusRequest::class, [], 'GET', '/logging/event/archive/import/status', 'scalar', null, false, false],
    'Logging\\Event\\CountEventsRequest' => [CountEventsRequest::class, [], 'GET', '/logging/event/count', 'scalar', null, false, false],
    'Logging\\Event\\CountAllEventsRequest' => [CountAllEventsRequest::class, [], 'GET', '/logging/event/count/all', 'scalar', null, false, false],
    'Logging\\Event\\GetEventRequest' => [GetEventRequest::class, [7], 'GET', '/logging/event/7', 'one', Event::class, false, false],
    'Logging\\Event\\GetEventUsageRequest' => [GetEventUsageRequest::class, [7], 'GET', '/logging/event/7/usage', 'list', null, false, true],
    'Logging\\Event\\GetEventMonitorRequest' => [GetEventMonitorRequest::class, [7], 'GET', '/logging/event/monitor/7', 'one', null, false, false],
    'Logging\\Event\\GetEventSupportingInfoRequest' => [GetEventSupportingInfoRequest::class, [], 'GET', '/logging/event/supporting-info', 'list', null, false, true],
    'Logging\\Event\\CreateEventRequest' => [CreateEventRequest::class, [['name' => 'x']], 'POST', '/logging/event', 'one', Event::class, true, false],
    'Logging\\Event\\PostEventArchiveImportRequest' => [PostEventArchiveImportRequest::class, [], 'POST', '/logging/event/archive/import', 'one', null, false, false],
    'Logging\\Event\\DeleteManyEventsRequest' => [DeleteManyEventsRequest::class, [], 'POST', '/logging/event/delete', 'one', null, false, false],
    'Logging\\Event\\UpdateEventRequest' => [UpdateEventRequest::class, [7, ['name' => 'x']], 'POST', '/logging/event/7', 'one', Event::class, true, false],
    'Logging\\Event\\DeleteEventViaPostRequest' => [DeleteEventViaPostRequest::class, [7], 'POST', '/logging/event/7/delete', 'one', null, false, false],
    'Logging\\Event\\StartEventMonitorRequest' => [StartEventMonitorRequest::class, [], 'POST', '/logging/event/monitor/start', 'list', Event::class, false, false],
    'Logging\\Event\\StopEventMonitorRequest' => [StopEventMonitorRequest::class, [7], 'POST', '/logging/event/monitor/7/stop', 'one', null, false, false],
    'Logging\\Event\\PostEventNoteRequest' => [PostEventNoteRequest::class, [], 'POST', '/logging/event/note', 'one', null, false, false],
    'Policy\\AccessConfiguration\\DeleteAccessConfigurationRequest' => [DeleteAccessConfigurationRequest::class, [7], 'DELETE', '/policy/access-configuration/7', 'none', null, false, false],
    'Policy\\AccessConfiguration\\GetAccessConfigurationsRequest' => [GetAccessConfigurationsRequest::class, [], 'GET', '/policy/access-configuration', 'list', AccessConfiguration::class, false, true],
    'Policy\\AccessConfiguration\\CountAccessConfigurationsRequest' => [CountAccessConfigurationsRequest::class, [], 'GET', '/policy/access-configuration/count', 'scalar', null, false, false],
    'Policy\\AccessConfiguration\\CountAllAccessConfigurationsRequest' => [CountAllAccessConfigurationsRequest::class, [], 'GET', '/policy/access-configuration/count/all', 'scalar', null, false, false],
    'Policy\\AccessConfiguration\\GetAccessConfigurationDirectConfigurationRequest' => [GetAccessConfigurationDirectConfigurationRequest::class, [], 'GET', '/policy/access-configuration/direct-configuration', 'scalar', null, false, false],
    'Policy\\AccessConfiguration\\GetAccessConfigurationRequest' => [GetAccessConfigurationRequest::class, [7], 'GET', '/policy/access-configuration/7', 'one', AccessConfiguration::class, false, false],
    'Policy\\AccessConfiguration\\GetAccessConfigurationUsageRequest' => [GetAccessConfigurationUsageRequest::class, [7], 'GET', '/policy/access-configuration/7/usage', 'list', null, false, true],
    'Policy\\AccessConfiguration\\GetAccessConfigurationSupportingInfoRequest' => [GetAccessConfigurationSupportingInfoRequest::class, [], 'GET', '/policy/access-configuration/supporting-info', 'one', null, false, false],
    'Policy\\AccessConfiguration\\CreateAccessConfigurationRequest' => [CreateAccessConfigurationRequest::class, [['name' => 'x']], 'POST', '/policy/access-configuration', 'scalar', null, true, false],
    'Policy\\AccessConfiguration\\DeleteManyAccessConfigurationsRequest' => [DeleteManyAccessConfigurationsRequest::class, [], 'POST', '/policy/access-configuration/delete', 'one', null, false, false],
    'Policy\\AccessConfiguration\\UpdateAccessConfigurationRequest' => [UpdateAccessConfigurationRequest::class, [7, ['name' => 'x']], 'POST', '/policy/access-configuration/7', 'one', AccessConfiguration::class, true, false],
    'Policy\\AccessConfiguration\\DeleteAccessConfigurationViaPostRequest' => [DeleteAccessConfigurationViaPostRequest::class, [7], 'POST', '/policy/access-configuration/7/delete', 'one', null, false, false],
    'Policy\\AccessPolicy\\DeleteAccessPolicyRequest' => [DeleteAccessPolicyRequest::class, [7], 'DELETE', '/policy/access/7', 'none', null, false, false],
    'Policy\\AccessPolicy\\GetAccessPoliciesRequest' => [GetAccessPoliciesRequest::class, [], 'GET', '/policy/access', 'list', AccessPolicy::class, false, true],
    'Policy\\AccessPolicy\\DisableManyAccessPoliciesRequest' => [DisableManyAccessPoliciesRequest::class, [], 'POST', '/policy/access/disable', 'one', null, false, false],
    'Policy\\AccessPolicy\\GetAccessPolicyRequest' => [GetAccessPolicyRequest::class, [7], 'GET', '/policy/access/7', 'one', AccessPolicy::class, false, false],
    'Policy\\AccessPolicy\\GetAccessPolicySupportingInfoRequest' => [GetAccessPolicySupportingInfoRequest::class, [], 'GET', '/policy/access/supporting-info', 'one', null, false, false],
    'Policy\\AccessPolicy\\CreateAccessPolicyRequest' => [CreateAccessPolicyRequest::class, [['name' => 'x']], 'POST', '/policy/access', 'scalar', null, true, false],
    'Policy\\AccessPolicy\\DeleteManyAccessPoliciesRequest' => [DeleteManyAccessPoliciesRequest::class, [], 'POST', '/policy/access/delete', 'one', null, false, false],
    'Policy\\AccessPolicy\\EnableManyAccessPoliciesRequest' => [EnableManyAccessPoliciesRequest::class, [], 'POST', '/policy/access/enable', 'one', null, false, false],
    'Policy\\AccessPolicy\\UpdateAccessPolicyRequest' => [UpdateAccessPolicyRequest::class, [7, ['name' => 'x']], 'POST', '/policy/access/7', 'one', AccessPolicy::class, true, false],
    'Policy\\AccessPolicy\\DeleteAccessPolicyViaPostRequest' => [DeleteAccessPolicyViaPostRequest::class, [7], 'POST', '/policy/access/7/delete', 'one', null, false, false],
    'Policy\\AccessPolicy\\DisableAccessPolicyRequest' => [DisableAccessPolicyRequest::class, [7], 'POST', '/policy/access/7/disable', 'one', null, false, false],
    'Policy\\AccessPolicy\\EnableAccessPolicyRequest' => [EnableAccessPolicyRequest::class, [7], 'POST', '/policy/access/7/enable', 'one', null, false, false],
    'Policy\\AccessPolicy\\SetAccessPolicyRankRequest' => [SetAccessPolicyRankRequest::class, [], 'POST', '/policy/access/rank/set', 'one', null, false, false],
    'Policy\\AccessPolicy\\SwapAccessPolicyRanksRequest' => [SwapAccessPolicyRanksRequest::class, [], 'POST', '/policy/access/rank/swap', 'one', null, false, false],
    'Policy\\AuthenticationConfiguration\\DeleteAuthenticationConfigurationRequest' => [DeleteAuthenticationConfigurationRequest::class, [7], 'DELETE', '/policy/authentication-configuration/7', 'none', null, false, false],
    'Policy\\AuthenticationConfiguration\\GetAuthenticationConfigurationsRequest' => [GetAuthenticationConfigurationsRequest::class, [], 'GET', '/policy/authentication-configuration', 'list', AuthenticationConfiguration::class, false, true],
    'Policy\\AuthenticationConfiguration\\GetAuthenticationConfigurationRequest' => [GetAuthenticationConfigurationRequest::class, [7], 'GET', '/policy/authentication-configuration/7', 'one', AuthenticationConfiguration::class, false, false],
    'Policy\\AuthenticationConfiguration\\GetAuthenticationConfigurationUsageRequest' => [GetAuthenticationConfigurationUsageRequest::class, [7], 'GET', '/policy/authentication-configuration/7/usage', 'list', null, false, false],
    'Policy\\AuthenticationConfiguration\\CreateAuthenticationConfigurationRequest' => [CreateAuthenticationConfigurationRequest::class, [['name' => 'x']], 'POST', '/policy/authentication-configuration', 'scalar', null, true, false],
    'Policy\\AuthenticationConfiguration\\DeleteManyAuthenticationConfigurationsRequest' => [DeleteManyAuthenticationConfigurationsRequest::class, [], 'POST', '/policy/authentication-configuration/delete', 'one', null, false, false],
    'Policy\\AuthenticationConfiguration\\UpdateAuthenticationConfigurationRequest' => [UpdateAuthenticationConfigurationRequest::class, [7, ['name' => 'x']], 'POST', '/policy/authentication-configuration/7', 'one', AuthenticationConfiguration::class, true, false],
    'Policy\\AuthenticationConfiguration\\DeleteAuthenticationConfigurationViaPostRequest' => [DeleteAuthenticationConfigurationViaPostRequest::class, [7], 'POST', '/policy/authentication-configuration/7/delete', 'one', null, false, false],
    'Policy\\AuthenticationPolicy\\DeleteAuthenticationPolicyRequest' => [DeleteAuthenticationPolicyRequest::class, [7], 'DELETE', '/policy/authentication/7', 'none', null, false, false],
    'Policy\\AuthenticationPolicy\\GetAuthenticationPoliciesRequest' => [GetAuthenticationPoliciesRequest::class, [], 'GET', '/policy/authentication', 'list', AuthenticationPolicy::class, false, true],
    'Policy\\AuthenticationPolicy\\GetAuthenticationPolicyRequest' => [GetAuthenticationPolicyRequest::class, [7], 'GET', '/policy/authentication/7', 'one', AuthenticationPolicy::class, false, false],
    'Policy\\AuthenticationPolicy\\CreateAuthenticationPolicyRequest' => [CreateAuthenticationPolicyRequest::class, [['name' => 'x']], 'POST', '/policy/authentication', 'one', AuthenticationPolicy::class, true, false],
    'Policy\\AuthenticationPolicy\\DeleteManyAuthenticationPoliciesRequest' => [DeleteManyAuthenticationPoliciesRequest::class, [], 'POST', '/policy/authentication/delete', 'one', null, false, false],
    'Policy\\AuthenticationPolicy\\DisableManyAuthenticationPoliciesRequest' => [DisableManyAuthenticationPoliciesRequest::class, [], 'POST', '/policy/authentication/disable', 'one', null, false, false],
    'Policy\\AuthenticationPolicy\\EnableManyAuthenticationPoliciesRequest' => [EnableManyAuthenticationPoliciesRequest::class, [], 'POST', '/policy/authentication/enable', 'one', null, false, false],
    'Policy\\AuthenticationPolicy\\UpdateAuthenticationPolicyRequest' => [UpdateAuthenticationPolicyRequest::class, [7, ['name' => 'x']], 'POST', '/policy/authentication/7', 'one', AuthenticationPolicy::class, true, false],
    'Policy\\AuthenticationPolicy\\DeleteAuthenticationPolicyViaPostRequest' => [DeleteAuthenticationPolicyViaPostRequest::class, [7], 'POST', '/policy/authentication/7/delete', 'one', null, false, false],
    'Policy\\AuthenticationPolicy\\DisableAuthenticationPolicyRequest' => [DisableAuthenticationPolicyRequest::class, [7], 'POST', '/policy/authentication/7/disable', 'one', null, false, false],
    'Policy\\AuthenticationPolicy\\EnableAuthenticationPolicyRequest' => [EnableAuthenticationPolicyRequest::class, [7], 'POST', '/policy/authentication/7/enable', 'one', null, false, false],
    'Policy\\AuthenticationPolicy\\SetAuthenticationPolicyRankRequest' => [SetAuthenticationPolicyRankRequest::class, [], 'POST', '/policy/authentication/rank/set', 'one', null, false, false],
    'Policy\\AuthenticationPolicy\\SwapAuthenticationPolicyRanksRequest' => [SwapAuthenticationPolicyRanksRequest::class, [], 'POST', '/policy/authentication/rank/swap', 'one', null, false, false],
    'Policy\\EndpointComplianceConfiguration\\DeleteEndpointComplianceConfigurationRequest' => [DeleteEndpointComplianceConfigurationRequest::class, [7], 'DELETE', '/policy/endpoint-compliance-configuration/7', 'none', null, false, false],
    'Policy\\EndpointComplianceConfiguration\\GetEndpointComplianceConfigurationsRequest' => [GetEndpointComplianceConfigurationsRequest::class, [], 'GET', '/policy/endpoint-compliance-configuration', 'list', EndpointComplianceConfiguration::class, false, true],
    'Policy\\EndpointComplianceConfiguration\\GetEndpointComplianceConfigurationRequest' => [GetEndpointComplianceConfigurationRequest::class, [7], 'GET', '/policy/endpoint-compliance-configuration/7', 'one', EndpointComplianceConfiguration::class, false, false],
    'Policy\\EndpointComplianceConfiguration\\GetEndpointComplianceConfigurationUsageRequest' => [GetEndpointComplianceConfigurationUsageRequest::class, [7], 'GET', '/policy/endpoint-compliance-configuration/7/usage', 'list', null, false, true],
    'Policy\\EndpointComplianceConfiguration\\GetEndpointComplianceConfigurationSupportingInfoRequest' => [GetEndpointComplianceConfigurationSupportingInfoRequest::class, [], 'GET', '/policy/endpoint-compliance-configuration/supporting-info', 'one', null, false, false],
    'Policy\\EndpointComplianceConfiguration\\CreateEndpointComplianceConfigurationRequest' => [CreateEndpointComplianceConfigurationRequest::class, [['name' => 'x']], 'POST', '/policy/endpoint-compliance-configuration', 'scalar', null, true, false],
    'Policy\\EndpointComplianceConfiguration\\DeleteManyEndpointComplianceConfigurationsRequest' => [DeleteManyEndpointComplianceConfigurationsRequest::class, [], 'POST', '/policy/endpoint-compliance-configuration/delete', 'one', null, false, false],
    'Policy\\EndpointComplianceConfiguration\\UpdateEndpointComplianceConfigurationRequest' => [UpdateEndpointComplianceConfigurationRequest::class, [7, ['name' => 'x']], 'POST', '/policy/endpoint-compliance-configuration/7', 'scalar', null, true, false],
    'Policy\\EndpointComplianceConfiguration\\DeleteEndpointComplianceConfigurationViaPostRequest' => [DeleteEndpointComplianceConfigurationViaPostRequest::class, [7], 'POST', '/policy/endpoint-compliance-configuration/7/delete', 'one', null, false, false],
    'Policy\\EndpointComplianceCustomScan\\GetEndpointComplianceCustomScanHtmlRequest' => [GetEndpointComplianceCustomScanHtmlRequest::class, [], 'GET', '/policy/endpoint-compliance/custom-scan/html', 'one', null, false, false],
    'Policy\\EndpointComplianceCustomScan\\GetEndpointComplianceCustomScanRequest' => [GetEndpointComplianceCustomScanRequest::class, [], 'GET', '/policy/endpoint-compliance/custom-scan', 'one', null, false, false],
    'Policy\\EndpointComplianceCustomScan\\GetEndpointComplianceCustomScanUsageRequest' => [GetEndpointComplianceCustomScanUsageRequest::class, [], 'GET', '/policy/endpoint-compliance/custom-scan/usage', 'raw', null, false, false],
    'Policy\\EndpointComplianceCustomScan\\PostEndpointComplianceCustomScanCustomScanRequest' => [PostEndpointComplianceCustomScanCustomScanRequest::class, [], 'POST', '/policy/endpoint-compliance/custom-scan/custom-scan', 'one', null, false, false],
    'Policy\\EndpointComplianceCustomScan\\PostEndpointComplianceCustomScanCustomScanDeleteRequest' => [PostEndpointComplianceCustomScanCustomScanDeleteRequest::class, [], 'POST', '/policy/endpoint-compliance/custom-scan/custom-scan/delete', 'one', null, false, false],
    'Policy\\EndpointComplianceScan\\DeleteEndpointComplianceScanRequest' => [DeleteEndpointComplianceScanRequest::class, [7], 'DELETE', '/policy/endpoint-compliance/scan/7', 'none', null, false, false],
    'Policy\\EndpointComplianceScan\\GetEndpointComplianceScansRequest' => [GetEndpointComplianceScansRequest::class, [], 'GET', '/policy/endpoint-compliance/scan', 'list', EndpointComplianceScan::class, false, true],
    'Policy\\EndpointComplianceScan\\GetEndpointComplianceScanAvailableRequest' => [GetEndpointComplianceScanAvailableRequest::class, [], 'GET', '/policy/endpoint-compliance/scan/available', 'one', null, false, false],
    'Policy\\EndpointComplianceScan\\CountEndpointComplianceScansRequest' => [CountEndpointComplianceScansRequest::class, [], 'GET', '/policy/endpoint-compliance/scan/count', 'scalar', null, false, false],
    'Policy\\EndpointComplianceScan\\CountAllEndpointComplianceScansRequest' => [CountAllEndpointComplianceScansRequest::class, [], 'GET', '/policy/endpoint-compliance/scan/count/all', 'scalar', null, false, false],
    'Policy\\EndpointComplianceScan\\GetEndpointComplianceScanDetailsRequest' => [GetEndpointComplianceScanDetailsRequest::class, [], 'GET', '/policy/endpoint-compliance/scan/details', 'one', null, false, false],
    'Policy\\EndpointComplianceScan\\GetEndpointComplianceScanRequest' => [GetEndpointComplianceScanRequest::class, [7], 'GET', '/policy/endpoint-compliance/scan/7', 'one', EndpointComplianceScan::class, false, false],
    'Policy\\EndpointComplianceScan\\GetEndpointComplianceScanUsageRequest' => [GetEndpointComplianceScanUsageRequest::class, [7], 'GET', '/policy/endpoint-compliance/scan/7/usage', 'list', null, false, true],
    'Policy\\EndpointComplianceScan\\GetEndpointComplianceScanProductRequest' => [GetEndpointComplianceScanProductRequest::class, [], 'GET', '/policy/endpoint-compliance/scan/product', 'one', null, false, false],
    'Policy\\EndpointComplianceScan\\PostEndpointComplianceScanDetailsRequest' => [PostEndpointComplianceScanDetailsRequest::class, [7, ['name' => 'x']], 'POST', '/policy/endpoint-compliance/scan/7/details', 'one', null, true, false],
    'Policy\\EndpointComplianceScan\\RemoveEndpointComplianceScanPolicyTypesRequest' => [RemoveEndpointComplianceScanPolicyTypesRequest::class, [], 'POST', '/policy/endpoint-compliance/scan/remove-policy-types', 'one', null, false, false],
    'Policy\\EndpointComplianceScan\\CreateEndpointComplianceScanRequest' => [CreateEndpointComplianceScanRequest::class, [['name' => 'x']], 'POST', '/policy/endpoint-compliance/scan', 'one', EndpointComplianceScan::class, true, false],
    'Policy\\EndpointComplianceScan\\CopyEndpointComplianceScanRequest' => [CopyEndpointComplianceScanRequest::class, [], 'POST', '/policy/endpoint-compliance/scan/copy', 'one', null, false, false],
    'Policy\\EndpointComplianceScan\\DeleteManyEndpointComplianceScansRequest' => [DeleteManyEndpointComplianceScansRequest::class, [], 'POST', '/policy/endpoint-compliance/scan/delete', 'one', null, false, false],
    'Policy\\EndpointComplianceScan\\PostEndpointComplianceScanDetails2Request' => [PostEndpointComplianceScanDetails2Request::class, [['name' => 'x']], 'POST', '/policy/endpoint-compliance/scan/details', 'one', null, true, false],
    'Policy\\EndpointComplianceScan\\UpdateEndpointComplianceScanRequest' => [UpdateEndpointComplianceScanRequest::class, [7, ['name' => 'x']], 'POST', '/policy/endpoint-compliance/scan/7', 'one', EndpointComplianceScan::class, true, false],
    'Policy\\EndpointComplianceScan\\DeleteEndpointComplianceScanViaPostRequest' => [DeleteEndpointComplianceScanViaPostRequest::class, [7], 'POST', '/policy/endpoint-compliance/scan/7/delete', 'one', null, false, false],
    'Policy\\EndpointCompliancePolicy\\DeleteEndpointCompliancePolicyRequest' => [DeleteEndpointCompliancePolicyRequest::class, [7], 'DELETE', '/policy/endpoint-compliance/7', 'none', null, false, false],
    'Policy\\EndpointCompliancePolicy\\GetEndpointCompliancePoliciesRequest' => [GetEndpointCompliancePoliciesRequest::class, [], 'GET', '/policy/endpoint-compliance', 'list', EndpointCompliancePolicy::class, false, true],
    'Policy\\EndpointCompliancePolicy\\GetEndpointCompliancePolicyRequest' => [GetEndpointCompliancePolicyRequest::class, [7], 'GET', '/policy/endpoint-compliance/7', 'one', EndpointCompliancePolicy::class, false, false],
    'Policy\\EndpointCompliancePolicy\\GetEndpointCompliancePolicySupportingInfoRequest' => [GetEndpointCompliancePolicySupportingInfoRequest::class, [], 'GET', '/policy/endpoint-compliance/supporting-info', 'one', null, false, false],
    'Policy\\EndpointCompliancePolicy\\CreateEndpointCompliancePolicyRequest' => [CreateEndpointCompliancePolicyRequest::class, [['name' => 'x']], 'POST', '/policy/endpoint-compliance', 'one', EndpointCompliancePolicy::class, true, false],
    'Policy\\EndpointCompliancePolicy\\DeleteManyEndpointCompliancePoliciesRequest' => [DeleteManyEndpointCompliancePoliciesRequest::class, [], 'POST', '/policy/endpoint-compliance/delete', 'one', null, false, false],
    'Policy\\EndpointCompliancePolicy\\DisableManyEndpointCompliancePoliciesRequest' => [DisableManyEndpointCompliancePoliciesRequest::class, [], 'POST', '/policy/endpoint-compliance/disable', 'one', null, false, false],
    'Policy\\EndpointCompliancePolicy\\EnableManyEndpointCompliancePoliciesRequest' => [EnableManyEndpointCompliancePoliciesRequest::class, [], 'POST', '/policy/endpoint-compliance/enable', 'one', null, false, false],
    'Policy\\EndpointCompliancePolicy\\UpdateEndpointCompliancePolicyRequest' => [UpdateEndpointCompliancePolicyRequest::class, [7, ['name' => 'x']], 'POST', '/policy/endpoint-compliance/7', 'one', EndpointCompliancePolicy::class, true, false],
    'Policy\\EndpointCompliancePolicy\\DeleteEndpointCompliancePolicyViaPostRequest' => [DeleteEndpointCompliancePolicyViaPostRequest::class, [7], 'POST', '/policy/endpoint-compliance/7/delete', 'one', null, false, false],
    'Policy\\EndpointCompliancePolicy\\DisableEndpointCompliancePolicyRequest' => [DisableEndpointCompliancePolicyRequest::class, [7], 'POST', '/policy/endpoint-compliance/7/disable', 'one', null, false, false],
    'Policy\\EndpointCompliancePolicy\\EnableEndpointCompliancePolicyRequest' => [EnableEndpointCompliancePolicyRequest::class, [7], 'POST', '/policy/endpoint-compliance/7/enable', 'one', null, false, false],
    'Policy\\EndpointCompliancePolicy\\SetEndpointCompliancePolicyRankRequest' => [SetEndpointCompliancePolicyRankRequest::class, [], 'POST', '/policy/endpoint-compliance/rank/set', 'one', null, false, false],
    'Policy\\EndpointCompliancePolicy\\SwapEndpointCompliancePolicyRanksRequest' => [SwapEndpointCompliancePolicyRanksRequest::class, [], 'POST', '/policy/endpoint-compliance/rank/swap', 'one', null, false, false],
    'Policy\\EventAction\\GetEventActionsRequest' => [GetEventActionsRequest::class, [], 'GET', '/policy/event-action', 'list', EventAction::class, false, true],
    'Policy\\EventAction\\GetEventActionUsageRequest' => [GetEventActionUsageRequest::class, [7], 'GET', '/policy/event-action/7/usage', 'list', null, false, false],
    'Policy\\EventAction\\GetEventActionSupportingInfoRequest' => [GetEventActionSupportingInfoRequest::class, [], 'GET', '/policy/event-action/supporting-info', 'one', null, false, false],
    'Policy\\EventAction\\GetEventActionRequest' => [GetEventActionRequest::class, [7], 'GET', '/policy/event-action/7', 'one', EventAction::class, false, false],
    'Policy\\EventAction\\CreateEventActionRequest' => [CreateEventActionRequest::class, [['name' => 'x']], 'POST', '/policy/event-action', 'one', EventAction::class, true, false],
    'Policy\\EventAction\\DeleteManyEventActionsRequest' => [DeleteManyEventActionsRequest::class, [], 'POST', '/policy/event-action/delete', 'one', null, false, false],
    'Policy\\EventAction\\DeleteEventActionViaPostRequest' => [DeleteEventActionViaPostRequest::class, [7], 'POST', '/policy/event-action/7/delete', 'one', null, false, false],
    'Policy\\EventAction\\UpdateEventActionRequest' => [UpdateEventActionRequest::class, [7, ['name' => 'x']], 'POST', '/policy/event-action/7', 'one', EventAction::class, true, false],
    'Policy\\EventAction\\DeleteEventActionRequest' => [DeleteEventActionRequest::class, [7], 'DELETE', '/policy/event-action/7', 'none', null, false, false],
    'Policy\\LogicalNetworkConfiguration\\GetLogicalNetworkConfigurationElementPropertiesRequest' => [GetLogicalNetworkConfigurationElementPropertiesRequest::class, [], 'GET', '/policy/logical-network-configuration/element/properties', 'one', null, false, false],
    'Policy\\LogicalNetworkConfiguration\\GetLogicalNetworkConfigurationsRequest' => [GetLogicalNetworkConfigurationsRequest::class, [], 'GET', '/policy/logical-network-configuration', 'list', LogicalNetworkConfiguration::class, false, true],
    'Policy\\LogicalNetworkConfiguration\\GetLogicalNetworkConfigurationRequest' => [GetLogicalNetworkConfigurationRequest::class, [7], 'GET', '/policy/logical-network-configuration/7', 'one', LogicalNetworkConfiguration::class, false, false],
    'Policy\\LogicalNetworkConfiguration\\GetLogicalNetworkConfigurationUsageRequest' => [GetLogicalNetworkConfigurationUsageRequest::class, [7], 'GET', '/policy/logical-network-configuration/7/usage', 'list', null, false, false],
    'Policy\\LogicalNetworkConfiguration\\GetLogicalNetworkConfigurationRadiusRequest' => [GetLogicalNetworkConfigurationRadiusRequest::class, [], 'GET', '/policy/logical-network-configuration/radius', 'raw', null, false, false],
    'Policy\\LogicalNetworkConfiguration\\CreateLogicalNetworkConfigurationRequest' => [CreateLogicalNetworkConfigurationRequest::class, [['name' => 'x']], 'POST', '/policy/logical-network-configuration', 'one', LogicalNetworkConfiguration::class, true, false],
    'Policy\\LogicalNetworkConfiguration\\BatchLogicalNetworkConfigurationUpsertRequest' => [BatchLogicalNetworkConfigurationUpsertRequest::class, [['name' => 'x']], 'POST', '/policy/logical-network-configuration/batch-upsert', 'one', LogicalNetworkConfiguration::class, true, false],
    'Policy\\LogicalNetworkConfiguration\\PostLogicalNetworkConfigurationElementPropertiesRequest' => [PostLogicalNetworkConfigurationElementPropertiesRequest::class, [], 'POST', '/policy/logical-network-configuration/element/properties', 'one', null, false, false],
    'Policy\\LogicalNetworkConfiguration\\DeleteManyLogicalNetworkConfigurationsRequest' => [DeleteManyLogicalNetworkConfigurationsRequest::class, [], 'POST', '/policy/logical-network-configuration/delete', 'one', null, false, false],
    'Policy\\LogicalNetworkConfiguration\\DeleteLogicalNetworkConfigurationViaPostRequest' => [DeleteLogicalNetworkConfigurationViaPostRequest::class, [7], 'POST', '/policy/logical-network-configuration/7/delete', 'one', null, false, false],
    'Policy\\LogicalNetworkConfiguration\\UpdateLogicalNetworkConfigurationRequest' => [UpdateLogicalNetworkConfigurationRequest::class, [7, ['name' => 'x']], 'POST', '/policy/logical-network-configuration/7', 'one', LogicalNetworkConfiguration::class, true, false],
    'Policy\\LogicalNetworkConfiguration\\PostLogicalNetworkConfigurationElementPropertiesByDeviceIdRequest' => [PostLogicalNetworkConfigurationElementPropertiesByDeviceIdRequest::class, [7, ['name' => 'x']], 'POST', '/policy/logical-network-configuration/element/properties/7', 'one', LogicalNetworkConfigurationElementPropertiesByDeviceId::class, true, false],
    'Policy\\LogicalNetworkConfiguration\\DeleteLogicalNetworkConfigurationRequest' => [DeleteLogicalNetworkConfigurationRequest::class, [7], 'DELETE', '/policy/logical-network-configuration/7', 'none', null, false, false],
    'Policy\\LogicalNetwork\\DeleteLogicalNetworkRequest' => [DeleteLogicalNetworkRequest::class, [7], 'DELETE', '/policy/logical-network/7', 'none', null, false, false],
    'Policy\\LogicalNetwork\\GetLogicalNetworksRequest' => [GetLogicalNetworksRequest::class, [], 'GET', '/policy/logical-network', 'list', LogicalNetwork::class, false, true],
    'Policy\\LogicalNetwork\\GetLogicalNetworkRequest' => [GetLogicalNetworkRequest::class, [7], 'GET', '/policy/logical-network/7', 'one', LogicalNetwork::class, false, false],
    'Policy\\LogicalNetwork\\CreateLogicalNetworkRequest' => [CreateLogicalNetworkRequest::class, [['name' => 'x']], 'POST', '/policy/logical-network', 'scalar', null, true, false],
    'Policy\\LogicalNetwork\\AddLogicalNetworkPredefinedNetworkAccessRequest' => [AddLogicalNetworkPredefinedNetworkAccessRequest::class, [], 'POST', '/policy/logical-network/add-predefined-network-access', 'one', null, false, false],
    'Policy\\LogicalNetwork\\DeleteManyLogicalNetworksRequest' => [DeleteManyLogicalNetworksRequest::class, [], 'POST', '/policy/logical-network/delete', 'one', null, false, false],
    'Policy\\LogicalNetwork\\UpdateLogicalNetworkRequest' => [UpdateLogicalNetworkRequest::class, [7, ['name' => 'x']], 'POST', '/policy/logical-network/7', 'one', LogicalNetwork::class, true, false],
    'Policy\\LogicalNetwork\\DeleteLogicalNetworkViaPostRequest' => [DeleteLogicalNetworkViaPostRequest::class, [7], 'POST', '/policy/logical-network/7/delete', 'one', null, false, false],
    'Policy\\LogicalNetwork\\GetLogicalNetworkUsageRequest' => [GetLogicalNetworkUsageRequest::class, [7], 'GET', '/policy/logical-network/7/usage', 'list', null, false, true],
    'Policy\\PortalConfiguration\\GetPortalConfigurationsRequest' => [GetPortalConfigurationsRequest::class, [], 'GET', '/policy/portal-configuration', 'list', PortalConfiguration::class, false, true],
    'Policy\\PortalConfiguration\\GetPortalConfigurationRequest' => [GetPortalConfigurationRequest::class, [7], 'GET', '/policy/portal-configuration/7', 'one', PortalConfiguration::class, false, false],
    'Policy\\PortalConfiguration\\GetPortalConfigurationUsageRequest' => [GetPortalConfigurationUsageRequest::class, [7], 'GET', '/policy/portal-configuration/7/usage', 'list', null, false, false],
    'Policy\\PortalConfiguration\\DeletePortalConfigurationRequest' => [DeletePortalConfigurationRequest::class, [7], 'DELETE', '/policy/portal-configuration/7', 'none', null, false, false],
    'Policy\\PortalPolicy\\GetPortalPoliciesRequest' => [GetPortalPoliciesRequest::class, [], 'GET', '/policy/portal', 'list', PortalPolicy::class, false, true],
    'Policy\\PortalPolicy\\GetPortalPolicySupportingInfoRequest' => [GetPortalPolicySupportingInfoRequest::class, [], 'GET', '/policy/portal/supporting-info', 'one', null, false, false],
    'Policy\\PortalPolicy\\GetPortalPolicyRequest' => [GetPortalPolicyRequest::class, [7], 'GET', '/policy/portal/7', 'one', PortalPolicy::class, false, false],
    'Policy\\PortalPolicy\\CreatePortalPolicyRequest' => [CreatePortalPolicyRequest::class, [['name' => 'x']], 'POST', '/policy/portal', 'one', PortalPolicy::class, true, false],
    'Policy\\PortalPolicy\\DeleteManyPortalPoliciesRequest' => [DeleteManyPortalPoliciesRequest::class, [], 'POST', '/policy/portal/delete', 'one', null, false, false],
    'Policy\\PortalPolicy\\DisableManyPortalPoliciesRequest' => [DisableManyPortalPoliciesRequest::class, [], 'POST', '/policy/portal/disable', 'one', null, false, false],
    'Policy\\PortalPolicy\\EnableManyPortalPoliciesRequest' => [EnableManyPortalPoliciesRequest::class, [], 'POST', '/policy/portal/enable', 'one', null, false, false],
    'Policy\\PortalPolicy\\UpdatePortalPolicyRequest' => [UpdatePortalPolicyRequest::class, [7, ['name' => 'x']], 'POST', '/policy/portal/7', 'one', PortalPolicy::class, true, false],
    'Policy\\PortalPolicy\\DeletePortalPolicyViaPostRequest' => [DeletePortalPolicyViaPostRequest::class, [7], 'POST', '/policy/portal/7/delete', 'one', null, false, false],
    'Policy\\PortalPolicy\\SetPortalPolicyRankRequest' => [SetPortalPolicyRankRequest::class, [], 'POST', '/policy/portal/rank/set', 'one', null, false, false],
    'Policy\\PortalPolicy\\SwapPortalPolicyRanksRequest' => [SwapPortalPolicyRanksRequest::class, [], 'POST', '/policy/portal/rank/swap', 'one', null, false, false],
    'Policy\\RoleMapping\\GetRoleMappingUsageRequest' => [GetRoleMappingUsageRequest::class, [7], 'GET', '/policy/role-mapping/7/usage', 'list', null, false, false],
    'Policy\\RoleMapping\\GetRoleMappingRequest' => [GetRoleMappingRequest::class, [7], 'GET', '/policy/role-mapping/7', 'one', RoleMapping::class, false, false],
    'Policy\\RoleMapping\\GetRoleMappingsRequest' => [GetRoleMappingsRequest::class, [], 'GET', '/policy/role-mapping', 'list', RoleMapping::class, false, true],
    'Policy\\RoleMapping\\GetRoleMappingSupportingInfoRequest' => [GetRoleMappingSupportingInfoRequest::class, [], 'GET', '/policy/role-mapping/supporting-info', 'one', null, false, false],
    'Policy\\RoleMapping\\GetRoleMappingDirectConfigurationRequest' => [GetRoleMappingDirectConfigurationRequest::class, [], 'GET', '/policy/role-mapping/direct-configuration', 'scalar', null, false, false],
    'Policy\\RoleMapping\\GetRoleMappingMembershipRequest' => [GetRoleMappingMembershipRequest::class, [], 'GET', '/policy/role-mapping/membership', 'list', RoleMapping::class, false, true],
    'Policy\\RoleMapping\\CreateRoleMappingRequest' => [CreateRoleMappingRequest::class, [['name' => 'x']], 'POST', '/policy/role-mapping', 'one', RoleMapping::class, true, false],
    'Policy\\RoleMapping\\DeleteManyRoleMappingsRequest' => [DeleteManyRoleMappingsRequest::class, [], 'POST', '/policy/role-mapping/delete', 'one', null, false, false],
    'Policy\\RoleMapping\\UpdateRoleMappingRequest' => [UpdateRoleMappingRequest::class, [7, ['name' => 'x']], 'POST', '/policy/role-mapping/7', 'one', RoleMapping::class, true, false],
    'Policy\\RoleMapping\\DeleteRoleMappingViaPostRequest' => [DeleteRoleMappingViaPostRequest::class, [7], 'POST', '/policy/role-mapping/7/delete', 'one', null, false, false],
    'Policy\\RoleMapping\\SetRoleMappingRankRequest' => [SetRoleMappingRankRequest::class, [], 'POST', '/policy/role-mapping/rank/set', 'one', null, false, false],
    'Policy\\RoleMapping\\SwapRoleMappingRanksRequest' => [SwapRoleMappingRanksRequest::class, [], 'POST', '/policy/role-mapping/rank/swap', 'one', null, false, false],
    'Policy\\RoleMapping\\DeleteRoleMappingRequest' => [DeleteRoleMappingRequest::class, [7], 'DELETE', '/policy/role-mapping/7', 'none', null, false, false],
    'Policy\\Role\\DeleteRoleRequest' => [DeleteRoleRequest::class, [7], 'DELETE', '/policy/role/7', 'none', null, false, false],
    'Policy\\Role\\GetRolesRequest' => [GetRolesRequest::class, [], 'GET', '/policy/role', 'list', Role::class, false, true],
    'Policy\\Role\\GetRoleRequest' => [GetRoleRequest::class, [7], 'GET', '/policy/role/7', 'one', Role::class, false, false],
    'Policy\\Role\\PostRoleUsageRequest' => [PostRoleUsageRequest::class, [7], 'POST', '/policy/role/7/usage', 'list', null, false, false],
    'Policy\\Role\\GetRoleSimpleRequest' => [GetRoleSimpleRequest::class, [], 'GET', '/policy/role/simple', 'one', null, false, false],
    'Policy\\Role\\GetRoleSupportingInfoRequest' => [GetRoleSupportingInfoRequest::class, [], 'GET', '/policy/role/supporting-info', 'one', null, false, false],
    'Policy\\Role\\CreateRoleRequest' => [CreateRoleRequest::class, [['name' => 'x']], 'POST', '/policy/role', 'scalar', null, true, false],
    'Policy\\Role\\DeleteManyRolesRequest' => [DeleteManyRolesRequest::class, [], 'POST', '/policy/role/delete', 'one', null, false, false],
    'Policy\\Role\\UpdateRoleRequest' => [UpdateRoleRequest::class, [7, ['name' => 'x']], 'POST', '/policy/role/7', 'one', Role::class, true, false],
    'Policy\\Role\\DeleteRoleViaPostRequest' => [DeleteRoleViaPostRequest::class, [7], 'POST', '/policy/role/7/delete', 'one', null, false, false],
    'Policy\\Role\\SetRoleRankRequest' => [SetRoleRankRequest::class, [], 'POST', '/policy/role/rank/set', 'one', null, false, false],
    'Policy\\Role\\SwapRoleRanksRequest' => [SwapRoleRanksRequest::class, [], 'POST', '/policy/role/rank/swap', 'one', null, false, false],
    'Policy\\SecurityAlarm\\GetSecurityAlarmsRequest' => [GetSecurityAlarmsRequest::class, [], 'GET', '/policy/security-alarm', 'list', SecurityAlarm::class, false, true],
    'Policy\\SecurityAlarm\\GetSecurityAlarmRequest' => [GetSecurityAlarmRequest::class, [7], 'GET', '/policy/security-alarm/7', 'one', SecurityAlarm::class, false, false],
    'Policy\\SecurityAlarm\\GetSecurityAlarmMonitorRequest' => [GetSecurityAlarmMonitorRequest::class, [7], 'GET', '/policy/security-alarm/7/monitor', 'one', null, false, false],
    'Policy\\SecurityAlarm\\StartSecurityAlarmMonitorRequest' => [StartSecurityAlarmMonitorRequest::class, [], 'POST', '/policy/security-alarm/monitor/start', 'list', SecurityAlarm::class, false, false],
    'Policy\\SecurityAlarm\\PostSecurityAlarmMonitorStopRequest' => [PostSecurityAlarmMonitorStopRequest::class, [7], 'POST', '/policy/security-alarm/7/monitor/stop', 'one', null, false, false],
    'Policy\\SecurityEventSummary\\GetSecurityEventSummaryHostsIsolatedRequest' => [GetSecurityEventSummaryHostsIsolatedRequest::class, [], 'GET', '/policy/security-event-summary/hosts/isolated', 'raw', null, false, false],
    'Policy\\SecurityEventSummary\\GetSecurityEventSummaryAlarmsTopRequest' => [GetSecurityEventSummaryAlarmsTopRequest::class, [], 'GET', '/policy/security-event-summary/alarms/top', 'one', SecurityEventSummaryAlarmsTop::class, false, false],
    'Policy\\SecurityEventSummary\\GetSecurityEventSummaryEventsTopRequest' => [GetSecurityEventSummaryEventsTopRequest::class, [], 'GET', '/policy/security-event-summary/events/top', 'one', SecurityEventSummaryEventsTop::class, false, false],
    'Policy\\SecurityEventSummary\\GetSecurityEventSummaryDashSecurityHostsForAlarmRequest' => [GetSecurityEventSummaryDashSecurityHostsForAlarmRequest::class, [], 'GET', '/policy/security-event-summary/dash-security-hosts-for-alarm', 'raw', null, false, false],
    'Policy\\SecurityEventSummary\\GetSecurityEventSummaryHostsTopRequest' => [GetSecurityEventSummaryHostsTopRequest::class, [], 'GET', '/policy/security-event-summary/hosts/top', 'one', SecurityEventSummaryHostsTop::class, false, false],
    'Policy\\SecurityEventSummary\\GetSecurityEventSummaryHostsRemediatedRequest' => [GetSecurityEventSummaryHostsRemediatedRequest::class, [], 'GET', '/policy/security-event-summary/hosts/remediated', 'raw', null, false, false],
    'Policy\\SecurityEventSummary\\GetSecurityEventSummaryStatisticsRequest' => [GetSecurityEventSummaryStatisticsRequest::class, [], 'GET', '/policy/security-event-summary/statistics', 'one', SecurityEventSummaryStatistics::class, false, false],
    'Policy\\SecurityEvent\\GetSecurityEventsRequest' => [GetSecurityEventsRequest::class, [], 'GET', '/policy/security-event', 'list', SecurityEvent::class, false, true],
    'Policy\\SecurityEvent\\GetSecurityEventRequest' => [GetSecurityEventRequest::class, [7], 'GET', '/policy/security-event/7', 'one', SecurityEvent::class, false, false],
    'Policy\\SecurityEvent\\GetSecurityEventMonitorRequest' => [GetSecurityEventMonitorRequest::class, [7], 'GET', '/policy/security-event/7/monitor', 'one', null, false, false],
    'Policy\\SecurityEvent\\PostSecurityEventMonitorStopRequest' => [PostSecurityEventMonitorStopRequest::class, [7], 'POST', '/policy/security-event/7/monitor/stop', 'one', null, false, false],
    'Policy\\SecurityEvent\\StartSecurityEventMonitorRequest' => [StartSecurityEventMonitorRequest::class, [], 'POST', '/policy/security-event/monitor/start', 'list', SecurityEvent::class, false, false],
    'Policy\\SecurityRuleTrigger\\GetSecurityRuleTriggersRequest' => [GetSecurityRuleTriggersRequest::class, [], 'GET', '/policy/security-rule-trigger', 'list', SecurityRuleTrigger::class, false, true],
    'Policy\\SecurityRuleTrigger\\GetSecurityRuleTriggerUsageRequest' => [GetSecurityRuleTriggerUsageRequest::class, [7], 'GET', '/policy/security-rule-trigger/7/usage', 'list', null, false, true],
    'Policy\\SecurityRuleTrigger\\GetSecurityRuleTriggerRequest' => [GetSecurityRuleTriggerRequest::class, [7], 'GET', '/policy/security-rule-trigger/7', 'one', SecurityRuleTrigger::class, false, false],
    'Policy\\SecurityRuleTrigger\\CreateSecurityRuleTriggerRequest' => [CreateSecurityRuleTriggerRequest::class, [['name' => 'x']], 'POST', '/policy/security-rule-trigger', 'scalar', null, true, false],
    'Policy\\SecurityRuleTrigger\\DeleteSecurityRuleTriggerViaPostRequest' => [DeleteSecurityRuleTriggerViaPostRequest::class, [7], 'POST', '/policy/security-rule-trigger/7/delete', 'one', null, false, false],
    'Policy\\SecurityRuleTrigger\\DeleteManySecurityRuleTriggersRequest' => [DeleteManySecurityRuleTriggersRequest::class, [], 'POST', '/policy/security-rule-trigger/delete', 'one', null, false, false],
    'Policy\\SecurityRuleTrigger\\UpdateSecurityRuleTriggerRequest' => [UpdateSecurityRuleTriggerRequest::class, [7, ['name' => 'x']], 'POST', '/policy/security-rule-trigger/7', 'one', SecurityRuleTrigger::class, true, false],
    'Policy\\SecurityRuleTrigger\\DeleteSecurityRuleTriggerRequest' => [DeleteSecurityRuleTriggerRequest::class, [7], 'DELETE', '/policy/security-rule-trigger/7', 'none', null, false, false],
    'Policy\\SecurityRule\\GetSecurityRulesRequest' => [GetSecurityRulesRequest::class, [], 'GET', '/policy/security-rule', 'list', SecurityRule::class, false, true],
    'Policy\\SecurityRule\\GetSecurityRuleRequest' => [GetSecurityRuleRequest::class, [7], 'GET', '/policy/security-rule/7', 'one', SecurityRule::class, false, false],
    'Policy\\SecurityRule\\CreateSecurityRuleRequest' => [CreateSecurityRuleRequest::class, [['name' => 'x']], 'POST', '/policy/security-rule', 'one', SecurityRule::class, true, false],
    'Policy\\SecurityRule\\DeleteManySecurityRulesRequest' => [DeleteManySecurityRulesRequest::class, [], 'POST', '/policy/security-rule/delete', 'one', null, false, false],
    'Policy\\SecurityRule\\DisableSecurityRuleRequest' => [DisableSecurityRuleRequest::class, [7], 'POST', '/policy/security-rule/7/disable', 'one', null, false, false],
    'Policy\\SecurityRule\\EnableSecurityRuleRequest' => [EnableSecurityRuleRequest::class, [7], 'POST', '/policy/security-rule/7/enable', 'one', null, false, false],
    'Policy\\SecurityRule\\DeleteSecurityRuleViaPostRequest' => [DeleteSecurityRuleViaPostRequest::class, [7], 'POST', '/policy/security-rule/7/delete', 'one', null, false, false],
    'Policy\\SecurityRule\\UpdateSecurityRuleRequest' => [UpdateSecurityRuleRequest::class, [7, ['name' => 'x']], 'POST', '/policy/security-rule/7', 'one', SecurityRule::class, true, false],
    'Policy\\SecurityRule\\SetSecurityRuleRankRequest' => [SetSecurityRuleRankRequest::class, [], 'POST', '/policy/security-rule/rank/set', 'one', null, false, false],
    'Policy\\SecurityRule\\SwapSecurityRuleRanksRequest' => [SwapSecurityRuleRanksRequest::class, [], 'POST', '/policy/security-rule/rank/swap', 'one', null, false, false],
    'Policy\\SecurityRule\\DeleteSecurityRuleRequest' => [DeleteSecurityRuleRequest::class, [7], 'DELETE', '/policy/security-rule/7', 'none', null, false, false],
    'Policy\\SupplicantConfiguration\\GetSupplicantConfigurationRequest' => [GetSupplicantConfigurationRequest::class, [7], 'GET', '/policy/supplicant-configuration/7', 'one', SupplicantConfiguration::class, false, false],
    'Policy\\SupplicantConfiguration\\GetSupplicantConfigurationsRequest' => [GetSupplicantConfigurationsRequest::class, [], 'GET', '/policy/supplicant-configuration', 'list', SupplicantConfiguration::class, false, true],
    'Policy\\SupplicantConfiguration\\GetSupplicantConfigurationUsageRequest' => [GetSupplicantConfigurationUsageRequest::class, [7], 'GET', '/policy/supplicant-configuration/7/usage', 'list', null, false, false],
    'Policy\\SupplicantConfiguration\\GetSupplicantConfigurationSupportingInfoRequest' => [GetSupplicantConfigurationSupportingInfoRequest::class, [], 'GET', '/policy/supplicant-configuration/supporting-info', 'one', null, false, false],
    'Policy\\SupplicantConfiguration\\CreateSupplicantConfigurationRequest' => [CreateSupplicantConfigurationRequest::class, [['name' => 'x']], 'POST', '/policy/supplicant-configuration', 'one', SupplicantConfiguration::class, true, false],
    'Policy\\SupplicantConfiguration\\DeleteManySupplicantConfigurationsRequest' => [DeleteManySupplicantConfigurationsRequest::class, [], 'POST', '/policy/supplicant-configuration/delete', 'one', null, false, false],
    'Policy\\SupplicantConfiguration\\UpdateSupplicantConfigurationRequest' => [UpdateSupplicantConfigurationRequest::class, [7, ['name' => 'x']], 'POST', '/policy/supplicant-configuration/7', 'one', SupplicantConfiguration::class, true, false],
    'Policy\\SupplicantConfiguration\\DeleteSupplicantConfigurationViaPostRequest' => [DeleteSupplicantConfigurationViaPostRequest::class, [7], 'POST', '/policy/supplicant-configuration/7/delete', 'one', null, false, false],
    'Policy\\SupplicantConfiguration\\DeleteSupplicantConfigurationRequest' => [DeleteSupplicantConfigurationRequest::class, [7], 'DELETE', '/policy/supplicant-configuration/7', 'none', null, false, false],
    'Policy\\SupplicantPolicy\\GetSupplicantPoliciesRequest' => [GetSupplicantPoliciesRequest::class, [], 'GET', '/policy/supplicant', 'list', SupplicantPolicy::class, false, true],
    'Policy\\SupplicantPolicy\\GetSupplicantPolicyRequest' => [GetSupplicantPolicyRequest::class, [7], 'GET', '/policy/supplicant/7', 'one', SupplicantPolicy::class, false, false],
    'Policy\\SupplicantPolicy\\GetSupplicantPolicySupportingInfoRequest' => [GetSupplicantPolicySupportingInfoRequest::class, [], 'GET', '/policy/supplicant/supporting-info', 'one', null, false, false],
    'Policy\\SupplicantPolicy\\CreateSupplicantPolicyRequest' => [CreateSupplicantPolicyRequest::class, [['name' => 'x']], 'POST', '/policy/supplicant', 'one', SupplicantPolicy::class, true, false],
    'Policy\\SupplicantPolicy\\DeleteManySupplicantPoliciesRequest' => [DeleteManySupplicantPoliciesRequest::class, [], 'POST', '/policy/supplicant/delete', 'one', null, false, false],
    'Policy\\SupplicantPolicy\\DisableManySupplicantPoliciesRequest' => [DisableManySupplicantPoliciesRequest::class, [], 'POST', '/policy/supplicant/disable', 'one', null, false, false],
    'Policy\\SupplicantPolicy\\EnableManySupplicantPoliciesRequest' => [EnableManySupplicantPoliciesRequest::class, [], 'POST', '/policy/supplicant/enable', 'one', null, false, false],
    'Policy\\SupplicantPolicy\\UpdateSupplicantPolicyRequest' => [UpdateSupplicantPolicyRequest::class, [7, ['name' => 'x']], 'POST', '/policy/supplicant/7', 'one', SupplicantPolicy::class, true, false],
    'Policy\\SupplicantPolicy\\DeleteSupplicantPolicyViaPostRequest' => [DeleteSupplicantPolicyViaPostRequest::class, [7], 'POST', '/policy/supplicant/7/delete', 'one', null, false, false],
    'Policy\\SupplicantPolicy\\DisableSupplicantPolicyRequest' => [DisableSupplicantPolicyRequest::class, [7], 'POST', '/policy/supplicant/7/disable', 'one', null, false, false],
    'Policy\\SupplicantPolicy\\EnableSupplicantPolicyRequest' => [EnableSupplicantPolicyRequest::class, [7], 'POST', '/policy/supplicant/7/enable', 'one', null, false, false],
    'Policy\\SupplicantPolicy\\SetSupplicantPolicyRankRequest' => [SetSupplicantPolicyRankRequest::class, [], 'POST', '/policy/supplicant/rank/set', 'one', null, false, false],
    'Policy\\SupplicantPolicy\\SwapSupplicantPolicyRanksRequest' => [SwapSupplicantPolicyRanksRequest::class, [], 'POST', '/policy/supplicant/rank/swap', 'one', null, false, false],
    'Policy\\SupplicantPolicy\\DeleteSupplicantPolicyRequest' => [DeleteSupplicantPolicyRequest::class, [7], 'DELETE', '/policy/supplicant/7', 'none', null, false, false],
    'Policy\\UserHostProfile\\GetUserHostProfilesRequest' => [GetUserHostProfilesRequest::class, [], 'GET', '/policy/user-host-profile', 'list', UserHostProfile::class, false, true],
    'Policy\\UserHostProfile\\GetUserHostProfileRequest' => [GetUserHostProfileRequest::class, [7], 'GET', '/policy/user-host-profile/7', 'one', UserHostProfile::class, false, false],
    'Policy\\UserHostProfile\\GetUserHostProfileUsageRequest' => [GetUserHostProfileUsageRequest::class, [7], 'GET', '/policy/user-host-profile/7/usage', 'list', null, false, false],
    'Policy\\UserHostProfile\\GetUserHostProfileSupportingInfoRequest' => [GetUserHostProfileSupportingInfoRequest::class, [], 'GET', '/policy/user-host-profile/supporting-info', 'one', null, false, false],
    'Policy\\UserHostProfile\\CreateUserHostProfileRequest' => [CreateUserHostProfileRequest::class, [['name' => 'x']], 'POST', '/policy/user-host-profile', 'one', UserHostProfile::class, true, false],
    'Policy\\UserHostProfile\\UpdateUserHostProfileRequest' => [UpdateUserHostProfileRequest::class, [7, ['name' => 'x']], 'POST', '/policy/user-host-profile/7', 'one', UserHostProfile::class, true, false],
    'Policy\\UserHostProfile\\DeleteManyUserHostProfilesRequest' => [DeleteManyUserHostProfilesRequest::class, [], 'POST', '/policy/user-host-profile/delete', 'one', null, false, false],
    'Policy\\UserHostProfile\\DeleteUserHostProfileViaPostRequest' => [DeleteUserHostProfileViaPostRequest::class, [7], 'POST', '/policy/user-host-profile/7/delete', 'one', null, false, false],
    'Policy\\UserHostProfile\\DeleteUserHostProfileRequest' => [DeleteUserHostProfileRequest::class, [7], 'DELETE', '/policy/user-host-profile/7', 'none', null, false, false],
    'Portal\\PortalSslSettings\\GetPortalSslSettingsRequest' => [GetPortalSslSettingsRequest::class, [], 'GET', '/portal/settings/ssl', 'one', PortalSslSettings::class, false, false],
    'Portal\\PortalSslSettings\\UpdatePortalSslSettingsRequest' => [UpdatePortalSslSettingsRequest::class, [['name' => 'x']], 'POST', '/portal/settings/ssl', 'one', PortalSslSettings::class, true, false],
    'Radius\\RadiusAttributeGroup\\GetRadiusAttributeGroupsRequest' => [GetRadiusAttributeGroupsRequest::class, [], 'GET', '/radius/attrgroups', 'list', RadiusAttributeGroup::class, false, true],
    'Radius\\RadiusAttributeGroup\\GetRadiusAttributeGroupModelcfgByDeviceIdRequest' => [GetRadiusAttributeGroupModelcfgByDeviceIdRequest::class, [7], 'GET', '/radius/attrgroups/modelcfg/7', 'raw', null, false, false],
    'Radius\\RadiusAttributeGroup\\GetRadiusAttributeGroupRequest' => [GetRadiusAttributeGroupRequest::class, [7], 'GET', '/radius/attrgroups/7', 'one', RadiusAttributeGroup::class, false, false],
    'Radius\\RadiusAttributeGroup\\GetRadiusAttributeGroupNameByGroupNameRequest' => [GetRadiusAttributeGroupNameByGroupNameRequest::class, ['sample'], 'GET', '/radius/attrgroups/name/sample', 'list', RadiusAttributeGroup::class, false, true],
    'Radius\\RadiusAttributeGroup\\GetRadiusAttributeGroupUsageRequest' => [GetRadiusAttributeGroupUsageRequest::class, [7], 'GET', '/radius/attrgroups/7/usage', 'scalar', null, false, false],
    'Radius\\RadiusAttributeGroup\\GetRadiusAttributeGroupListRequest' => [GetRadiusAttributeGroupListRequest::class, [], 'GET', '/radius/attrgroups/list', 'list', null, false, true],
    'Radius\\RadiusAttributeGroup\\GetRadiusAttributeGroupResponsevaluesByLogicalNetworkAttrGrpIdRequest' => [GetRadiusAttributeGroupResponsevaluesByLogicalNetworkAttrGrpIdRequest::class, [7, 7], 'GET', '/radius/attrgroups/responsevalues/7/7', 'scalar', null, false, false],
    'Radius\\RadiusAttributeGroup\\CreateRadiusAttributeGroupRequest' => [CreateRadiusAttributeGroupRequest::class, [['name' => 'x']], 'POST', '/radius/attrgroups', 'one', RadiusAttributeGroup::class, true, false],
    'Radius\\RadiusAttributeGroup\\DeleteManyRadiusAttributeGroupsRequest' => [DeleteManyRadiusAttributeGroupsRequest::class, [], 'POST', '/radius/attrgroups/delete', 'scalar', null, false, false],
    'Radius\\RadiusAttributeGroup\\PostRadiusAttributeGroupModelcfgByAttrGroupIdRequest' => [PostRadiusAttributeGroupModelcfgByAttrGroupIdRequest::class, [7, 7], 'POST', '/radius/attrgroups/modelcfg/7/7', 'scalar', null, false, false],
    'Radius\\RadiusAttributeGroup\\UpdateRadiusAttributeGroupRequest' => [UpdateRadiusAttributeGroupRequest::class, [7, ['name' => 'x']], 'POST', '/radius/attrgroups/7', 'one', RadiusAttributeGroup::class, true, false],
    'Radius\\RadiusAttributeGroup\\DeleteRadiusAttributeGroupRequest' => [DeleteRadiusAttributeGroupRequest::class, [7], 'DELETE', '/radius/attrgroups/7', 'none', null, false, false],
    'Radius\\RadiusAttributeGroup\\DeleteRadiusAttributeGroupModelcfgByDeviceIdRequest' => [DeleteRadiusAttributeGroupModelcfgByDeviceIdRequest::class, [7], 'DELETE', '/radius/attrgroups/modelcfg/7', 'none', null, false, false],
    'Radius\\RadiusDictionaryAttribute\\GetRadiusDictionaryAttributesRequest' => [GetRadiusDictionaryAttributesRequest::class, [], 'GET', '/radius/dictionary', 'list', RadiusDictionaryAttribute::class, false, true],
    'Radius\\RadiusDictionaryAttribute\\GetRadiusDictionaryAttributeAttributeByNameRequest' => [GetRadiusDictionaryAttributeAttributeByNameRequest::class, ['sample'], 'GET', '/radius/dictionary/attribute/sample', 'one', RadiusDictionaryAttribute::class, false, false],
    'Radius\\RadiusDictionaryAttribute\\CreateRadiusDictionaryAttributeRequest' => [CreateRadiusDictionaryAttributeRequest::class, [['name' => 'x']], 'POST', '/radius/dictionary', 'one', RadiusDictionaryAttribute::class, true, false],
    'Radius\\RadiusDictionaryAttribute\\DeleteManyRadiusDictionaryAttributesRequest' => [DeleteManyRadiusDictionaryAttributesRequest::class, [], 'POST', '/radius/dictionary/delete', 'one', null, false, false],
    'Radius\\RadiusDictionaryAttribute\\UpdateRadiusDictionaryAttributeRequest' => [UpdateRadiusDictionaryAttributeRequest::class, [7, ['name' => 'x']], 'POST', '/radius/dictionary/7', 'one', RadiusDictionaryAttribute::class, true, false],
    'Radius\\RadiusDictionaryAttribute\\DeleteRadiusDictionaryAttributeRequest' => [DeleteRadiusDictionaryAttributeRequest::class, [7], 'DELETE', '/radius/dictionary/7', 'none', null, false, false],
    'Radius\\RadiusHealth\\GetRadiusHealthRequest' => [GetRadiusHealthRequest::class, [], 'GET', '/radius/radius-health', 'list', RadiusHealth::class, false, true],
    'Radius\\RadiusHealth\\GetRadiusHealth2Request' => [GetRadiusHealth2Request::class, [], 'GET', '/radius/radius-health-details', 'list', RadiusHealth::class, false, true],
    'Radius\\RadiusHealth\\GetRadiusHealthTimelineRequest' => [GetRadiusHealthTimelineRequest::class, [], 'GET', '/radius/radius-health/timeline', 'list', RadiusHealthTimeline::class, false, true],
    'Radius\\RadiusHealth\\GetRadiusHealthLatestRequest' => [GetRadiusHealthLatestRequest::class, [], 'GET', '/radius/radius-health/latest', 'list', RadiusHealthTimeline::class, false, true],
    'Radius\\RadiusHealth\\GetRadiusHealthSnapshotIntervalRequest' => [GetRadiusHealthSnapshotIntervalRequest::class, [], 'GET', '/radius/radius-health/snapshot-interval', 'scalar', null, false, false],
    'Radius\\RadiusServer\\GetRadiusServerActivityStatusRequest' => [GetRadiusServerActivityStatusRequest::class, [], 'GET', '/radius/radius-server-config/activityStatus', 'scalar', null, false, false],
    'Radius\\RadiusServer\\GetRadiusServerEapTypesRequest' => [GetRadiusServerEapTypesRequest::class, [], 'GET', '/radius/radius-server-config/eap-types', 'raw', null, false, false],
    'Radius\\RadiusServer\\GetRadiusServerGlobalRequest' => [GetRadiusServerGlobalRequest::class, [], 'GET', '/radius/radius-server-config/global', 'one', RadiusServerGlobal::class, false, false],
    'Radius\\RadiusServer\\GetRadiusServerRequest' => [GetRadiusServerRequest::class, [7], 'GET', '/radius/radius-server-config/7', 'one', RadiusServer::class, false, false],
    'Radius\\RadiusServer\\GetRadiusServerStatusRequest' => [GetRadiusServerStatusRequest::class, [], 'GET', '/radius/radius-server-config/status', 'one', null, false, false],
    'Radius\\RadiusServer\\GetRadiusServersRequest' => [GetRadiusServersRequest::class, [], 'GET', '/radius/radius-server-config', 'list', RadiusServer::class, false, true],
    'Radius\\RadiusServer\\GetRadiusServerLogRequest' => [GetRadiusServerLogRequest::class, [], 'GET', '/radius/radius-server-config/log', 'raw', null, false, false],
    'Radius\\RadiusServer\\DeleteManyRadiusServersRequest' => [DeleteManyRadiusServersRequest::class, [], 'POST', '/radius/radius-server-config/delete', 'one', null, false, false],
    'Radius\\RadiusServer\\DisableManyRadiusServersRequest' => [DisableManyRadiusServersRequest::class, [], 'POST', '/radius/radius-server-config/disable', 'one', null, false, false],
    'Radius\\RadiusServer\\EnableManyRadiusServersRequest' => [EnableManyRadiusServersRequest::class, [], 'POST', '/radius/radius-server-config/enable', 'one', null, false, false],
    'Radius\\RadiusServer\\UpdateRadiusServerRequest' => [UpdateRadiusServerRequest::class, [7, ['name' => 'x']], 'POST', '/radius/radius-server-config/7', 'list', RadiusServer::class, true, false],
    'Radius\\RadiusServer\\PostRadiusServerNasFixstaleByIdRequest' => [PostRadiusServerNasFixstaleByIdRequest::class, [7], 'POST', '/radius/radius-server-config/nas/fixstale/7', 'one', RadiusServer::class, false, false],
    'Radius\\RadiusServer\\PostRadiusServerGlobalRequest' => [PostRadiusServerGlobalRequest::class, [['name' => 'x']], 'POST', '/radius/radius-server-config/global', 'one', RadiusServerGlobalResult::class, true, false],
    'Radius\\RadiusServer\\CreateRadiusServerRequest' => [CreateRadiusServerRequest::class, [['name' => 'x']], 'POST', '/radius/radius-server-config', 'one', RadiusServer::class, true, false],
    'Radius\\RadiusServer\\DeleteRadiusServerRequest' => [DeleteRadiusServerRequest::class, [7], 'DELETE', '/radius/radius-server-config/7', 'none', null, false, false],
    'Settings\\AgentUpdate\\GetAgentUpdateRequest' => [GetAgentUpdateRequest::class, [], 'GET', '/settings/agent/agent-update', 'one', AgentUpdate::class, false, false],
    'Settings\\AgentUpdate\\UpdateAgentUpdateRequest' => [UpdateAgentUpdateRequest::class, [['name' => 'x']], 'POST', '/settings/agent/agent-update', 'one', AgentUpdate::class, true, false],
    'Settings\\AgentUpdate\\ResetAgentUpdateCounterRequest' => [ResetAgentUpdateCounterRequest::class, [], 'POST', '/settings/agent/agent-update/reset-counter', 'one', null, false, false],
    'Settings\\AgentPackage\\GetAgentPackagesRequest' => [GetAgentPackagesRequest::class, [], 'GET', '/settings/agent/agent-packages', 'list', AgentPackage::class, false, true],
    'Settings\\AgentPackage\\GetAgentPackageAvailableAgentsRequest' => [GetAgentPackageAvailableAgentsRequest::class, [], 'GET', '/settings/agent/agent-packages/available-agents', 'one', null, false, false],
    'Settings\\AgentPackage\\DeleteAgentPackageViaPostRequest' => [DeleteAgentPackageViaPostRequest::class, ['sample'], 'POST', '/settings/agent/agent-packages/sample/delete', 'one', null, false, false],
    'Settings\\AgentPackage\\DeleteAgentPackageRequest' => [DeleteAgentPackageRequest::class, ['sample'], 'DELETE', '/settings/agent/agent-packages/sample', 'none', null, false, false],
    'Settings\\CredentialConfig\\GetCredentialConfigRequest' => [GetCredentialConfigRequest::class, [], 'GET', '/settings/agent/credential-config', 'one', CredentialConfig::class, false, false],
    'Settings\\CredentialConfig\\UpdateCredentialConfigRequest' => [UpdateCredentialConfigRequest::class, [['name' => 'x']], 'POST', '/settings/agent/credential-config', 'one', CredentialConfig::class, true, false],
    'Settings\\DirectoryAgent\\DeleteDirectoryAgentRequest' => [DeleteDirectoryAgentRequest::class, [7], 'DELETE', '/settings/agent/directory-agent/7', 'none', null, false, false],
    'Settings\\DirectoryAgent\\GetDirectoryAgentsRequest' => [GetDirectoryAgentsRequest::class, [], 'GET', '/settings/agent/directory-agent', 'list', DirectoryAgent::class, false, true],
    'Settings\\DirectoryAgent\\GetDirectoryAgentDirectoryGroupsRequest' => [GetDirectoryAgentDirectoryGroupsRequest::class, [], 'GET', '/settings/agent/directory-agent/directory-groups', 'raw', null, false, false],
    'Settings\\DirectoryAgent\\GetDirectoryAgentGroupsRequest' => [GetDirectoryAgentGroupsRequest::class, [], 'GET', '/settings/agent/directory-agent/groups', 'list', null, false, true],
    'Settings\\DirectoryAgent\\GetDirectoryAgentRequest' => [GetDirectoryAgentRequest::class, [7], 'GET', '/settings/agent/directory-agent/7', 'one', DirectoryAgent::class, false, false],
    'Settings\\DirectoryAgent\\GetDirectoryAgentUsageRequest' => [GetDirectoryAgentUsageRequest::class, [7], 'GET', '/settings/agent/directory-agent/7/usage', 'list', null, false, false],
    'Settings\\DirectoryAgent\\GetDirectoryAgentSubnetRequest' => [GetDirectoryAgentSubnetRequest::class, [], 'GET', '/settings/agent/directory-agent/subnet', 'raw', null, false, false],
    'Settings\\DirectoryAgent\\GetDirectoryAgentSubnetTestRequest' => [GetDirectoryAgentSubnetTestRequest::class, [], 'GET', '/settings/agent/directory-agent/subnet/test', 'raw', null, false, false],
    'Settings\\DirectoryAgent\\CreateDirectoryAgentRequest' => [CreateDirectoryAgentRequest::class, [['name' => 'x']], 'POST', '/settings/agent/directory-agent', 'one', DirectoryAgent::class, true, false],
    'Settings\\DirectoryAgent\\DeleteManyDirectoryAgentsRequest' => [DeleteManyDirectoryAgentsRequest::class, [], 'POST', '/settings/agent/directory-agent/delete', 'one', null, false, false],
    'Settings\\DirectoryAgent\\UpdateDirectoryAgentRequest' => [UpdateDirectoryAgentRequest::class, [7, ['name' => 'x']], 'POST', '/settings/agent/directory-agent/7', 'one', DirectoryAgent::class, true, false],
    'Settings\\DirectoryAgent\\DeleteDirectoryAgentViaPostRequest' => [DeleteDirectoryAgentViaPostRequest::class, [7], 'POST', '/settings/agent/directory-agent/7/delete', 'one', null, false, false],
    'Settings\\DirectoryAgent\\PostDirectoryAgentSubnetRequest' => [PostDirectoryAgentSubnetRequest::class, [], 'POST', '/settings/agent/directory-agent/subnet', 'one', null, false, false],
    'Settings\\DirectoryAgent\\DisableDirectoryAgentRequest' => [DisableDirectoryAgentRequest::class, [7], 'POST', '/settings/agent/directory-agent/7/disable', 'one', null, false, false],
    'Settings\\DirectoryAgent\\TestDirectoryAgentRequest' => [TestDirectoryAgentRequest::class, [], 'POST', '/settings/agent/directory-agent/test', 'one', null, false, false],
    'Settings\\DirectoryAgent\\SwapDirectoryAgentRanksRequest' => [SwapDirectoryAgentRanksRequest::class, [], 'POST', '/settings/agent/directory-agent/rank/swap', 'one', null, false, false],
    'Settings\\DirectoryAgent\\PostDirectoryAgentSubnetDeleteRequest' => [PostDirectoryAgentSubnetDeleteRequest::class, [['name' => 'x']], 'POST', '/settings/agent/directory-agent/subnet/delete', 'one', null, true, false],
    'Settings\\DirectoryAgent\\SetDirectoryAgentRankRequest' => [SetDirectoryAgentRankRequest::class, [], 'POST', '/settings/agent/directory-agent/rank/set', 'one', null, false, false],
    'Settings\\DirectoryAgent\\EnableDirectoryAgentRequest' => [EnableDirectoryAgentRequest::class, [7], 'POST', '/settings/agent/directory-agent/7/enable', 'one', null, false, false],
    'Settings\\PaPacketTransportConfig\\GetPaPacketTransportConfigsRequest' => [GetPaPacketTransportConfigsRequest::class, [], 'GET', '/settings/agent/pa-packet-transport-config', 'list', PaPacketTransportConfig::class, false, true],
    'Settings\\PaPacketTransportConfig\\GetPaPacketTransportConfigUsageRequest' => [GetPaPacketTransportConfigUsageRequest::class, [7], 'GET', '/settings/agent/pa-packet-transport-config/7/usage', 'list', null, false, false],
    'Settings\\PaPacketTransportConfig\\GetPaPacketTransportConfigPerformanceRequest' => [GetPaPacketTransportConfigPerformanceRequest::class, [], 'GET', '/settings/agent/pa-packet-transport-config/performance', 'raw', null, false, false],
    'Settings\\PaPacketTransportConfig\\GetPaPacketTransportConfigRequest' => [GetPaPacketTransportConfigRequest::class, [7], 'GET', '/settings/agent/pa-packet-transport-config/7', 'one', PaPacketTransportConfig::class, false, false],
    'Settings\\PaPacketTransportConfig\\CreatePaPacketTransportConfigRequest' => [CreatePaPacketTransportConfigRequest::class, [['name' => 'x']], 'POST', '/settings/agent/pa-packet-transport-config', 'one', PaPacketTransportConfig::class, true, false],
    'Settings\\PaPacketTransportConfig\\DeleteManyPaPacketTransportConfigsRequest' => [DeleteManyPaPacketTransportConfigsRequest::class, [], 'POST', '/settings/agent/pa-packet-transport-config/delete', 'one', null, false, false],
    'Settings\\PaPacketTransportConfig\\UpdatePaPacketTransportConfigRequest' => [UpdatePaPacketTransportConfigRequest::class, [7, ['name' => 'x']], 'POST', '/settings/agent/pa-packet-transport-config/7', 'one', PaPacketTransportConfig::class, true, false],
    'Settings\\PaPacketTransportConfig\\DeletePaPacketTransportConfigViaPostRequest' => [DeletePaPacketTransportConfigViaPostRequest::class, [7], 'POST', '/settings/agent/pa-packet-transport-config/7/delete', 'one', null, false, false],
    'Settings\\PaPacketTransportConfig\\DeployPaPacketTransportConfigRequest' => [DeployPaPacketTransportConfigRequest::class, [], 'POST', '/settings/agent/pa-packet-transport-config/deploy', 'one', null, false, false],
    'Settings\\PaPacketTransportConfig\\DeletePaPacketTransportConfigRequest' => [DeletePaPacketTransportConfigRequest::class, [7], 'DELETE', '/settings/agent/pa-packet-transport-config/7', 'none', null, false, false],
    'Settings\\AgentProperties\\GetAgentPropertiesRequest' => [GetAgentPropertiesRequest::class, [], 'GET', '/settings/agent/properties', 'one', AgentProperties::class, false, false],
    'Settings\\AgentProperties\\UpdateAgentPropertiesRequest' => [UpdateAgentPropertiesRequest::class, [['name' => 'x']], 'POST', '/settings/agent/properties', 'one', AgentProperties::class, true, false],
    'Settings\\StatusNotifications\\UpdateStatusNotificationsRequest' => [UpdateStatusNotificationsRequest::class, [['name' => 'x']], 'POST', '/settings/agent/status-notifications', 'one', StatusNotifications::class, true, false],
    'Settings\\StatusNotifications\\GetStatusNotificationsRequest' => [GetStatusNotificationsRequest::class, [], 'GET', '/settings/agent/status-notifications', 'one', StatusNotifications::class, false, false],
    'Settings\\AccessPointManagement\\GetAccessPointManagementRequest' => [GetAccessPointManagementRequest::class, [], 'GET', '/settings/device/access-point-management', 'list', AccessPointManagement::class, false, true],
    'Settings\\AllowedDomains\\GetAllowedDomainsRequest' => [GetAllowedDomainsRequest::class, [], 'GET', '/settings/device/allowed-domains', 'one', AllowedDomains::class, false, false],
    'Settings\\AllowedDomains\\UpdateAllowedDomainsRequest' => [UpdateAllowedDomainsRequest::class, [['name' => 'x']], 'POST', '/settings/device/allowed-domains', 'one', AllowedDomains::class, true, false],
    'Settings\\AllowedDomains\\ResetAllowedDomainsRequest' => [ResetAllowedDomainsRequest::class, [], 'POST', '/settings/device/allowed-domains/reset', 'one', null, false, false],
    'Settings\\DeviceProfilerSettings\\GetDeviceProfilerSettingsRequest' => [GetDeviceProfilerSettingsRequest::class, [], 'GET', '/settings/device/device-profiler', 'one', DeviceProfilerSettings::class, false, false],
    'Settings\\DeviceProfilerSettings\\UpdateDeviceProfilerSettingsRequest' => [UpdateDeviceProfilerSettingsRequest::class, [], 'POST', '/settings/device/device-profiler', 'one', DeviceProfilerSettings::class, false, false],
    'Settings\\DeviceType\\DeleteDeviceTypeRequest' => [DeleteDeviceTypeRequest::class, [7], 'DELETE', '/settings/device/device-type/7', 'none', null, false, false],
    'Settings\\DeviceType\\GetDeviceTypesRequest' => [GetDeviceTypesRequest::class, [], 'GET', '/settings/device/device-type', 'list', DeviceType::class, false, true],
    'Settings\\DeviceType\\GetDeviceTypeRequest' => [GetDeviceTypeRequest::class, [7], 'GET', '/settings/device/device-type/7', 'one', DeviceType::class, false, false],
    'Settings\\DeviceType\\GetDeviceTypeUsageRequest' => [GetDeviceTypeUsageRequest::class, [7], 'GET', '/settings/device/device-type/7/usage', 'list', null, false, false],
    'Settings\\DeviceType\\GetDeviceTypeImageArchiveRequest' => [GetDeviceTypeImageArchiveRequest::class, [], 'GET', '/settings/device/device-type/image/archive', 'one', DeviceTypeImageArchive::class, false, false],
    'Settings\\DeviceType\\CreateDeviceTypeRequest' => [CreateDeviceTypeRequest::class, [['name' => 'x']], 'POST', '/settings/device/device-type', 'one', DeviceType::class, true, false],
    'Settings\\DeviceType\\CreateDeviceTypeFromArchiveRequest' => [CreateDeviceTypeFromArchiveRequest::class, [], 'POST', '/settings/device/device-type/createFromArchive', 'one', null, false, false],
    'Settings\\DeviceType\\DeleteManyDeviceTypesRequest' => [DeleteManyDeviceTypesRequest::class, [], 'POST', '/settings/device/device-type/delete', 'one', null, false, false],
    'Settings\\DeviceType\\UpdateDeviceTypeRequest' => [UpdateDeviceTypeRequest::class, [7, ['name' => 'x']], 'POST', '/settings/device/device-type/7', 'one', DeviceType::class, true, false],
    'Settings\\DeviceType\\DeleteDeviceTypeViaPostRequest' => [DeleteDeviceTypeViaPostRequest::class, [7], 'POST', '/settings/device/device-type/7/delete', 'one', null, false, false],
    'Settings\\MacExclusion\\GetMacExclusionsRequest' => [GetMacExclusionsRequest::class, [], 'GET', '/settings/device/mac-exclusion', 'list', MacExclusion::class, false, true],
    'Settings\\MacExclusion\\DeleteManyMacExclusionsRequest' => [DeleteManyMacExclusionsRequest::class, [], 'POST', '/settings/device/mac-exclusion/delete', 'one', null, false, false],
    'Settings\\MacExclusion\\CreateMacExclusionRequest' => [CreateMacExclusionRequest::class, [], 'POST', '/settings/device/mac-exclusion', 'one', MacExclusion::class, false, false],
    'Settings\\NatDetection\\GetNatDetectionRequest' => [GetNatDetectionRequest::class, [], 'GET', '/settings/device/NAT-detection', 'list', NatDetection::class, false, true],
    'Settings\\NatDetection\\PostNatDetectionIpRangesRequest' => [PostNatDetectionIpRangesRequest::class, [], 'POST', '/settings/device/NAT-detection/ip-ranges', 'one', null, false, false],
    'Settings\\NatDetection\\PostNatDetectionIpRangesDeleteRequest' => [PostNatDetectionIpRangesDeleteRequest::class, [], 'POST', '/settings/device/NAT-detection/ip-ranges/delete', 'one', null, false, false],
    'Settings\\NatDetection\\PostNatDetectionIpRangesByIdRequest' => [PostNatDetectionIpRangesByIdRequest::class, [7], 'POST', '/settings/device/NAT-detection/ip-ranges/7', 'one', null, false, false],
    'Settings\\NetworkAddressGroup\\GetNetworkAddressGroupRequest' => [GetNetworkAddressGroupRequest::class, [7], 'GET', '/settings/device/network-address-group/7', 'one', NetworkAddressGroup::class, false, false],
    'Settings\\NetworkAddressGroup\\GetNetworkAddressGroupsRequest' => [GetNetworkAddressGroupsRequest::class, [], 'GET', '/settings/device/network-address-group', 'list', NetworkAddressGroup::class, false, true],
    'Settings\\NetworkAddressGroup\\GetNetworkAddressGroupUsageRequest' => [GetNetworkAddressGroupUsageRequest::class, [7], 'GET', '/settings/device/network-address-group/7/usage', 'list', null, false, false],
    'Settings\\NetworkAddressGroup\\DeleteManyNetworkAddressGroupsRequest' => [DeleteManyNetworkAddressGroupsRequest::class, [], 'POST', '/settings/device/network-address-group/delete', 'one', null, false, false],
    'Settings\\NetworkAddressGroup\\DeleteNetworkAddressGroupViaPostRequest' => [DeleteNetworkAddressGroupViaPostRequest::class, [7], 'POST', '/settings/device/network-address-group/7/delete', 'one', null, false, false],
    'Settings\\NetworkAddressGroup\\UpdateNetworkAddressGroupRequest' => [UpdateNetworkAddressGroupRequest::class, [7, ['name' => 'x']], 'POST', '/settings/device/network-address-group/7', 'one', NetworkAddressGroup::class, true, false],
    'Settings\\NetworkAddressGroup\\CreateNetworkAddressGroupRequest' => [CreateNetworkAddressGroupRequest::class, [['name' => 'x']], 'POST', '/settings/device/network-address-group', 'one', NetworkAddressGroup::class, true, false],
    'Settings\\NetworkAddressGroup\\DeleteNetworkAddressGroupRequest' => [DeleteNetworkAddressGroupRequest::class, [7], 'DELETE', '/settings/device/network-address-group/7', 'none', null, false, false],
    'Settings\\NetworkAddress\\GetNetworkAddressesRequest' => [GetNetworkAddressesRequest::class, [], 'GET', '/settings/device/network-address', 'list', NetworkAddress::class, false, true],
    'Settings\\NetworkAddress\\GetNetworkAddressRequest' => [GetNetworkAddressRequest::class, [7], 'GET', '/settings/device/network-address/7', 'one', NetworkAddress::class, false, false],
    'Settings\\NetworkAddress\\GetNetworkAddressUsageRequest' => [GetNetworkAddressUsageRequest::class, [7], 'GET', '/settings/device/network-address/7/usage', 'list', null, false, true],
    'Settings\\NetworkAddress\\DeleteManyNetworkAddressesRequest' => [DeleteManyNetworkAddressesRequest::class, [], 'POST', '/settings/device/network-address/delete', 'one', null, false, false],
    'Settings\\NetworkAddress\\UpdateNetworkAddressRequest' => [UpdateNetworkAddressRequest::class, [7, ['name' => 'x']], 'POST', '/settings/device/network-address/7', 'one', NetworkAddress::class, true, false],
    'Settings\\NetworkAddress\\DeleteNetworkAddressViaPostRequest' => [DeleteNetworkAddressViaPostRequest::class, [7], 'POST', '/settings/device/network-address/7/delete', 'one', null, false, false],
    'Settings\\NetworkAddress\\CreateNetworkAddressRequest' => [CreateNetworkAddressRequest::class, [['name' => 'x']], 'POST', '/settings/device/network-address', 'one', NetworkAddress::class, true, false],
    'Settings\\NetworkAddress\\DeleteNetworkAddressRequest' => [DeleteNetworkAddressRequest::class, [7], 'DELETE', '/settings/device/network-address/7', 'none', null, false, false],
    'Settings\\Quarantine\\GetQuarantineRequest' => [GetQuarantineRequest::class, [], 'GET', '/settings/device/quarantine', 'one', Quarantine::class, false, false],
    'Settings\\Quarantine\\UpdateQuarantineRequest' => [UpdateQuarantineRequest::class, [], 'POST', '/settings/device/quarantine', 'one', Quarantine::class, false, false],
    'Settings\\Quarantine\\MarkQuarantineAllHostsSafeRequest' => [MarkQuarantineAllHostsSafeRequest::class, [], 'POST', '/settings/device/quarantine/mark-all-hosts-safe', 'one', null, false, false],
    'Settings\\RogueDhcpDetection\\GetRogueDhcpDetectionRequest' => [GetRogueDhcpDetectionRequest::class, [], 'GET', '/settings/device/rogue-DHCP-detection', 'one', RogueDhcpDetection::class, false, false],
    'Settings\\RogueDhcpDetection\\GetRogueDhcpDetectionVlansRequest' => [GetRogueDhcpDetectionVlansRequest::class, [], 'GET', '/settings/device/rogue-DHCP-detection/vlans', 'one', RogueDhcpDetectionVlans::class, false, false],
    'Settings\\RogueDhcpDetection\\UpdateRogueDhcpDetectionRequest' => [UpdateRogueDhcpDetectionRequest::class, [], 'POST', '/settings/device/rogue-DHCP-detection', 'one', RogueDhcpDetection::class, false, false],
    'Settings\\RogueDhcpDetection\\PostRogueDhcpDetectionVlanRequest' => [PostRogueDhcpDetectionVlanRequest::class, [], 'POST', '/settings/device/rogue-DHCP-detection/vlan', 'one', null, false, false],
    'Settings\\RogueDhcpDetection\\PostRogueDhcpDetectionVlanDeleteRequest' => [PostRogueDhcpDetectionVlanDeleteRequest::class, [], 'POST', '/settings/device/rogue-DHCP-detection/vlan/delete', 'one', null, false, false],
    'Settings\\AaaMapping\\GetAaaMappingRequest' => [GetAaaMappingRequest::class, [], 'GET', '/settings/integration/aaa-mappings', 'one', null, false, false],
    'Settings\\AaaMapping\\GetAaaMappingLocalDomainsRequest' => [GetAaaMappingLocalDomainsRequest::class, [], 'GET', '/settings/integration/aaa-mappings/local-domains', 'raw', null, false, false],
    'Settings\\AaaMapping\\PostAaaMappingLocalDomainsDeleteRequest' => [PostAaaMappingLocalDomainsDeleteRequest::class, [], 'POST', '/settings/integration/aaa-mappings/local-domains/delete', 'one', null, false, false],
    'Settings\\AaaMapping\\GetAaaMappingDefaultsRequest' => [GetAaaMappingDefaultsRequest::class, [], 'GET', '/settings/integration/aaa-mappings/defaults', 'one', null, false, false],
    'Settings\\AaaMapping\\PostAaaMappingLocalDomainsRequest' => [PostAaaMappingLocalDomainsRequest::class, [], 'POST', '/settings/integration/aaa-mappings/local-domains', 'one', null, false, false],
    'Settings\\AaaMapping\\CreateAaaMappingRequest' => [CreateAaaMappingRequest::class, [], 'POST', '/settings/integration/aaa-mappings', 'one', null, false, false],
    'Settings\\AaaMapping\\PostAaaMappingDefaultsRequest' => [PostAaaMappingDefaultsRequest::class, [], 'POST', '/settings/integration/aaa-mappings/defaults', 'one', null, false, false],
    'Settings\\AaaMapping\\DeleteManyAaaMappingsRequest' => [DeleteManyAaaMappingsRequest::class, [['name' => 'x']], 'POST', '/settings/integration/aaa-mappings/delete', 'one', null, true, false],
    'Settings\\AaaMapping\\SwapAaaMappingRequest' => [SwapAaaMappingRequest::class, [['name' => 'x']], 'POST', '/settings/integration/aaa-mappings/swap', 'one', AaaMappingSwapAaaMapping::class, true, false],
    'Settings\\AaaServer\\DeleteAaaServerRequest' => [DeleteAaaServerRequest::class, [7], 'DELETE', '/settings/integration/aaa/7', 'none', null, false, false],
    'Settings\\AaaServer\\GetAaaServersRequest' => [GetAaaServersRequest::class, [], 'GET', '/settings/integration/aaa', 'list', AaaServer::class, false, true],
    'Settings\\AaaServer\\CountAaaServersRequest' => [CountAaaServersRequest::class, [], 'GET', '/settings/integration/aaa/count', 'scalar', null, false, false],
    'Settings\\AaaServer\\CountAllAaaServersRequest' => [CountAllAaaServersRequest::class, [], 'GET', '/settings/integration/aaa/count/all', 'scalar', null, false, false],
    'Settings\\AaaServer\\GetAaaServerRequest' => [GetAaaServerRequest::class, [7], 'GET', '/settings/integration/aaa/7', 'one', AaaServer::class, false, false],
    'Settings\\AaaServer\\GetAaaServerSecretRequest' => [GetAaaServerSecretRequest::class, [7], 'GET', '/settings/integration/aaa/7/secret', 'raw', null, false, false],
    'Settings\\AaaServer\\GetAaaServerSupportsValidationRequest' => [GetAaaServerSupportsValidationRequest::class, [], 'GET', '/settings/integration/aaa/supportsValidation', 'scalar', null, false, false],
    'Settings\\AaaServer\\GetAaaServerUsageRequest' => [GetAaaServerUsageRequest::class, [7], 'GET', '/settings/integration/aaa/7/usage', 'list', null, false, true],
    'Settings\\AaaServer\\GetAaaServerValidateUserPasswordRequest' => [GetAaaServerValidateUserPasswordRequest::class, [7], 'GET', '/settings/integration/aaa/7/validate-user-password', 'raw', null, false, false],
    'Settings\\AaaServer\\GetAaaServerValidateByIdRequest' => [GetAaaServerValidateByIdRequest::class, [7], 'GET', '/settings/integration/aaa/validate/7', 'one', AaaServerValidateById::class, false, false],
    'Settings\\AaaServer\\CreateAaaServerRequest' => [CreateAaaServerRequest::class, [['name' => 'x']], 'POST', '/settings/integration/aaa', 'one', AaaServer::class, true, false],
    'Settings\\AaaServer\\DeleteManyAaaServersRequest' => [DeleteManyAaaServersRequest::class, [], 'POST', '/settings/integration/aaa/delete', 'one', null, false, false],
    'Settings\\AaaServer\\DeleteAaaServerViaPostRequest' => [DeleteAaaServerViaPostRequest::class, [7], 'POST', '/settings/integration/aaa/7/delete', 'one', null, false, false],
    'Settings\\AaaServer\\UpdateAaaServerRequest' => [UpdateAaaServerRequest::class, [7, ['name' => 'x']], 'POST', '/settings/integration/aaa/7', 'one', AaaServer::class, true, false],
    'Settings\\AaaServer\\ValidateAaaServerRequest' => [ValidateAaaServerRequest::class, [['name' => 'x']], 'POST', '/settings/integration/aaa/validate', 'one', AaaServerValidateAaaServer::class, true, false],
    'Settings\\EmailSettings\\CreateEmailSettingsRequest' => [CreateEmailSettingsRequest::class, [], 'POST', '/settings/integration/email', 'one', EmailSettings::class, false, false],
    'Settings\\EmailSettings\\PostEmailSettingsPasswordRequest' => [PostEmailSettingsPasswordRequest::class, [], 'POST', '/settings/integration/email/password', 'one', null, false, false],
    'Settings\\EmailSettings\\DeleteManyEmailSettingsRequest' => [DeleteManyEmailSettingsRequest::class, [], 'POST', '/settings/integration/email/delete', 'one', null, false, false],
    'Settings\\EmailSettings\\TestEmailSettingsRequest' => [TestEmailSettingsRequest::class, [], 'POST', '/settings/integration/email/test', 'one', null, false, false],
    'Settings\\FirewallTag\\GetFirewallTagsRequest' => [GetFirewallTagsRequest::class, [], 'GET', '/settings/integration/firewall-tag', 'list', FirewallTag::class, false, true],
    'Settings\\FirewallTag\\GetFirewallTagRequest' => [GetFirewallTagRequest::class, [7], 'GET', '/settings/integration/firewall-tag/7', 'one', FirewallTag::class, false, false],
    'Settings\\FirewallTag\\GetFirewallTagUsageRequest' => [GetFirewallTagUsageRequest::class, [7], 'GET', '/settings/integration/firewall-tag/7/usage', 'list', null, false, false],
    'Settings\\FirewallTag\\UpdateFirewallTagRequest' => [UpdateFirewallTagRequest::class, [7, ['name' => 'x']], 'POST', '/settings/integration/firewall-tag/7', 'one', FirewallTag::class, true, false],
    'Settings\\FirewallTag\\CreateFirewallTagRequest' => [CreateFirewallTagRequest::class, [['name' => 'x']], 'POST', '/settings/integration/firewall-tag', 'one', FirewallTag::class, true, false],
    'Settings\\FirewallTag\\DeleteManyFirewallTagsRequest' => [DeleteManyFirewallTagsRequest::class, [], 'POST', '/settings/integration/firewall-tag/delete', 'one', null, false, false],
    'Settings\\FirewallTag\\DeleteFirewallTagViaPostRequest' => [DeleteFirewallTagViaPostRequest::class, [7], 'POST', '/settings/integration/firewall-tag/7/delete', 'one', null, false, false],
    'Settings\\FirewallTag\\DeleteFirewallTagRequest' => [DeleteFirewallTagRequest::class, [7], 'DELETE', '/settings/integration/firewall-tag/7', 'none', null, false, false],
    'Settings\\FssoSettings\\GetFssoSettingsRequest' => [GetFssoSettingsRequest::class, [], 'GET', '/settings/integration/FSSO', 'one', FssoSettings::class, false, false],
    'Settings\\FssoSettings\\GetFssoSettingsPasswordRequest' => [GetFssoSettingsPasswordRequest::class, [], 'GET', '/settings/integration/FSSO/password', 'raw', null, false, false],
    'Settings\\FssoSettings\\UpdateFssoSettingsRequest' => [UpdateFssoSettingsRequest::class, [], 'POST', '/settings/integration/FSSO', 'one', FssoSettings::class, false, false],
    'Settings\\GoogleSettings\\GetGoogleSettingsDomainsRequest' => [GetGoogleSettingsDomainsRequest::class, [], 'GET', '/settings/integration/google/domains', 'raw', null, false, false],
    'Settings\\GoogleSettings\\GetGoogleSettingsClientIdRequest' => [GetGoogleSettingsClientIdRequest::class, [], 'GET', '/settings/integration/google/client-id', 'one', null, false, false],
    'Settings\\GoogleSettings\\PostGoogleSettingsDomainsSetRequest' => [PostGoogleSettingsDomainsSetRequest::class, [], 'POST', '/settings/integration/google/domains/set', 'one', null, false, false],
    'Settings\\GoogleSettings\\PostGoogleSettingsClientIdRequest' => [PostGoogleSettingsClientIdRequest::class, [], 'POST', '/settings/integration/google/client-id', 'one', null, false, false],
    'Settings\\GoogleSettings\\PostGoogleSettingsDomainsByIdRequest' => [PostGoogleSettingsDomainsByIdRequest::class, [7], 'POST', '/settings/integration/google/domains/7', 'one', null, false, false],
    'Settings\\GoogleSettings\\PostGoogleSettingsDomainsDeleteRequest' => [PostGoogleSettingsDomainsDeleteRequest::class, [], 'POST', '/settings/integration/google/domains/delete', 'one', null, false, false],
    'Settings\\GoogleSettings\\PostGoogleSettingsDomainsRequest' => [PostGoogleSettingsDomainsRequest::class, [], 'POST', '/settings/integration/google/domains', 'one', null, false, false],
    'Settings\\LdapServer\\DeleteLdapServerRequest' => [DeleteLdapServerRequest::class, [7], 'DELETE', '/settings/integration/ldap/7', 'none', null, false, false],
    'Settings\\LdapServer\\GetLdapServersRequest' => [GetLdapServersRequest::class, [], 'GET', '/settings/integration/ldap', 'list', LdapServer::class, false, true],
    'Settings\\LdapServer\\CountLdapServersRequest' => [CountLdapServersRequest::class, [], 'GET', '/settings/integration/ldap/count', 'scalar', null, false, false],
    'Settings\\LdapServer\\CountAllLdapServersRequest' => [CountAllLdapServersRequest::class, [], 'GET', '/settings/integration/ldap/count/all', 'scalar', null, false, false],
    'Settings\\LdapServer\\GetLdapServerRequest' => [GetLdapServerRequest::class, [7], 'GET', '/settings/integration/ldap/7', 'one', LdapServer::class, false, false],
    'Settings\\LdapServer\\GetLdapServerUsageRequest' => [GetLdapServerUsageRequest::class, [7], 'GET', '/settings/integration/ldap/7/usage', 'list', null, false, true],
    'Settings\\LdapServer\\CreateLdapServerRequest' => [CreateLdapServerRequest::class, [['name' => 'x']], 'POST', '/settings/integration/ldap', 'one', LdapServer::class, true, false],
    'Settings\\LdapServer\\DeleteManyLdapServersRequest' => [DeleteManyLdapServersRequest::class, [], 'POST', '/settings/integration/ldap/delete', 'one', null, false, false],
    'Settings\\LdapServer\\UpdateLdapServerRequest' => [UpdateLdapServerRequest::class, [7, ['name' => 'x']], 'POST', '/settings/integration/ldap/7', 'one', LdapServer::class, true, false],
    'Settings\\LdapServer\\DeleteLdapServerViaPostRequest' => [DeleteLdapServerViaPostRequest::class, [7], 'POST', '/settings/integration/ldap/7/delete', 'one', null, false, false],
    'Settings\\LogReceiver\\GetLogReceiversRequest' => [GetLogReceiversRequest::class, [], 'GET', '/settings/integration/log-receiver', 'list', LogReceiver::class, false, true],
    'Settings\\LogReceiver\\UpdateLogReceiverRequest' => [UpdateLogReceiverRequest::class, [['name' => 'x']], 'POST', '/settings/integration/log-receiver', 'one', LogReceiver::class, true, false],
    'Settings\\LogReceiver\\DeleteManyLogReceiversRequest' => [DeleteManyLogReceiversRequest::class, [], 'POST', '/settings/integration/log-receiver/delete', 'one', null, false, false],
    'Settings\\MdmServer\\DeleteMdmServerRequest' => [DeleteMdmServerRequest::class, [7], 'DELETE', '/settings/integration/mdm/7', 'none', null, false, false],
    'Settings\\MdmServer\\GetMdmServersRequest' => [GetMdmServersRequest::class, [], 'GET', '/settings/integration/mdm', 'list', MdmServer::class, false, true],
    'Settings\\MdmServer\\GetMdmServerRequest' => [GetMdmServerRequest::class, [7], 'GET', '/settings/integration/mdm/7', 'one', MdmServer::class, false, false],
    'Settings\\MdmServer\\GetMdmServerPasswordRequest' => [GetMdmServerPasswordRequest::class, [7], 'GET', '/settings/integration/mdm/7/password', 'scalar', null, false, false],
    'Settings\\MdmServer\\GetMdmServerUsageRequest' => [GetMdmServerUsageRequest::class, [7], 'GET', '/settings/integration/mdm/7/usage', 'list', null, false, true],
    'Settings\\MdmServer\\CreateMdmServerRequest' => [CreateMdmServerRequest::class, [['name' => 'x']], 'POST', '/settings/integration/mdm', 'one', MdmServer::class, true, false],
    'Settings\\MdmServer\\DeleteManyMdmServersRequest' => [DeleteManyMdmServersRequest::class, [], 'POST', '/settings/integration/mdm/delete', 'one', null, false, false],
    'Settings\\MdmServer\\UpdateMdmServerRequest' => [UpdateMdmServerRequest::class, [7, ['name' => 'x']], 'POST', '/settings/integration/mdm/7', 'one', MdmServer::class, true, false],
    'Settings\\MdmServer\\AuthenticateMdmServerRequest' => [AuthenticateMdmServerRequest::class, [], 'POST', '/settings/integration/mdm/authenticate', 'one', null, false, false],
    'Settings\\MdmServer\\DeleteMdmServerViaPostRequest' => [DeleteMdmServerViaPostRequest::class, [7], 'POST', '/settings/integration/mdm/7/delete', 'one', null, false, false],
    'Settings\\MdmServer\\PollMdmServerRequest' => [PollMdmServerRequest::class, [7], 'POST', '/settings/integration/mdm/7/poll', 'one', null, false, false],
    'Settings\\MdmServer\\TestMdmServerRequest' => [TestMdmServerRequest::class, [7], 'POST', '/settings/integration/mdm/7/test', 'one', null, false, false],
    'Settings\\MessageTemplate\\GetMessageTemplatesRequest' => [GetMessageTemplatesRequest::class, [], 'GET', '/settings/integration/message-template', 'list', MessageTemplate::class, false, true],
    'Settings\\MessageTemplate\\GetMessageTemplateRequest' => [GetMessageTemplateRequest::class, [7], 'GET', '/settings/integration/message-template/7', 'one', MessageTemplate::class, false, false],
    'Settings\\MessageTemplate\\GetMessageTemplateUsageRequest' => [GetMessageTemplateUsageRequest::class, [7], 'GET', '/settings/integration/message-template/7/usage', 'list', null, false, true],
    'Settings\\MessageTemplate\\TestMessageTemplateRequest' => [TestMessageTemplateRequest::class, [['name' => 'x']], 'POST', '/settings/integration/message-template/test', 'scalar', null, true, false],
    'Settings\\MessageTemplate\\DeleteMessageTemplateViaPostRequest' => [DeleteMessageTemplateViaPostRequest::class, [7], 'POST', '/settings/integration/message-template/7/delete', 'one', null, false, false],
    'Settings\\MessageTemplate\\UpdateMessageTemplateRequest' => [UpdateMessageTemplateRequest::class, [7, ['name' => 'x']], 'POST', '/settings/integration/message-template/7', 'one', MessageTemplate::class, true, false],
    'Settings\\MessageTemplate\\DeleteManyMessageTemplatesRequest' => [DeleteManyMessageTemplatesRequest::class, [], 'POST', '/settings/integration/message-template/delete', 'one', null, false, false],
    'Settings\\MessageTemplate\\CreateMessageTemplateRequest' => [CreateMessageTemplateRequest::class, [['name' => 'x']], 'POST', '/settings/integration/message-template', 'one', MessageTemplate::class, true, false],
    'Settings\\MessageTemplate\\DeleteMessageTemplateRequest' => [DeleteMessageTemplateRequest::class, [7], 'DELETE', '/settings/integration/message-template/7', 'none', null, false, false],
    'Settings\\MessagingGateway\\GetMessagingGatewaysRequest' => [GetMessagingGatewaysRequest::class, [], 'GET', '/settings/integration/messaging-gateway', 'list', MessagingGateway::class, false, true],
    'Settings\\MessagingGateway\\GetMessagingGatewayGlobalDefaultMessagingGatewayRequest' => [GetMessagingGatewayGlobalDefaultMessagingGatewayRequest::class, [], 'GET', '/settings/integration/messaging-gateway/global/default-messaging-gateway', 'scalar', null, false, false],
    'Settings\\MessagingGateway\\GetMessagingGatewayRequest' => [GetMessagingGatewayRequest::class, [7], 'GET', '/settings/integration/messaging-gateway/7', 'one', MessagingGateway::class, false, false],
    'Settings\\MessagingGateway\\CountAllMessagingGatewaysRequest' => [CountAllMessagingGatewaysRequest::class, [], 'GET', '/settings/integration/messaging-gateway/count/all', 'scalar', null, false, false],
    'Settings\\MessagingGateway\\GetMessagingGatewayGlobalMaxLengthRequest' => [GetMessagingGatewayGlobalMaxLengthRequest::class, [], 'GET', '/settings/integration/messaging-gateway/global/max-length', 'scalar', null, false, false],
    'Settings\\MessagingGateway\\CountMessagingGatewaysRequest' => [CountMessagingGatewaysRequest::class, [], 'GET', '/settings/integration/messaging-gateway/count', 'scalar', null, false, false],
    'Settings\\MessagingGateway\\DeleteManyMessagingGatewaysRequest' => [DeleteManyMessagingGatewaysRequest::class, [], 'POST', '/settings/integration/messaging-gateway/delete', 'one', null, false, false],
    'Settings\\MessagingGateway\\CreateMessagingGatewayRequest' => [CreateMessagingGatewayRequest::class, [['name' => 'x']], 'POST', '/settings/integration/messaging-gateway', 'scalar', null, true, false],
    'Settings\\MessagingGateway\\PostMessagingGatewayGlobalDefaultMessagingGatewayRequest' => [PostMessagingGatewayGlobalDefaultMessagingGatewayRequest::class, [], 'POST', '/settings/integration/messaging-gateway/global/default-messaging-gateway', 'scalar', null, false, false],
    'Settings\\MessagingGateway\\PostMessagingGatewayGlobalMaxLengthRequest' => [PostMessagingGatewayGlobalMaxLengthRequest::class, [], 'POST', '/settings/integration/messaging-gateway/global/max-length', 'one', null, false, false],
    'Settings\\MessagingGateway\\UpdateMessagingGatewayRequest' => [UpdateMessagingGatewayRequest::class, [7, ['name' => 'x']], 'POST', '/settings/integration/messaging-gateway/7', 'one', MessagingGateway::class, true, false],
    'Settings\\MessagingGateway\\DeleteMessagingGatewayViaPostRequest' => [DeleteMessagingGatewayViaPostRequest::class, [7], 'POST', '/settings/integration/messaging-gateway/7/delete', 'one', null, false, false],
    'Settings\\MessagingGateway\\SendMessagingGatewaySmsRequest' => [SendMessagingGatewaySmsRequest::class, [], 'POST', '/settings/integration/messaging-gateway/send-sms', 'one', null, false, false],
    'Settings\\MessagingGateway\\DisableMessagingGatewayRequest' => [DisableMessagingGatewayRequest::class, [7], 'POST', '/settings/integration/messaging-gateway/7/disable', 'one', null, false, false],
    'Settings\\MessagingGateway\\TestMessagingGatewayRequest' => [TestMessagingGatewayRequest::class, [7], 'POST', '/settings/integration/messaging-gateway/7/test', 'one', null, false, false],
    'Settings\\MessagingGateway\\EnableMessagingGatewayRequest' => [EnableMessagingGatewayRequest::class, [7], 'POST', '/settings/integration/messaging-gateway/7/enable', 'one', null, false, false],
    'Settings\\MessagingGateway\\DeleteMessagingGatewayRequest' => [DeleteMessagingGatewayRequest::class, [7], 'DELETE', '/settings/integration/messaging-gateway/7', 'none', null, false, false],
    'Settings\\PatchManagement\\GetPatchManagementRequest' => [GetPatchManagementRequest::class, [], 'GET', '/settings/integration/patch-management', 'list', PatchManagement::class, false, true],
    'Settings\\PatchManagement\\PostPatchManagementBigFixRequest' => [PostPatchManagementBigFixRequest::class, [['name' => 'x']], 'POST', '/settings/integration/patch-management/big-fix', 'one', PatchManagementBigFix::class, true, false],
    'Settings\\PatchManagement\\PostPatchManagementPatchLinkByIdRequest' => [PostPatchManagementPatchLinkByIdRequest::class, [7, ['name' => 'x']], 'POST', '/settings/integration/patch-management/patch-link/7', 'one', PatchManagement::class, true, false],
    'Settings\\PatchManagement\\PostPatchManagementPropertiesBigFixByIdRequest' => [PostPatchManagementPropertiesBigFixByIdRequest::class, [7], 'POST', '/settings/integration/patch-management/properties/big-fix/7', 'one', null, false, false],
    'Settings\\PatchManagement\\PostPatchManagementPropertiesPatchLinkByIdRequest' => [PostPatchManagementPropertiesPatchLinkByIdRequest::class, [7], 'POST', '/settings/integration/patch-management/properties/patch-link/7', 'one', null, false, false],
    'Settings\\PatchManagement\\TestPatchManagementRequest' => [TestPatchManagementRequest::class, [['name' => 'x']], 'POST', '/settings/integration/patch-management/test', 'one', PatchManagementBigFix::class, true, false],
    'Settings\\PatchManagement\\TestPatchManagementByIdRequest' => [TestPatchManagementByIdRequest::class, [7], 'POST', '/settings/integration/patch-management/test/7', 'one', null, false, false],
    'Settings\\ProxySettings\\GetProxySettingsRequest' => [GetProxySettingsRequest::class, [], 'GET', '/settings/integration/proxy', 'one', ProxySettings::class, false, false],
    'Settings\\ProxySettings\\UpdateProxySettingsRequest' => [UpdateProxySettingsRequest::class, [], 'POST', '/settings/integration/proxy', 'one', ProxySettings::class, false, false],
    'Settings\\SecurityEventParser\\GetSecurityEventParsersRequest' => [GetSecurityEventParsersRequest::class, [], 'GET', '/settings/integration/security-event-parser', 'list', SecurityEventParser::class, false, true],
    'Settings\\SecurityEventParser\\GetSecurityEventParserRequest' => [GetSecurityEventParserRequest::class, [7], 'GET', '/settings/integration/security-event-parser/7', 'one', SecurityEventParser::class, false, false],
    'Settings\\SecurityEventParser\\GetSecurityEventParserRecentSyslogRequest' => [GetSecurityEventParserRecentSyslogRequest::class, [], 'GET', '/settings/integration/security-event-parser/recent-syslog', 'list', null, false, true],
    'Settings\\SecurityEventParser\\GetSecurityEventParserUsageRequest' => [GetSecurityEventParserUsageRequest::class, [7], 'GET', '/settings/integration/security-event-parser/7/usage', 'list', null, false, true],
    'Settings\\SecurityEventParser\\CreateSecurityEventParserRequest' => [CreateSecurityEventParserRequest::class, [['name' => 'x']], 'POST', '/settings/integration/security-event-parser', 'one', SecurityEventParser::class, true, false],
    'Settings\\SecurityEventParser\\DeleteManySecurityEventParsersRequest' => [DeleteManySecurityEventParsersRequest::class, [], 'POST', '/settings/integration/security-event-parser/delete', 'one', null, false, false],
    'Settings\\SecurityEventParser\\DisableManySecurityEventParsersRequest' => [DisableManySecurityEventParsersRequest::class, [], 'POST', '/settings/integration/security-event-parser/disable', 'one', null, false, false],
    'Settings\\SecurityEventParser\\UpdateSecurityEventParserRequest' => [UpdateSecurityEventParserRequest::class, [7, ['name' => 'x']], 'POST', '/settings/integration/security-event-parser/7', 'one', SecurityEventParser::class, true, false],
    'Settings\\SecurityEventParser\\ParseSecurityEventParserMessageRequest' => [ParseSecurityEventParserMessageRequest::class, [], 'POST', '/settings/integration/security-event-parser/parse-message', 'one', SecurityEventParserParseSecurityEventParserMessage::class, false, false],
    'Settings\\SecurityEventParser\\DeleteSecurityEventParserViaPostRequest' => [DeleteSecurityEventParserViaPostRequest::class, [7], 'POST', '/settings/integration/security-event-parser/7/delete', 'one', null, false, false],
    'Settings\\SecurityEventParser\\TestSecurityEventParserRequest' => [TestSecurityEventParserRequest::class, [7, ['name' => 'x']], 'POST', '/settings/integration/security-event-parser/7/test', 'one', SecurityEventParserTestSecurityEventParser::class, true, false],
    'Settings\\SecurityEventParser\\EnableManySecurityEventParsersRequest' => [EnableManySecurityEventParsersRequest::class, [], 'POST', '/settings/integration/security-event-parser/enable', 'one', null, false, false],
    'Settings\\SecurityEventParser\\DeleteSecurityEventParserRequest' => [DeleteSecurityEventParserRequest::class, [7], 'DELETE', '/settings/integration/security-event-parser/7', 'none', null, false, false],
    'Settings\\SmsProvider\\CountSmsProvidersRequest' => [CountSmsProvidersRequest::class, [], 'GET', '/settings/integration/sms/count', 'scalar', null, false, false],
    'Settings\\SmsProvider\\GetSmsProvidersRequest' => [GetSmsProvidersRequest::class, [], 'GET', '/settings/integration/sms', 'list', SmsProvider::class, false, true],
    'Settings\\SmsProvider\\CountAllSmsProvidersRequest' => [CountAllSmsProvidersRequest::class, [], 'GET', '/settings/integration/sms/count/all', 'scalar', null, false, false],
    'Settings\\SmsProvider\\GetSmsProviderGlobalMaxLengthRequest' => [GetSmsProviderGlobalMaxLengthRequest::class, [], 'GET', '/settings/integration/sms/global/max-length', 'scalar', null, false, false],
    'Settings\\SmsProvider\\GetSmsProviderRequest' => [GetSmsProviderRequest::class, [7], 'GET', '/settings/integration/sms/7', 'one', SmsProvider::class, false, false],
    'Settings\\SmsProvider\\GetSmsProviderUsageRequest' => [GetSmsProviderUsageRequest::class, [7], 'GET', '/settings/integration/sms/7/usage', 'list', null, false, false],
    'Settings\\SmsProvider\\PostSmsProviderGlobalMaxLengthRequest' => [PostSmsProviderGlobalMaxLengthRequest::class, [], 'POST', '/settings/integration/sms/global/max-length', 'one', null, false, false],
    'Settings\\SmsProvider\\CreateSmsProviderRequest' => [CreateSmsProviderRequest::class, [['name' => 'x']], 'POST', '/settings/integration/sms', 'one', SmsProvider::class, true, false],
    'Settings\\SmsProvider\\UpdateSmsProviderRequest' => [UpdateSmsProviderRequest::class, [7, ['name' => 'x']], 'POST', '/settings/integration/sms/7', 'one', SmsProvider::class, true, false],
    'Settings\\SmsProvider\\DeleteManySmsProvidersRequest' => [DeleteManySmsProvidersRequest::class, [], 'POST', '/settings/integration/sms/delete', 'one', null, false, false],
    'Settings\\SmsProvider\\DisableSmsProviderRequest' => [DisableSmsProviderRequest::class, [7], 'POST', '/settings/integration/sms/7/disable', 'one', null, false, false],
    'Settings\\SmsProvider\\EnableSmsProviderRequest' => [EnableSmsProviderRequest::class, [7], 'POST', '/settings/integration/sms/7/enable', 'one', null, false, false],
    'Settings\\SmsProvider\\DeleteSmsProviderViaPostRequest' => [DeleteSmsProviderViaPostRequest::class, [7], 'POST', '/settings/integration/sms/7/delete', 'one', null, false, false],
    'Settings\\SmsProvider\\DeleteSmsProviderRequest' => [DeleteSmsProviderRequest::class, [7], 'DELETE', '/settings/integration/sms/7', 'none', null, false, false],
    'Settings\\SnmpSettings\\GetSnmpSettingsRequest' => [GetSnmpSettingsRequest::class, [], 'GET', '/settings/integration/SNMP', 'one', SnmpSettings::class, false, false],
    'Settings\\SnmpSettings\\GetSnmpSettingsAuthPsswordRequest' => [GetSnmpSettingsAuthPsswordRequest::class, [], 'GET', '/settings/integration/SNMP/auth-pssword', 'raw', null, false, false],
    'Settings\\SnmpSettings\\GetSnmpSettingsPrivPsswordRequest' => [GetSnmpSettingsPrivPsswordRequest::class, [], 'GET', '/settings/integration/SNMP/priv-pssword', 'raw', null, false, false],
    'Settings\\SnmpSettings\\UpdateSnmpSettingsRequest' => [UpdateSnmpSettingsRequest::class, [], 'POST', '/settings/integration/SNMP', 'one', SnmpSettings::class, false, false],
    'Settings\\SyslogServer\\GetSyslogServerRequest' => [GetSyslogServerRequest::class, [7], 'GET', '/settings/integration/syslog/7', 'one', SyslogServer::class, false, false],
    'Settings\\SyslogServer\\GetSyslogServerUsageRequest' => [GetSyslogServerUsageRequest::class, [7], 'GET', '/settings/integration/syslog/7/usage', 'one', null, false, false],
    'Settings\\SyslogServer\\GetSyslogServersRequest' => [GetSyslogServersRequest::class, [], 'GET', '/settings/integration/syslog', 'list', SyslogServer::class, false, true],
    'Settings\\SyslogServer\\DeleteManySyslogServersRequest' => [DeleteManySyslogServersRequest::class, [], 'POST', '/settings/integration/syslog/delete', 'one', null, false, false],
    'Settings\\SyslogServer\\UpdateSyslogServerRequest' => [UpdateSyslogServerRequest::class, [7, ['name' => 'x']], 'POST', '/settings/integration/syslog/7', 'one', SyslogServer::class, true, false],
    'Settings\\SyslogServer\\CreateSyslogServerRequest' => [CreateSyslogServerRequest::class, [['name' => 'x']], 'POST', '/settings/integration/syslog', 'one', SyslogServer::class, true, false],
    'Settings\\SyslogServer\\DisableSyslogServerRequest' => [DisableSyslogServerRequest::class, [7], 'POST', '/settings/integration/syslog/7/disable', 'one', null, false, false],
    'Settings\\SyslogServer\\EnableSyslogServerRequest' => [EnableSyslogServerRequest::class, [7], 'POST', '/settings/integration/syslog/7/enable', 'one', null, false, false],
    'Settings\\SyslogServer\\DeleteSyslogServerViaPostRequest' => [DeleteSyslogServerViaPostRequest::class, [7], 'POST', '/settings/integration/syslog/7/delete', 'one', null, false, false],
    'Settings\\SyslogServer\\DeleteSyslogServerRequest' => [DeleteSyslogServerRequest::class, [7], 'DELETE', '/settings/integration/syslog/7', 'none', null, false, false],
    'Settings\\TrapMib\\GetTrapMibsRequest' => [GetTrapMibsRequest::class, [], 'GET', '/settings/integration/trap-mib', 'list', TrapMib::class, false, true],
    'Settings\\TrapMib\\AddTrapMibRequest' => [AddTrapMibRequest::class, [], 'POST', '/settings/integration/trap-mib/add', 'one', null, false, false],
    'Settings\\TrapMib\\DeleteManyTrapMibsRequest' => [DeleteManyTrapMibsRequest::class, [['name' => 'x']], 'POST', '/settings/integration/trap-mib/delete', 'one', null, true, false],
    'Settings\\TrapMib\\PostTrapMibMibNameRequest' => [PostTrapMibMibNameRequest::class, [], 'POST', '/settings/integration/trap-mib/mib-name', 'one', null, false, false],
    'Settings\\TrapMib\\UpdateTrapMibRequest' => [UpdateTrapMibRequest::class, [], 'POST', '/settings/integration/trap-mib/update', 'one', null, false, false],
    'Settings\\TrapMib\\DeleteTrapMibRequest' => [DeleteTrapMibRequest::class, [], 'DELETE', '/settings/integration/trap-mib', 'none', null, false, false],
    'Settings\\TrapMib\\DeleteTrapMibTrapOidRequest' => [DeleteTrapMibTrapOidRequest::class, [], 'DELETE', '/settings/integration/trap-mib/trap-oid', 'none', null, false, false],
    'Settings\\VendorOui\\DeleteVendorOuiViaPostRequest' => [DeleteVendorOuiViaPostRequest::class, [7], 'POST', '/settings/integration/vendor-oui/7/delete', 'one', null, false, false],
    'Settings\\VendorOui\\DeleteVendorOuiRequest' => [DeleteVendorOuiRequest::class, [7], 'DELETE', '/settings/integration/vendor-oui/7', 'none', null, false, false],
    'Settings\\VendorOui\\GetVendorOuisRequest' => [GetVendorOuisRequest::class, [], 'GET', '/settings/integration/vendor-oui', 'list', VendorOui::class, false, true],
    'Settings\\VendorOui\\CountVendorOuisRequest' => [CountVendorOuisRequest::class, [], 'GET', '/settings/integration/vendor-oui/count', 'scalar', null, false, false],
    'Settings\\VendorOui\\CountAllVendorOuisRequest' => [CountAllVendorOuisRequest::class, [], 'GET', '/settings/integration/vendor-oui/count/all', 'scalar', null, false, false],
    'Settings\\VendorOui\\GetVendorOuiCountByIdRequest' => [GetVendorOuiCountByIdRequest::class, [7], 'GET', '/settings/integration/vendor-oui/count/7', 'one', VendorOui::class, false, false],
    'Settings\\VendorOui\\GetVendorOuiSupportingInfoRequest' => [GetVendorOuiSupportingInfoRequest::class, [], 'GET', '/settings/integration/vendor-oui/supporting-info', 'one', null, false, false],
    'Settings\\VendorOui\\CreateVendorOuiRequest' => [CreateVendorOuiRequest::class, [['name' => 'x']], 'POST', '/settings/integration/vendor-oui', 'one', VendorOui::class, true, false],
    'Settings\\VendorOui\\DeleteManyVendorOuisRequest' => [DeleteManyVendorOuisRequest::class, [], 'POST', '/settings/integration/vendor-oui/delete', 'one', null, false, false],
    'Settings\\VendorOui\\UpdateVendorOuiRequest' => [UpdateVendorOuiRequest::class, [7, ['name' => 'x']], 'POST', '/settings/integration/vendor-oui/7', 'one', VendorOui::class, true, false],
    'Settings\\VulnerabilityScanner\\GetVulnerabilityScannersRequest' => [GetVulnerabilityScannersRequest::class, [], 'GET', '/settings/integration/vulnerability-scanner', 'list', VulnerabilityScanner::class, false, true],
    'Settings\\VulnerabilityScanner\\GetVulnerabilityScannerRequest' => [GetVulnerabilityScannerRequest::class, [7], 'GET', '/settings/integration/vulnerability-scanner/7', 'one', VulnerabilityScanner::class, false, false],
    'Settings\\VulnerabilityScanner\\GetVulnerabilityScannerScansRequest' => [GetVulnerabilityScannerScansRequest::class, [7], 'GET', '/settings/integration/vulnerability-scanner/7/scans', 'one', VulnerabilityScannerScans::class, false, false],
    'Settings\\VulnerabilityScanner\\GetVulnerabilityScannerQualysAppliancesRequest' => [GetVulnerabilityScannerQualysAppliancesRequest::class, [7], 'GET', '/settings/integration/vulnerability-scanner/7/qualys-appliances', 'one', VulnerabilityScannerScans::class, false, false],
    'Settings\\VulnerabilityScanner\\GetVulnerabilityScannerUsageRequest' => [GetVulnerabilityScannerUsageRequest::class, [7], 'GET', '/settings/integration/vulnerability-scanner/7/usage', 'list', null, false, false],
    'Settings\\VulnerabilityScanner\\CreateVulnerabilityScannerRequest' => [CreateVulnerabilityScannerRequest::class, [['name' => 'x']], 'POST', '/settings/integration/vulnerability-scanner', 'one', VulnerabilityScanner::class, true, false],
    'Settings\\VulnerabilityScanner\\DeleteManyVulnerabilityScannersRequest' => [DeleteManyVulnerabilityScannersRequest::class, [], 'POST', '/settings/integration/vulnerability-scanner/delete', 'one', null, false, false],
    'Settings\\VulnerabilityScanner\\UpdateVulnerabilityScannerRequest' => [UpdateVulnerabilityScannerRequest::class, [7, ['name' => 'x']], 'POST', '/settings/integration/vulnerability-scanner/7', 'one', VulnerabilityScanner::class, true, false],
    'Settings\\VulnerabilityScanner\\DeleteVulnerabilityScannerViaPostRequest' => [DeleteVulnerabilityScannerViaPostRequest::class, [7], 'POST', '/settings/integration/vulnerability-scanner/7/delete', 'one', null, false, false],
    'Settings\\VulnerabilityScanner\\PollVulnerabilityScannerRequest' => [PollVulnerabilityScannerRequest::class, [7], 'POST', '/settings/integration/vulnerability-scanner/7/poll', 'one', null, false, false],
    'Settings\\VulnerabilityScanner\\TestVulnerabilityScannerRequest' => [TestVulnerabilityScannerRequest::class, [7], 'POST', '/settings/integration/vulnerability-scanner/7/test', 'one', null, false, false],
    'Settings\\VulnerabilityScanner\\DeleteVulnerabilityScannerRequest' => [DeleteVulnerabilityScannerRequest::class, [7], 'DELETE', '/settings/integration/vulnerability-scanner/7', 'none', null, false, false],
    'Settings\\Certificate\\GetCertificatesRequest' => [GetCertificatesRequest::class, [], 'GET', '/settings/security/certificate-server', 'list', null, false, true],
    'Settings\\Certificate\\CopyCertificateRequest' => [CopyCertificateRequest::class, [], 'POST', '/settings/security/certificate-server/copy', 'one', null, false, false],
    'Settings\\Certificate\\PostCertificateCsrGenerateRequest' => [PostCertificateCsrGenerateRequest::class, [['name' => 'x']], 'POST', '/settings/security/certificate-server/csr/generate', 'one', CertificateCsrGenerate::class, true, false],
    'Settings\\Certificate\\UpdateCertificateRequest' => [UpdateCertificateRequest::class, ['sample'], 'POST', '/settings/security/certificate-server/sample', 'one', null, false, false],
    'Settings\\Certificate\\DeleteCertificateViaPostRequest' => [DeleteCertificateViaPostRequest::class, ['sample'], 'POST', '/settings/security/certificate-server/sample/delete', 'one', null, false, false],
    'Settings\\Certificate\\DeleteCertificateServerCertRequest' => [DeleteCertificateServerCertRequest::class, ['sample'], 'POST', '/settings/security/certificate-server/sample/deleteServerCert', 'one', null, false, false],
    'Settings\\Certificate\\RestartCertificateRequest' => [RestartCertificateRequest::class, [], 'POST', '/settings/security/certificate-server/restart', 'one', null, false, false],
    'Settings\\WebServiceDefinition\\GetWebServiceDefinitionsRequest' => [GetWebServiceDefinitionsRequest::class, [], 'GET', '/settings/security/web-service-definition', 'list', WebServiceDefinition::class, false, true],
    'Settings\\WebServiceDefinition\\GetWebServiceDefinitionRequest' => [GetWebServiceDefinitionRequest::class, [7], 'GET', '/settings/security/web-service-definition/7', 'one', WebServiceDefinition::class, false, false],
    'Settings\\WebServiceDefinition\\GetWebServiceDefinitionUsageRequest' => [GetWebServiceDefinitionUsageRequest::class, [7], 'GET', '/settings/security/web-service-definition/7/usage', 'list', null, false, false],
    'Settings\\WebServiceDefinition\\CreateWebServiceDefinitionRequest' => [CreateWebServiceDefinitionRequest::class, [['name' => 'x']], 'POST', '/settings/security/web-service-definition', 'scalar', null, true, false],
    'Settings\\WebServiceDefinition\\DeleteManyWebServiceDefinitionsRequest' => [DeleteManyWebServiceDefinitionsRequest::class, [], 'POST', '/settings/security/web-service-definition/delete', 'one', null, false, false],
    'Settings\\WebServiceDefinition\\DeployWebServiceDefinitionRequest' => [DeployWebServiceDefinitionRequest::class, [], 'POST', '/settings/security/web-service-definition/deploy', 'one', null, false, false],
    'Settings\\WebServiceDefinition\\UpdateWebServiceDefinitionRequest' => [UpdateWebServiceDefinitionRequest::class, [7, ['name' => 'x']], 'POST', '/settings/security/web-service-definition/7', 'one', WebServiceDefinition::class, true, false],
    'Settings\\WebServiceDefinition\\DeleteWebServiceDefinitionViaPostRequest' => [DeleteWebServiceDefinitionViaPostRequest::class, [7], 'POST', '/settings/security/web-service-definition/7/delete', 'one', null, false, false],
    'Settings\\WebServiceDefinition\\DeleteWebServiceDefinitionRequest' => [DeleteWebServiceDefinitionRequest::class, [7], 'DELETE', '/settings/security/web-service-definition/7', 'none', null, false, false],
    'Settings\\FortiGateTelemetry\\GetFortiGateTelemetryUsageRequest' => [GetFortiGateTelemetryUsageRequest::class, [7], 'GET', '/settings/security-fabric/7/usage', 'list', null, false, false],
    'Settings\\FortiGateTelemetry\\GetFortiGateTelemetriesRequest' => [GetFortiGateTelemetriesRequest::class, [], 'GET', '/settings/security-fabric', 'list', FortiGateTelemetry::class, false, true],
    'Settings\\FortiGateTelemetry\\GetFortiGateTelemetryRequest' => [GetFortiGateTelemetryRequest::class, [7], 'GET', '/settings/security-fabric/7', 'one', FortiGateTelemetry::class, false, false],
    'Settings\\FortiGateTelemetry\\CreateFortiGateTelemetryRequest' => [CreateFortiGateTelemetryRequest::class, [['name' => 'x']], 'POST', '/settings/security-fabric', 'one', FortiGateTelemetry::class, true, false],
    'Settings\\FortiGateTelemetry\\DeleteManyFortiGateTelemetriesRequest' => [DeleteManyFortiGateTelemetriesRequest::class, [], 'POST', '/settings/security-fabric/delete', 'one', null, false, false],
    'Settings\\FortiGateTelemetry\\DeleteFortiGateTelemetryViaPostRequest' => [DeleteFortiGateTelemetryViaPostRequest::class, [7], 'POST', '/settings/security-fabric/7/delete', 'one', null, false, false],
    'Settings\\FortiGateTelemetry\\UpdateFortiGateTelemetryRequest' => [UpdateFortiGateTelemetryRequest::class, [7, ['name' => 'x']], 'POST', '/settings/security-fabric/7', 'one', FortiGateTelemetry::class, true, false],
    'Settings\\FortiGateTelemetry\\DeleteFortiGateTelemetryRequest' => [DeleteFortiGateTelemetryRequest::class, [7], 'DELETE', '/settings/security-fabric/7', 'none', null, false, false],
    'Settings\\TlsServiceConfiguration\\GetTlsServiceConfigurationsRequest' => [GetTlsServiceConfigurationsRequest::class, [], 'GET', '/settings/tls-service-configuration', 'list', TlsServiceConfiguration::class, false, true],
    'Settings\\TlsServiceConfiguration\\GetTlsServiceConfigurationRequest' => [GetTlsServiceConfigurationRequest::class, [7], 'GET', '/settings/tls-service-configuration/7', 'one', TlsServiceConfiguration::class, false, false],
    'Settings\\TlsServiceConfiguration\\GetTlsServiceConfigurationUsageRequest' => [GetTlsServiceConfigurationUsageRequest::class, [7], 'GET', '/settings/tls-service-configuration/7/usage', 'list', null, false, false],
    'Settings\\TlsServiceConfiguration\\GetTlsServiceConfigurationRadiusciphersRequest' => [GetTlsServiceConfigurationRadiusciphersRequest::class, [], 'GET', '/settings/tls-service-configuration/radiusciphers', 'list', null, false, true],
    'Settings\\TlsServiceConfiguration\\GetTlsServiceConfigurationAliasesRequest' => [GetTlsServiceConfigurationAliasesRequest::class, [], 'GET', '/settings/tls-service-configuration/aliases', 'one', TlsServiceConfigurationAliases::class, false, false],
    'Settings\\TlsServiceConfiguration\\CreateTlsServiceConfigurationRequest' => [CreateTlsServiceConfigurationRequest::class, [], 'POST', '/settings/tls-service-configuration', 'list', TlsServiceConfiguration::class, false, false],
    'Settings\\TlsServiceConfiguration\\DeleteManyTlsServiceConfigurationsRequest' => [DeleteManyTlsServiceConfigurationsRequest::class, [], 'POST', '/settings/tls-service-configuration/delete', 'one', null, false, false],
    'Settings\\TlsServiceConfiguration\\DeployTlsServiceConfigurationRequest' => [DeployTlsServiceConfigurationRequest::class, [], 'POST', '/settings/tls-service-configuration/deploy', 'one', null, false, false],
    'Settings\\TlsServiceConfiguration\\DeleteTlsServiceConfigurationViaPostRequest' => [DeleteTlsServiceConfigurationViaPostRequest::class, [7], 'POST', '/settings/tls-service-configuration/7/delete', 'one', null, false, false],
    'Settings\\TlsServiceConfiguration\\UpdateTlsServiceConfigurationRequest' => [UpdateTlsServiceConfigurationRequest::class, [7], 'POST', '/settings/tls-service-configuration/7', 'one', TlsServiceConfiguration::class, false, false],
    'Settings\\TlsServiceConfiguration\\DeleteTlsServiceConfigurationRequest' => [DeleteTlsServiceConfigurationRequest::class, [7], 'DELETE', '/settings/tls-service-configuration/7', 'none', null, false, false],
    'Settings\\OsUpdate\\GetOsUpdatesRequest' => [GetOsUpdatesRequest::class, [], 'GET', '/settings/udpates/os-updates', 'list', OsUpdate::class, false, true],
    'Settings\\OsUpdate\\GetOsUpdateLogsRequest' => [GetOsUpdateLogsRequest::class, [], 'GET', '/settings/udpates/os-updates/logs', 'one', OsUpdateLogs::class, false, false],
    'Settings\\OsUpdate\\GetOsUpdateUpdateDataRequest' => [GetOsUpdateUpdateDataRequest::class, [], 'GET', '/settings/udpates/os-updates/update-data', 'one', OsUpdateUpdateData::class, false, false],
    'Ssid\\Ssid\\GetSsidConfigRequest' => [GetSsidConfigRequest::class, [], 'GET', '/ssid/config', 'one', null, false, false],
    'Ssid\\Ssid\\PutSsidConfigRequest' => [PutSsidConfigRequest::class, [['name' => 'x']], 'PUT', '/ssid/config', 'one', SsidConfig::class, true, false],
    'Ssid\\Ssid\\GetSsidsRequest' => [GetSsidsRequest::class, [], 'GET', '/ssid', 'list', Ssid::class, false, true],
    'System\\AnalyticsProperties\\GetAnalyticsPropertiesRequest' => [GetAnalyticsPropertiesRequest::class, [], 'GET', '/system/analytics-properties', 'one', AnalyticsProperties::class, false, false],
    'System\\AnalyticsProperties\\UpdateAnalyticsPropertiesRequest' => [UpdateAnalyticsPropertiesRequest::class, [], 'POST', '/system/analytics-properties', 'one', AnalyticsProperties::class, false, false],
    'System\\BackgroundTask\\GetBackgroundTasksRequest' => [GetBackgroundTasksRequest::class, [], 'GET', '/system/background-task', 'list', BackgroundTask::class, false, true],
    'System\\BackgroundTask\\GetBackgroundTaskCurrentUserRequest' => [GetBackgroundTaskCurrentUserRequest::class, [], 'GET', '/system/background-task/current-user', 'list', BackgroundTask::class, false, true],
    'System\\BackgroundTask\\GetBackgroundTaskRequest' => [GetBackgroundTaskRequest::class, [7], 'GET', '/system/background-task/7', 'one', BackgroundTask::class, false, false],
    'System\\BackgroundTask\\CreateBackgroundTaskRequest' => [CreateBackgroundTaskRequest::class, [['name' => 'x']], 'POST', '/system/background-task', 'one', BackgroundTask::class, true, false],
    'System\\BackgroundTask\\UpdateBackgroundTaskRequest' => [UpdateBackgroundTaskRequest::class, [7, ['name' => 'x']], 'POST', '/system/background-task/7', 'one', BackgroundTask::class, true, false],
    'System\\BackgroundTask\\PostBackgroundTaskCompleteRequest' => [PostBackgroundTaskCompleteRequest::class, [7], 'POST', '/system/background-task/7/complete', 'one', null, false, false],
    'System\\BackgroundTask\\DeleteManyBackgroundTasksRequest' => [DeleteManyBackgroundTasksRequest::class, [], 'POST', '/system/background-task/delete', 'one', null, false, false],
    'System\\BackupConfiguration\\GetBackupConfigurationFtpRequest' => [GetBackupConfigurationFtpRequest::class, [], 'GET', '/system/backup/configuration/ftp', 'one', null, false, false],
    'System\\BackupConfiguration\\GetBackupConfigurationSftpRequest' => [GetBackupConfigurationSftpRequest::class, [], 'GET', '/system/backup/configuration/sftp', 'one', null, false, false],
    'System\\BackupConfiguration\\GetBackupConfigurationSshRequest' => [GetBackupConfigurationSshRequest::class, [], 'GET', '/system/backup/configuration/ssh', 'one', null, false, false],
    'System\\BackupConfiguration\\PostBackupConfigurationFtpRequest' => [PostBackupConfigurationFtpRequest::class, [['name' => 'x']], 'POST', '/system/backup/configuration/ftp', 'one', BackupConfigurationFtp::class, true, false],
    'System\\BackupConfiguration\\PostBackupConfigurationSftpRequest' => [PostBackupConfigurationSftpRequest::class, [['name' => 'x']], 'POST', '/system/backup/configuration/sftp', 'one', BackupConfigurationSftp::class, true, false],
    'System\\BackupConfiguration\\PostBackupConfigurationSshRequest' => [PostBackupConfigurationSshRequest::class, [['name' => 'x']], 'POST', '/system/backup/configuration/ssh', 'one', BackupConfigurationSftp::class, true, false],
    'System\\BackupSettings\\GetBackupSettingsArchivesRequest' => [GetBackupSettingsArchivesRequest::class, [], 'GET', '/system/backup-settings/archives', 'one', BackupSettingsArchives::class, false, false],
    'System\\BackupSettings\\GetBackupSettingsDatabaseRequest' => [GetBackupSettingsDatabaseRequest::class, [], 'GET', '/system/backup-settings/database', 'one', null, false, false],
    'System\\BackupSettings\\GetBackupSettingsDatabaseArchiveRequest' => [GetBackupSettingsDatabaseArchiveRequest::class, [], 'GET', '/system/backup-settings/database/archive', 'raw', null, false, false],
    'System\\BackupSettings\\GetBackupSettingsSystemBackupRequest' => [GetBackupSettingsSystemBackupRequest::class, [], 'GET', '/system/backup-settings/system-backup', 'one', null, false, false],
    'System\\BackupSettings\\PostBackupSettingsArchivesRequest' => [PostBackupSettingsArchivesRequest::class, [], 'POST', '/system/backup-settings/archives', 'one', null, false, false],
    'System\\BackupSettings\\PostBackupSettingsDatabaseRequest' => [PostBackupSettingsDatabaseRequest::class, [], 'POST', '/system/backup-settings/database', 'one', null, false, false],
    'System\\BackupSettings\\PostBackupSettingsDatabaseRestoreArchivesRequest' => [PostBackupSettingsDatabaseRestoreArchivesRequest::class, [], 'POST', '/system/backup-settings/database/restore-archives', 'one', null, false, false],
    'System\\BackupSettings\\PostBackupSettingsSystemBackupRequest' => [PostBackupSettingsSystemBackupRequest::class, [], 'POST', '/system/backup-settings/system-backup', 'one', null, false, false],
    'System\\Group\\DeleteGroupRequest' => [DeleteGroupRequest::class, [7], 'DELETE', '/system/group/7', 'none', null, false, false],
    'System\\Group\\GetGroupsRequest' => [GetGroupsRequest::class, [], 'GET', '/system/group', 'list', Group::class, false, true],
    'System\\Group\\CountGroupsRequest' => [CountGroupsRequest::class, [], 'GET', '/system/group/count', 'scalar', null, false, false],
    'System\\Group\\CountAllGroupsRequest' => [CountAllGroupsRequest::class, [], 'GET', '/system/group/count/all', 'scalar', null, false, false],
    'System\\Group\\GetGroupRequest' => [GetGroupRequest::class, [7], 'GET', '/system/group/7', 'one', Group::class, false, false],
    'System\\Group\\GetGroupDescendantsRequest' => [GetGroupDescendantsRequest::class, [7], 'GET', '/system/group/7/descendants', 'one', null, false, false],
    'System\\Group\\GetGroupMemberIdsRequest' => [GetGroupMemberIdsRequest::class, [7], 'GET', '/system/group/7/member-ids', 'raw', null, false, false],
    'System\\Group\\GetGroupMembersRequest' => [GetGroupMembersRequest::class, [7], 'GET', '/system/group/7/members', 'one', GroupMembers::class, false, false],
    'System\\Group\\GetGroupUsageRequest' => [GetGroupUsageRequest::class, [7], 'GET', '/system/group/7/usage', 'list', null, false, false],
    'System\\Group\\AddGroupMembersRequest' => [AddGroupMembersRequest::class, [], 'POST', '/system/group/add-members', 'one', null, false, false],
    'System\\Group\\AddGroupToParentsRequest' => [AddGroupToParentsRequest::class, [], 'POST', '/system/group/add-to-parents', 'one', null, false, false],
    'System\\Group\\PostGroupAgingRequest' => [PostGroupAgingRequest::class, [], 'POST', '/system/group/aging', 'one', null, false, false],
    'System\\Group\\CopyGroupRequest' => [CopyGroupRequest::class, [], 'POST', '/system/group/copy', 'one', null, false, false],
    'System\\Group\\DeleteManyGroupsRequest' => [DeleteManyGroupsRequest::class, [], 'POST', '/system/group/delete', 'one', null, false, false],
    'System\\Group\\PostGroupManagesRequest' => [PostGroupManagesRequest::class, [7], 'POST', '/system/group/7/manages', 'one', null, false, false],
    'System\\Group\\UpdateGroupRequest' => [UpdateGroupRequest::class, ['sample', ['name' => 'x']], 'POST', '/system/group/sample', 'one', Group::class, true, false],
    'System\\Group\\PostGroupByIdRequest' => [PostGroupByIdRequest::class, ['sample', 7, ['name' => 'x']], 'POST', '/system/group/sample/7', 'one', Group::class, true, false],
    'System\\Group\\DeleteGroupViaPostRequest' => [DeleteGroupViaPostRequest::class, [7], 'POST', '/system/group/7/delete', 'one', null, false, false],
    'System\\Group\\PostGroupMembershipRequest' => [PostGroupMembershipRequest::class, [], 'POST', '/system/group/membership', 'one', null, false, false],
    'System\\Group\\RemoveGroupFromParentRequest' => [RemoveGroupFromParentRequest::class, [], 'POST', '/system/group/remove-from-parent', 'one', null, false, false],
    'System\\Group\\RemoveGroupMembersRequest' => [RemoveGroupMembersRequest::class, [], 'POST', '/system/group/remove-members', 'one', null, false, false],
    'System\\HighAvailability\\GetHighAvailabilityRequest' => [GetHighAvailabilityRequest::class, [], 'GET', '/system/high-availability', 'one', HighAvailability::class, false, false],
    'System\\HighAvailability\\GetHighAvailabilityPasswordByPwkeyRequest' => [GetHighAvailabilityPasswordByPwkeyRequest::class, ['sample'], 'GET', '/system/high-availability/password/sample', 'scalar', null, false, false],
    'System\\HighAvailability\\UpdateHighAvailabilityRequest' => [UpdateHighAvailabilityRequest::class, [['name' => 'x']], 'POST', '/system/high-availability', 'one', HighAvailability::class, true, false],
    'System\\LicenseManagement\\GetLicenseManagementRequest' => [GetLicenseManagementRequest::class, [], 'GET', '/system/license-management', 'one', null, false, false],
    'System\\LocalProperties\\GetLocalPropertiesClusterRequest' => [GetLocalPropertiesClusterRequest::class, [], 'GET', '/system/local-properties/cluster', 'list', LocalPropertiesCluster::class, false, true],
    'System\\LocalProperties\\GetLocalPropertiesConfigStatusRequest' => [GetLocalPropertiesConfigStatusRequest::class, [], 'GET', '/system/local-properties/config-status', 'one', null, false, false],
    'System\\LocalProperties\\GetLocalPropertiesGlobaloptionByParamRequest' => [GetLocalPropertiesGlobaloptionByParamRequest::class, ['sample'], 'GET', '/system/local-properties/globaloption/sample', 'scalar', null, false, false],
    'System\\LocalProperties\\GetLocalPropertiesHardwareRequest' => [GetLocalPropertiesHardwareRequest::class, [], 'GET', '/system/local-properties/hardware', 'one', null, false, false],
    'System\\LocalProperties\\GetLocalPropertiesHardwarePerformanceRequest' => [GetLocalPropertiesHardwarePerformanceRequest::class, [], 'GET', '/system/local-properties/hardware/performance', 'one', null, false, false],
    'System\\LocalProperties\\GetLocalPropertiesLicenseRequest' => [GetLocalPropertiesLicenseRequest::class, [], 'GET', '/system/local-properties/license', 'one', null, false, false],
    'System\\LocalProperties\\GetLocalPropertiesLicenseConcurrentRequest' => [GetLocalPropertiesLicenseConcurrentRequest::class, [], 'GET', '/system/local-properties/license/concurrent', 'one', null, false, false],
    'System\\LocalProperties\\GetLocalPropertiesSoftwareDetailsRequest' => [GetLocalPropertiesSoftwareDetailsRequest::class, [], 'GET', '/system/local-properties/software-details', 'one', null, false, false],
    'System\\LocalProperties\\PostLocalPropertiesClusterApplicationPrimaryRestartRequest' => [PostLocalPropertiesClusterApplicationPrimaryRestartRequest::class, [], 'POST', '/system/local-properties/cluster/application/primary/restart', 'one', null, false, false],
    'System\\LocalProperties\\PostLocalPropertiesClusterControlPrimaryRestartRequest' => [PostLocalPropertiesClusterControlPrimaryRestartRequest::class, [], 'POST', '/system/local-properties/cluster/control/primary/restart', 'one', null, false, false],
    'System\\LocalProperties\\PostLocalPropertiesHardwareThresholdsRequest' => [PostLocalPropertiesHardwareThresholdsRequest::class, [], 'POST', '/system/local-properties/hardware/thresholds', 'one', null, false, false],
    'System\\LocalProperties\\PostLocalPropertiesLicenseApplyRequest' => [PostLocalPropertiesLicenseApplyRequest::class, [], 'POST', '/system/local-properties/license/apply', 'one', null, false, false],
    'System\\LocalProperties\\PostLocalPropertiesPasswordsChangeRequest' => [PostLocalPropertiesPasswordsChangeRequest::class, [['name' => 'x']], 'POST', '/system/local-properties/passwords/change', 'one', LocalPropertiesPasswordsChange::class, true, false],
    'System\\LocalProperties\\PostLocalPropertiesSystemInitializeRequest' => [PostLocalPropertiesSystemInitializeRequest::class, [['name' => 'x']], 'POST', '/system/local-properties/system/initialize', 'one', LocalPropertiesSystemInitialize::class, true, false],
    'System\\NtpSettings\\GetNtpSettingsRequest' => [GetNtpSettingsRequest::class, [], 'GET', '/system/ntp', 'one', null, false, false],
    'System\\NtpSettings\\GetNtpSettingsServersRequest' => [GetNtpSettingsServersRequest::class, [], 'GET', '/system/ntp/servers', 'list', null, false, true],
    'System\\NtpSettings\\UpdateNtpSettingsRequest' => [UpdateNtpSettingsRequest::class, [], 'POST', '/system/ntp', 'one', null, false, false],
    'System\\ScheduledTask\\GetScheduledTasksRequest' => [GetScheduledTasksRequest::class, [], 'GET', '/system/scheduler', 'list', ScheduledTask::class, false, true],
    'System\\ScheduledTask\\GetScheduledTaskRequest' => [GetScheduledTaskRequest::class, [7], 'GET', '/system/scheduler/7', 'one', ScheduledTask::class, false, false],
    'System\\ScheduledTask\\CountAllScheduledTasksRequest' => [CountAllScheduledTasksRequest::class, [], 'GET', '/system/scheduler/count/all', 'scalar', null, false, false],
    'System\\ScheduledTask\\CountScheduledTasksRequest' => [CountScheduledTasksRequest::class, [], 'GET', '/system/scheduler/count', 'scalar', null, false, false],
    'System\\ScheduledTask\\GetScheduledTaskRunningRequest' => [GetScheduledTaskRunningRequest::class, ['sample'], 'GET', '/system/scheduler/sample/running', 'scalar', null, false, false],
    'System\\ScheduledTask\\GetScheduledTaskActivityTypesRequest' => [GetScheduledTaskActivityTypesRequest::class, [], 'GET', '/system/scheduler/activity-types', 'one', ScheduledTaskActivityTypes::class, false, false],
    'System\\ScheduledTask\\DeleteManyScheduledTasksRequest' => [DeleteManyScheduledTasksRequest::class, [], 'POST', '/system/scheduler/delete', 'one', null, false, false],
    'System\\ScheduledTask\\DeleteScheduledTaskViaPostRequest' => [DeleteScheduledTaskViaPostRequest::class, [7], 'POST', '/system/scheduler/7/delete', 'one', null, false, false],
    'System\\ScheduledTask\\DisableScheduledTaskRequest' => [DisableScheduledTaskRequest::class, [7], 'POST', '/system/scheduler/7/disable', 'one', null, false, false],
    'System\\ScheduledTask\\EnableScheduledTaskRequest' => [EnableScheduledTaskRequest::class, [7], 'POST', '/system/scheduler/7/enable', 'one', null, false, false],
    'System\\ScheduledTask\\RunScheduledTaskRequest' => [RunScheduledTaskRequest::class, [], 'POST', '/system/scheduler/run', 'one', null, false, false],
    'System\\ScheduledTask\\DeleteScheduledTaskRequest' => [DeleteScheduledTaskRequest::class, [7], 'DELETE', '/system/scheduler/7', 'none', null, false, false],
    'System\\ServiceConnector\\GetServiceConnectorsRequest' => [GetServiceConnectorsRequest::class, [], 'GET', '/system/service-connector', 'list', ServiceConnector::class, false, true],
    'System\\ManagedServer\\GetManagedServerLicenseRequest' => [GetManagedServerLicenseRequest::class, [], 'GET', '/system/properties/license', 'one', ManagedServerLicense::class, false, false],
    'System\\ManagedServer\\GetManagedServerHardwareRequest' => [GetManagedServerHardwareRequest::class, [], 'GET', '/system/properties/hardware', 'one', null, false, false],
    'System\\ManagedServer\\GetManagedServerPropertiesRequest' => [GetManagedServerPropertiesRequest::class, [7], 'GET', '/system/managed-server/7/properties', 'raw', null, false, false],
    'System\\ManagedServer\\GetManagedServerSummaryRequest' => [GetManagedServerSummaryRequest::class, [], 'GET', '/system/managed-server/summary', 'one', null, false, false],
    'System\\ManagedServer\\GetManagedServerScansRequest' => [GetManagedServerScansRequest::class, [7], 'GET', '/system/managed-server/7/scans', 'raw', null, false, false],
    'System\\ManagedServer\\CreateManagedServerRequest' => [CreateManagedServerRequest::class, [], 'POST', '/system/managed-server', 'one', null, false, false],
    'System\\ManagedServer\\DeleteManyManagedServersRequest' => [DeleteManyManagedServersRequest::class, [], 'POST', '/system/managed-server/delete', 'one', null, false, false],
    'System\\ManagedServer\\PostManagedServerPropertiesRequest' => [PostManagedServerPropertiesRequest::class, [7], 'POST', '/system/managed-server/7/properties', 'one', null, false, false],
    'System\\ManagedServer\\SyncManagedServerRequest' => [SyncManagedServerRequest::class, [], 'POST', '/system/managed-server/sync', 'one', null, false, false],
    'System\\ManagedServer\\PingManagedServerRequest' => [PingManagedServerRequest::class, [], 'POST', '/system/managed-server/ping', 'one', null, false, false],
    'System\\Debug\\GetDebugLogRequest' => [GetDebugLogRequest::class, [], 'GET', '/system/debug/log', 'one', null, false, false],
    'System\\Debug\\GetDebugDatabaseRelationsRequest' => [GetDebugDatabaseRelationsRequest::class, [], 'GET', '/system/debug/database/relations', 'list', DebugDatabaseRelation::class, false, true],
    'System\\Debug\\GetDebugDatabaseTablesRequest' => [GetDebugDatabaseTablesRequest::class, [], 'GET', '/system/debug/database/tables', 'one', null, false, false],
    'System\\Debug\\GetDebugDatabaseTablesDataRequest' => [GetDebugDatabaseTablesDataRequest::class, [], 'GET', '/system/debug/database/tables/data', 'list', null, false, true],
    'System\\Debug\\GetDebugElementsRequest' => [GetDebugElementsRequest::class, [], 'GET', '/system/debug/elements', 'raw', null, false, false],
    'System\\Debug\\GetDebugElementsAttributesRequest' => [GetDebugElementsAttributesRequest::class, [], 'GET', '/system/debug/elements/attributes', 'list', DebugElementsAttribute::class, false, true],
    'System\\Debug\\GetDebugGrabLogSnapshotDownloadRequest' => [GetDebugGrabLogSnapshotDownloadRequest::class, [], 'GET', '/system/debug/grabLogSnapshot-download', 'raw', null, false, false],
    'System\\Debug\\GetDebugGrabLogSnapshotStatusRequest' => [GetDebugGrabLogSnapshotStatusRequest::class, [], 'GET', '/system/debug/grabLogSnapshot-status', 'scalar', null, false, false],
    'System\\Debug\\GetDebugGuiExperimentsRequest' => [GetDebugGuiExperimentsRequest::class, [], 'GET', '/system/debug/gui/experiments', 'raw', null, false, false],
    'System\\Debug\\GetDebugLoggerNamesRequest' => [GetDebugLoggerNamesRequest::class, [], 'GET', '/system/debug/logger-names', 'raw', null, false, false],
    'System\\Debug\\GetDebugPluginResourcesReloadersRequest' => [GetDebugPluginResourcesReloadersRequest::class, [], 'GET', '/system/debug/plugin/resources/reloaders', 'raw', null, false, false],
    'System\\Debug\\GetDebugPluginNamesRequest' => [GetDebugPluginNamesRequest::class, [], 'GET', '/system/debug/plugin-names', 'raw', null, false, false],
    'System\\Debug\\GetDebugPluginPerformanceRequest' => [GetDebugPluginPerformanceRequest::class, [], 'GET', '/system/debug/plugin-performance', 'raw', null, false, false],
    'System\\Debug\\GetDebugPluginStatusRequest' => [GetDebugPluginStatusRequest::class, [], 'GET', '/system/debug/plugin-status', 'one', DebugPluginStatus::class, false, false],
    'System\\Debug\\PostDebugGrabLogSnapshotStartRequest' => [PostDebugGrabLogSnapshotStartRequest::class, [['name' => 'x']], 'POST', '/system/debug/grabLogSnapshot-start', 'scalar', null, true, false],
    'System\\Debug\\PostDebugGuiSnapshotRequest' => [PostDebugGuiSnapshotRequest::class, [], 'POST', '/system/debug/gui/snapshot', 'one', null, false, false],
    'System\\Debug\\PostDebugPluginRequest' => [PostDebugPluginRequest::class, [], 'POST', '/system/debug/plugin', 'one', null, false, false],
    'System\\Debug\\PostDebugPluginResourcesReloadRequest' => [PostDebugPluginResourcesReloadRequest::class, [], 'POST', '/system/debug/plugin/resources/reload', 'one', null, false, false],
    'System\\Debug\\PostDebugElementsAttributesDeleteRequest' => [PostDebugElementsAttributesDeleteRequest::class, [], 'POST', '/system/debug/elements/attributes/delete', 'one', null, false, false],
    'System\\Task\\GetTasksRequest' => [GetTasksRequest::class, [], 'GET', '/system/task', 'list', Task::class, false, true],
    'System\\Task\\CountTasksRequest' => [CountTasksRequest::class, [], 'GET', '/system/task/count', 'scalar', null, false, false],
    'System\\Task\\CountAllTasksRequest' => [CountAllTasksRequest::class, [], 'GET', '/system/task/count/all', 'scalar', null, false, false],
    'System\\Task\\GetTaskRequest' => [GetTaskRequest::class, [7], 'GET', '/system/task/7', 'one', Task::class, false, false],
    'System\\Task\\GetTaskUsageRequest' => [GetTaskUsageRequest::class, [7], 'GET', '/system/task/7/usage', 'list', null, false, false],
    'System\\Task\\CreateTaskRequest' => [CreateTaskRequest::class, [['name' => 'x']], 'POST', '/system/task', 'one', Task::class, true, false],
    'System\\Task\\UpdateTaskRequest' => [UpdateTaskRequest::class, [7, ['name' => 'x']], 'POST', '/system/task/7', 'one', Task::class, true, false],
    'System\\Task\\DeleteManyTasksRequest' => [DeleteManyTasksRequest::class, [], 'POST', '/system/task/delete', 'one', null, false, false],
    'System\\Task\\DeleteTaskViaPostRequest' => [DeleteTaskViaPostRequest::class, [7], 'POST', '/system/task/7/delete', 'one', null, false, false],
    'System\\Task\\DeleteTaskRequest' => [DeleteTaskRequest::class, [7], 'DELETE', '/system/task/7', 'none', null, false, false],
    'System\\Update\\TestUpdateRequest' => [TestUpdateRequest::class, [], 'POST', '/system/update/test', 'scalar', null, false, false],
    'User\\AdminProfile\\DeleteAdminProfileRequest' => [DeleteAdminProfileRequest::class, [7], 'DELETE', '/user/admin-profile/7', 'none', null, false, false],
    'User\\AdminProfile\\DeleteAdminProfileMappingByIdRequest' => [DeleteAdminProfileMappingByIdRequest::class, [7], 'DELETE', '/user/admin-profile/mapping/7', 'none', null, false, false],
    'User\\AdminProfile\\GetAdminProfilesRequest' => [GetAdminProfilesRequest::class, [], 'GET', '/user/admin-profile', 'list', AdminProfile::class, false, true],
    'User\\AdminProfile\\GetAdminProfileRequest' => [GetAdminProfileRequest::class, [7], 'GET', '/user/admin-profile/7', 'one', AdminProfile::class, false, false],
    'User\\AdminProfile\\GetAdminProfileUsageRequest' => [GetAdminProfileUsageRequest::class, [7], 'GET', '/user/admin-profile/7/usage', 'list', null, false, true],
    'User\\AdminProfile\\GetAdminProfileMappingRequest' => [GetAdminProfileMappingRequest::class, [], 'GET', '/user/admin-profile/mapping', 'list', AdminProfileMapping::class, false, true],
    'User\\AdminProfile\\GetAdminProfileMappingByIdRequest' => [GetAdminProfileMappingByIdRequest::class, [7], 'GET', '/user/admin-profile/mapping/7', 'list', AdminProfileMapping::class, false, true],
    'User\\AdminProfile\\GetAdminProfileMappingSupportingInfoRequest' => [GetAdminProfileMappingSupportingInfoRequest::class, [], 'GET', '/user/admin-profile/mapping/supporting-info', 'one', null, false, false],
    'User\\AdminProfile\\GetAdminProfileNewRequest' => [GetAdminProfileNewRequest::class, [], 'GET', '/user/admin-profile/new', 'one', AdminProfile::class, false, false],
    'User\\AdminProfile\\GetAdminProfilePermissionViewMapRequest' => [GetAdminProfilePermissionViewMapRequest::class, [], 'GET', '/user/admin-profile/permission-view-map', 'one', null, false, false],
    'User\\AdminProfile\\CreateAdminProfileRequest' => [CreateAdminProfileRequest::class, [['name' => 'x']], 'POST', '/user/admin-profile', 'one', AdminProfile::class, true, false],
    'User\\AdminProfile\\DeleteManyAdminProfilesRequest' => [DeleteManyAdminProfilesRequest::class, [], 'POST', '/user/admin-profile/delete', 'one', null, false, false],
    'User\\AdminProfile\\UpdateAdminProfileRequest' => [UpdateAdminProfileRequest::class, [7, ['name' => 'x']], 'POST', '/user/admin-profile/7', 'one', AdminProfile::class, true, false],
    'User\\AdminProfile\\DeleteAdminProfileViaPostRequest' => [DeleteAdminProfileViaPostRequest::class, [7], 'POST', '/user/admin-profile/7/delete', 'one', null, false, false],
    'User\\AdminProfile\\PostAdminProfileMappingRequest' => [PostAdminProfileMappingRequest::class, [['name' => 'x']], 'POST', '/user/admin-profile/mapping', 'one', AdminProfileMapping::class, true, false],
    'User\\AdminProfile\\PostAdminProfileMappingDeleteRequest' => [PostAdminProfileMappingDeleteRequest::class, [], 'POST', '/user/admin-profile/mapping/delete', 'one', null, false, false],
    'User\\AdminProfile\\PostAdminProfileMappingByIdRequest' => [PostAdminProfileMappingByIdRequest::class, [7, ['name' => 'x']], 'POST', '/user/admin-profile/mapping/7', 'one', AdminProfileMapping::class, true, false],
    'User\\AdminProfile\\PostAdminProfileMappingRankSetRequest' => [PostAdminProfileMappingRankSetRequest::class, [], 'POST', '/user/admin-profile/mapping/rank/set', 'one', null, false, false],
    'User\\AdminProfile\\PostAdminProfileMappingRankSwapRequest' => [PostAdminProfileMappingRankSwapRequest::class, [], 'POST', '/user/admin-profile/mapping/rank/swap', 'one', null, false, false],
    'User\\Dashboard\\DeleteDashboardRequest' => [DeleteDashboardRequest::class, [7], 'DELETE', '/user/dashboard/7', 'none', null, false, false],
    'User\\Dashboard\\GetDashboardAgentSummaryRequest' => [GetDashboardAgentSummaryRequest::class, [], 'GET', '/user/dashboard/agent-summary', 'raw', null, false, false],
    'User\\Dashboard\\GetDashboardDeviceSummaryRequest' => [GetDashboardDeviceSummaryRequest::class, [], 'GET', '/user/dashboard/device-summary', 'list', DashboardDeviceSummary::class, false, true],
    'User\\Dashboard\\PostDashboardDeviceSummaryDeviceByStatusRequest' => [PostDashboardDeviceSummaryDeviceByStatusRequest::class, ['sample', 'sample'], 'POST', '/user/dashboard/device-summary/device/sample/sample', 'list', DashboardDeviceSummaryDeviceByStatus::class, false, false],
    'User\\Dashboard\\GetDashboardDeviceSummaryPortOfflineRequest' => [GetDashboardDeviceSummaryPortOfflineRequest::class, [], 'GET', '/user/dashboard/device-summary/port/offline', 'list', DashboardDeviceSummaryDeviceByStatus::class, false, true],
    'User\\Dashboard\\GetDashboardDeviceSummaryPortOnlineRequest' => [GetDashboardDeviceSummaryPortOnlineRequest::class, [], 'GET', '/user/dashboard/device-summary/port/online', 'list', DashboardDeviceSummaryDeviceByStatus::class, false, true],
    'User\\Dashboard\\GetDashboardUsageRequest' => [GetDashboardUsageRequest::class, [7], 'GET', '/user/dashboard/7/usage', 'list', null, false, true],
    'User\\Dashboard\\GetDashboardScanSummaryPerDayRequest' => [GetDashboardScanSummaryPerDayRequest::class, [], 'GET', '/user/dashboard/scan-summary/per-day', 'one', DashboardScanSummaryPerDay::class, false, false],
    'User\\Dashboard\\GetDashboardScanSummaryPerHourRequest' => [GetDashboardScanSummaryPerHourRequest::class, [], 'GET', '/user/dashboard/scan-summary/per-hour', 'one', DashboardScanSummaryPerDay::class, false, false],
    'User\\Dashboard\\GetDashboardHostSummaryRequest' => [GetDashboardHostSummaryRequest::class, [], 'GET', '/user/dashboard/host-summary', 'one', null, false, false],
    'User\\Dashboard\\GetDashboardUserSummaryRequest' => [GetDashboardUserSummaryRequest::class, [], 'GET', '/user/dashboard/user-summary', 'one', null, false, false],
    'User\\Dashboard\\GetDashboardsRequest' => [GetDashboardsRequest::class, [], 'GET', '/user/dashboard', 'list', Dashboard::class, false, true],
    'User\\Dashboard\\GetDashboardRequest' => [GetDashboardRequest::class, [7], 'GET', '/user/dashboard/7', 'one', Dashboard::class, false, false],
    'User\\Dashboard\\DeleteManyDashboardsRequest' => [DeleteManyDashboardsRequest::class, [], 'POST', '/user/dashboard/delete', 'one', null, false, false],
    'User\\Dashboard\\DeleteDashboardViaPostRequest' => [DeleteDashboardViaPostRequest::class, [7], 'POST', '/user/dashboard/7/delete', 'one', null, false, false],
    'User\\Dashboard\\ResetDashboardToDefaultRequest' => [ResetDashboardToDefaultRequest::class, [7], 'POST', '/user/dashboard/7/resetToDefault', 'one', null, false, false],
    'User\\Dashboard\\CreateDashboardRequest' => [CreateDashboardRequest::class, [['name' => 'x']], 'POST', '/user/dashboard', 'one', Dashboard::class, true, false],
    'User\\Dashboard\\UpdateDashboardRequest' => [UpdateDashboardRequest::class, [7, ['name' => 'x']], 'POST', '/user/dashboard/7', 'list', Dashboard::class, true, false],
    'User\\Dashboard\\SetDashboardRankRequest' => [SetDashboardRankRequest::class, [], 'POST', '/user/dashboard/rank/set', 'one', null, false, false],
    'User\\GuestTemplate\\DeleteGuestTemplateRequest' => [DeleteGuestTemplateRequest::class, [7], 'DELETE', '/user/guest-template/7', 'none', null, false, false],
    'User\\GuestTemplate\\GetGuestTemplatesRequest' => [GetGuestTemplatesRequest::class, [], 'GET', '/user/guest-template', 'list', GuestTemplate::class, false, true],
    'User\\GuestTemplate\\CountGuestTemplatesRequest' => [CountGuestTemplatesRequest::class, [], 'GET', '/user/guest-template/count', 'scalar', null, false, false],
    'User\\GuestTemplate\\CountAllGuestTemplatesRequest' => [CountAllGuestTemplatesRequest::class, [], 'GET', '/user/guest-template/count/all', 'scalar', null, false, false],
    'User\\GuestTemplate\\GetGuestTemplateRequest' => [GetGuestTemplateRequest::class, [7], 'GET', '/user/guest-template/7', 'one', GuestTemplate::class, false, false],
    'User\\GuestTemplate\\GetGuestTemplateUsageRequest' => [GetGuestTemplateUsageRequest::class, [7], 'GET', '/user/guest-template/7/usage', 'list', null, false, true],
    'User\\GuestTemplate\\GetGuestTemplateResolveIpRequest' => [GetGuestTemplateResolveIpRequest::class, [], 'GET', '/user/guest-template/resolve-ip', 'raw', null, false, false],
    'User\\GuestTemplate\\CreateGuestTemplateRequest' => [CreateGuestTemplateRequest::class, [['name' => 'x']], 'POST', '/user/guest-template', 'one', GuestTemplate::class, true, false],
    'User\\GuestTemplate\\DeleteManyGuestTemplatesRequest' => [DeleteManyGuestTemplatesRequest::class, [], 'POST', '/user/guest-template/delete', 'one', null, false, false],
    'User\\GuestTemplate\\UpdateGuestTemplateRequest' => [UpdateGuestTemplateRequest::class, [7, ['name' => 'x']], 'POST', '/user/guest-template/7', 'one', GuestTemplate::class, true, false],
    'User\\GuestTemplate\\DeleteGuestTemplateViaPostRequest' => [DeleteGuestTemplateViaPostRequest::class, [7], 'POST', '/user/guest-template/7/delete', 'one', null, false, false],
    'User\\SelfRegistration\\GetSelfRegistrationsRequest' => [GetSelfRegistrationsRequest::class, [], 'GET', '/user/guest-self-registration', 'list', SelfRegistration::class, false, true],
    'User\\SelfRegistration\\CountSelfRegistrationsRequest' => [CountSelfRegistrationsRequest::class, [], 'GET', '/user/guest-self-registration/count', 'scalar', null, false, false],
    'User\\SelfRegistration\\GetSelfRegistrationDetailsRequest' => [GetSelfRegistrationDetailsRequest::class, [7], 'GET', '/user/guest-self-registration/7/details', 'one', SelfRegistrationDetails::class, false, false],
    'User\\SelfRegistration\\CountAllSelfRegistrationsRequest' => [CountAllSelfRegistrationsRequest::class, [], 'GET', '/user/guest-self-registration/count/all', 'scalar', null, false, false],
    'User\\SelfRegistration\\GetSelfRegistrationDenyRequest' => [GetSelfRegistrationDenyRequest::class, [7], 'GET', '/user/guest-self-registration/7/deny', 'raw', null, false, false],
    'User\\SelfRegistration\\GetSelfRegistrationRequest' => [GetSelfRegistrationRequest::class, [7], 'GET', '/user/guest-self-registration/7', 'one', SelfRegistration::class, false, false],
    'User\\SelfRegistration\\ApproveSelfRegistrationRequest' => [ApproveSelfRegistrationRequest::class, [7], 'POST', '/user/guest-self-registration/7/approve', 'one', null, false, false],
    'User\\Guest\\CountGuestsRequest' => [CountGuestsRequest::class, [], 'GET', '/user/guest/count', 'scalar', null, false, false],
    'User\\Guest\\GetGuestsRequest' => [GetGuestsRequest::class, [], 'GET', '/user/guest', 'list', Guest::class, false, true],
    'User\\Guest\\GetGuestConferenceRegistrationsCountRequest' => [GetGuestConferenceRegistrationsCountRequest::class, [], 'GET', '/user/guest/conference/registrations/count', 'one', GuestConferenceRegistrationsCount::class, false, false],
    'User\\Guest\\CountAllGuestsRequest' => [CountAllGuestsRequest::class, [], 'GET', '/user/guest/count/all', 'scalar', null, false, false],
    'User\\Guest\\GetGuestGetPasswordRequest' => [GetGuestGetPasswordRequest::class, [7], 'GET', '/user/guest/7/get-password', 'raw', null, false, false],
    'User\\Guest\\GetGuestRequest' => [GetGuestRequest::class, [7], 'GET', '/user/guest/7', 'one', Guest::class, false, false],
    'User\\Guest\\CreateGuestRequest' => [CreateGuestRequest::class, [['name' => 'x']], 'POST', '/user/guest', 'one', Guest::class, true, false],
    'User\\Guest\\PostGuestBulkRequest' => [PostGuestBulkRequest::class, [['name' => 'x']], 'POST', '/user/guest/bulk', 'one', Guest::class, true, false],
    'User\\Guest\\DeleteGuestViaPostRequest' => [DeleteGuestViaPostRequest::class, [7], 'POST', '/user/guest/7/delete', 'one', null, false, false],
    'User\\Guest\\UpdateGuestRequest' => [UpdateGuestRequest::class, [7, ['name' => 'x']], 'POST', '/user/guest/7', 'one', Guest::class, true, false],
    'User\\Guest\\GenerateGuestPasswordFromTemplateRequest' => [GenerateGuestPasswordFromTemplateRequest::class, [], 'POST', '/user/guest/generate-password-from-template', 'one', null, false, false],
    'User\\Guest\\DisableGuestRequest' => [DisableGuestRequest::class, [7], 'POST', '/user/guest/7/disable', 'one', null, false, false],
    'User\\Guest\\GenerateGuestPasswordRequest' => [GenerateGuestPasswordRequest::class, [7], 'POST', '/user/guest/7/generate-password', 'scalar', null, false, false],
    'User\\Guest\\DeleteManyGuestsRequest' => [DeleteManyGuestsRequest::class, [], 'POST', '/user/guest/delete', 'one', null, false, false],
    'User\\Guest\\EnableGuestRequest' => [EnableGuestRequest::class, [7], 'POST', '/user/guest/7/enable', 'one', null, false, false],
    'User\\Guest\\GetGuestPasswordRequest' => [GetGuestPasswordRequest::class, [], 'POST', '/user/guest/get-password', 'one', null, false, false],
    'User\\Guest\\ResetGuestPasswordRequest' => [ResetGuestPasswordRequest::class, [], 'POST', '/user/guest/reset-password', 'one', null, false, false],
    'User\\Guest\\SendGuestEmailRequest' => [SendGuestEmailRequest::class, [], 'POST', '/user/guest/send-email', 'one', null, false, false],
    'User\\Guest\\PostGuestConferenceRequest' => [PostGuestConferenceRequest::class, [], 'POST', '/user/guest/conference', 'one', null, false, false],
    'User\\Guest\\SendGuestSmsRequest' => [SendGuestSmsRequest::class, [], 'POST', '/user/guest/send-sms', 'one', null, false, false],
    'User\\Guest\\DeleteGuestRequest' => [DeleteGuestRequest::class, [7], 'DELETE', '/user/guest/7', 'none', null, false, false],
    'User\\UserAttribute\\GetUserAttributeRequest' => [GetUserAttributeRequest::class, ['sample'], 'GET', '/user/attributes/sample', 'one', null, false, false],
    'User\\UserAttribute\\GetUserAttributeUserByNameRequest' => [GetUserAttributeUserByNameRequest::class, ['sample'], 'GET', '/user/attributes/user/sample', 'one', null, false, false],
    'User\\UserAttribute\\UpdateUserAttributeRequest' => [UpdateUserAttributeRequest::class, ['sample'], 'POST', '/user/attributes/sample', 'one', null, false, false],
    'User\\UserAttribute\\PostUserAttributeUserByNameRequest' => [PostUserAttributeUserByNameRequest::class, ['sample'], 'POST', '/user/attributes/user/sample', 'one', null, false, false],
    'User\\CurrentSession\\GetCurrentSessionCacheRequest' => [GetCurrentSessionCacheRequest::class, [], 'GET', '/user/current-session/cache', 'one', null, false, false],
    'User\\CurrentSession\\GetCurrentSessionFeatureVisibilityRequest' => [GetCurrentSessionFeatureVisibilityRequest::class, [], 'GET', '/user/current-session/feature-visibility', 'one', null, false, false],
    'User\\CurrentSession\\GetCurrentSessionBookmarkRequest' => [GetCurrentSessionBookmarkRequest::class, [], 'GET', '/user/current-session/bookmark', 'list', CurrentSessionBookmark::class, false, true],
    'User\\CurrentSession\\GetCurrentSessionTimeoutRequest' => [GetCurrentSessionTimeoutRequest::class, [], 'GET', '/user/current-session/timeout', 'one', SessionTimeout::class, false, false],
    'User\\CurrentSession\\GetCurrentSessionSecurityKeyRequest' => [GetCurrentSessionSecurityKeyRequest::class, [], 'GET', '/user/current-session/securityKey', 'one', null, false, false],
    'User\\CurrentSession\\GetCurrentSessionNavigationSettingsRequest' => [GetCurrentSessionNavigationSettingsRequest::class, [], 'GET', '/user/current-session/navigation-settings', 'one', null, false, false],
    'User\\CurrentSession\\PostCurrentSessionBookmarkByIdRequest' => [PostCurrentSessionBookmarkByIdRequest::class, [7, ['name' => 'x']], 'POST', '/user/current-session/bookmark/7', 'one', CurrentSessionBookmark::class, true, false],
    'User\\CurrentSession\\PostCurrentSessionBookmarkUuidDeleteRequest' => [PostCurrentSessionBookmarkUuidDeleteRequest::class, [7], 'POST', '/user/current-session/bookmark/uuid/7/delete', 'one', null, false, false],
    'User\\CurrentSession\\PostCurrentSessionBookmarkRequest' => [PostCurrentSessionBookmarkRequest::class, [['name' => 'x']], 'POST', '/user/current-session/bookmark', 'one', CurrentSessionBookmark::class, true, false],
    'User\\CurrentSession\\PostCurrentSessionBookmarkDeleteRequest' => [PostCurrentSessionBookmarkDeleteRequest::class, [], 'POST', '/user/current-session/bookmark/delete', 'one', null, false, false],
    'User\\CurrentSession\\PostCurrentSessionBookmarkDelete2Request' => [PostCurrentSessionBookmarkDelete2Request::class, [7], 'POST', '/user/current-session/bookmark/7/delete', 'one', null, false, false],
    'User\\CurrentSession\\PostCurrentSessionCacheRequest' => [PostCurrentSessionCacheRequest::class, [], 'POST', '/user/current-session/cache', 'one', null, false, false],
    'User\\CurrentSession\\PostCurrentSessionBookmarkSyncRequest' => [PostCurrentSessionBookmarkSyncRequest::class, [['name' => 'x']], 'POST', '/user/current-session/bookmark/sync', 'one', null, true, false],
    'User\\CurrentSession\\PostCurrentSessionFeatureVisibilityRequest' => [PostCurrentSessionFeatureVisibilityRequest::class, [['name' => 'x']], 'POST', '/user/current-session/feature-visibility', 'one', null, true, false],
    'User\\CurrentSession\\InitializeCurrentSessionRootUserRequest' => [InitializeCurrentSessionRootUserRequest::class, [], 'POST', '/user/current-session/initialize-root-user', 'one', null, false, false],
    'User\\CurrentSession\\LoginCurrentSessionRequest' => [LoginCurrentSessionRequest::class, [], 'POST', '/user/current-session/login', 'one', null, false, false],
    'User\\CurrentSession\\LogoutCurrentSessionRequest' => [LogoutCurrentSessionRequest::class, [], 'POST', '/user/current-session/logout', 'one', null, false, false],
    'User\\CurrentSession\\AcceptCurrentSessionUsagePolicyRequest' => [AcceptCurrentSessionUsagePolicyRequest::class, [], 'POST', '/user/current-session/accept-usage-policy', 'one', null, false, false],
    'User\\CurrentSession\\DeleteCurrentSessionBookmarkByIdRequest' => [DeleteCurrentSessionBookmarkByIdRequest::class, [7], 'DELETE', '/user/current-session/bookmark/7', 'none', null, false, false],
    'User\\User\\GetUsersRequest' => [GetUsersRequest::class, [], 'GET', '/user', 'list', User::class, false, true],
    'User\\User\\CountUsersRequest' => [CountUsersRequest::class, [], 'GET', '/user/count', 'scalar', null, false, false],
    'User\\User\\GetUserAllowHostsRequest' => [GetUserAllowHostsRequest::class, [], 'GET', '/user/allow-hosts', 'scalar', null, false, false],
    'User\\User\\GetUserIdByIdRequest' => [GetUserIdByIdRequest::class, [7], 'GET', '/user/id/7', 'one', User::class, false, false],
    'User\\User\\CountAllUsersRequest' => [CountAllUsersRequest::class, [], 'GET', '/user/count/all', 'scalar', null, false, false],
    'User\\User\\GetUserHasHostsRequest' => [GetUserHasHostsRequest::class, [], 'GET', '/user/has-hosts', 'raw', null, false, false],
    'User\\User\\GetUserGetPolicyRequest' => [GetUserGetPolicyRequest::class, [7], 'GET', '/user/7/get-policy', 'raw', null, false, false],
    'User\\User\\GetUserUsageRequest' => [GetUserUsageRequest::class, [7], 'GET', '/user/7/usage', 'list', null, false, false],
    'User\\User\\GetUserSearchUserByUserIDRequest' => [GetUserSearchUserByUserIDRequest::class, [], 'GET', '/user/search-user-by-userID', 'one', UserSearch::class, false, false],
    'User\\User\\GetUserGetAgentRequest' => [GetUserGetAgentRequest::class, [7], 'GET', '/user/7/get-agent', 'scalar', null, false, false],
    'User\\User\\CreateUserRequest' => [CreateUserRequest::class, [['name' => 'x']], 'POST', '/user', 'one', User::class, true, false],
    'User\\User\\PostUserAllowHostsRequest' => [PostUserAllowHostsRequest::class, [], 'POST', '/user/allow-hosts', 'one', null, false, false],
    'User\\User\\DeleteManyUsersRequest' => [DeleteManyUsersRequest::class, [], 'POST', '/user/delete', 'one', null, false, false],
    'User\\User\\DisableManyUsersRequest' => [DisableManyUsersRequest::class, [], 'POST', '/user/disable', 'one', null, false, false],
    'User\\User\\UpdateUserRequest' => [UpdateUserRequest::class, [7, ['name' => 'x']], 'POST', '/user/7', 'one', User::class, true, false],
    'User\\User\\EnableManyUsersRequest' => [EnableManyUsersRequest::class, [], 'POST', '/user/enable', 'one', null, false, false],
    'User\\User\\DisableUserRequest' => [DisableUserRequest::class, [7], 'POST', '/user/7/disable', 'one', null, false, false],
    'User\\User\\EnableUserRequest' => [EnableUserRequest::class, [7], 'POST', '/user/7/enable', 'one', null, false, false],
    'User\\User\\SetUserRoleRequest' => [SetUserRoleRequest::class, [], 'POST', '/user/set-role', 'one', null, false, false],
    'User\\User\\SetUserProfileRequest' => [SetUserProfileRequest::class, [], 'POST', '/user/set-profile', 'one', null, false, false],
    'User\\User\\SetUserPasswordRequest' => [SetUserPasswordRequest::class, [], 'POST', '/user/set-password', 'one', null, false, false],
    'User\\User\\DeleteUserViaPostRequest' => [DeleteUserViaPostRequest::class, [7], 'POST', '/user/7/delete', 'one', null, false, false],
    'User\\User\\DeleteUserRequest' => [DeleteUserRequest::class, [7], 'DELETE', '/user/7', 'none', null, false, false],
    'Winbind\\WinbindConfig\\GetWinbindConfigsRequest' => [GetWinbindConfigsRequest::class, [], 'GET', '/winbind/config', 'list', WinbindConfig::class, false, true],
    'Winbind\\WinbindConfig\\GetWinbindConfigAllRequest' => [GetWinbindConfigAllRequest::class, [], 'GET', '/winbind/config/all', 'list', WinbindConfig::class, false, true],
    'Winbind\\WinbindConfig\\GetWinbindConfigGlobalRequest' => [GetWinbindConfigGlobalRequest::class, [], 'GET', '/winbind/config/global', 'one', null, false, false],
    'Winbind\\WinbindConfig\\GetWinbindConfigRequest' => [GetWinbindConfigRequest::class, [7], 'GET', '/winbind/config/7', 'one', WinbindConfig::class, false, false],
    'Winbind\\WinbindConfig\\PostWinbindConfigLogRequest' => [PostWinbindConfigLogRequest::class, [], 'POST', '/winbind/config/log', 'one', null, false, false],
    'Winbind\\WinbindConfig\\GetWinbindConfigStatusRequest' => [GetWinbindConfigStatusRequest::class, [], 'GET', '/winbind/config/status', 'one', null, false, false],
    'Winbind\\WinbindConfig\\CreateWinbindConfigRequest' => [CreateWinbindConfigRequest::class, [['name' => 'x']], 'POST', '/winbind/config', 'list', WinbindConfig::class, true, false],
    'Winbind\\WinbindConfig\\DeleteManyWinbindConfigsRequest' => [DeleteManyWinbindConfigsRequest::class, [], 'POST', '/winbind/config/delete', 'one', null, false, false],
    'Winbind\\WinbindConfig\\DisableManyWinbindConfigsRequest' => [DisableManyWinbindConfigsRequest::class, [], 'POST', '/winbind/config/disable', 'one', null, false, false],
    'Winbind\\WinbindConfig\\EnableManyWinbindConfigsRequest' => [EnableManyWinbindConfigsRequest::class, [], 'POST', '/winbind/config/enable', 'one', null, false, false],
    'Winbind\\WinbindConfig\\UpdateWinbindConfigRequest' => [UpdateWinbindConfigRequest::class, [7, ['name' => 'x']], 'POST', '/winbind/config/7', 'list', WinbindConfig::class, true, false],
    'Winbind\\WinbindConfig\\JoinWinbindConfigDomainByIdRequest' => [JoinWinbindConfigDomainByIdRequest::class, [7], 'POST', '/winbind/config/joinDomain/7', 'one', null, false, false],
    'Winbind\\WinbindConfig\\DeleteWinbindConfigRequest' => [DeleteWinbindConfigRequest::class, [7], 'DELETE', '/winbind/config/7', 'none', null, false, false],
];
