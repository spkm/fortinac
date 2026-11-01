<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Agent, device, integration and security settings. FortiNac::settings().
 *
 * @extends BaseResource<Data>
 */
class SettingsResources extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Agent Update.
     */
    public function agentUpdate(): AgentUpdateResource
    {
        return new AgentUpdateResource($this->connector);
    }

    /**
     * Agent Packages.
     */
    public function agentPackages(): AgentPackageResource
    {
        return new AgentPackageResource($this->connector);
    }

    /**
     * Credential Config.
     */
    public function credentialConfig(): CredentialConfigResource
    {
        return new CredentialConfigResource($this->connector);
    }

    /**
     * Directory Agent Config.
     */
    public function directoryAgents(): DirectoryAgentResource
    {
        return new DirectoryAgentResource($this->connector);
    }

    /**
     * PA Packet Transport Config.
     */
    public function paPacketTransportConfigs(): PaPacketTransportConfigResource
    {
        return new PaPacketTransportConfigResource($this->connector);
    }

    /**
     * Security Mgmnt Properties.
     */
    public function agentProperties(): AgentPropertiesResource
    {
        return new AgentPropertiesResource($this->connector);
    }

    /**
     * SMS Provider, Status Notifications.
     */
    public function statusNotifications(): StatusNotificationsResource
    {
        return new StatusNotificationsResource($this->connector);
    }

    /**
     * Access Point Management.
     */
    public function accessPointManagement(): AccessPointManagementResource
    {
        return new AccessPointManagementResource($this->connector);
    }

    /**
     * Allowed Domains.
     */
    public function allowedDomains(): AllowedDomainsResource
    {
        return new AllowedDomainsResource($this->connector);
    }

    /**
     * Device Profiler.
     */
    public function deviceProfiler(): DeviceProfilerSettingsResource
    {
        return new DeviceProfilerSettingsResource($this->connector);
    }

    /**
     * Device Type.
     */
    public function deviceTypes(): DeviceTypeResource
    {
        return new DeviceTypeResource($this->connector);
    }

    /**
     * Mac Exclusion.
     */
    public function macExclusions(): MacExclusionResource
    {
        return new MacExclusionResource($this->connector);
    }

    /**
     * Nat Detection.
     */
    public function natDetection(): NatDetectionResource
    {
        return new NatDetectionResource($this->connector);
    }

    /**
     * Network Address Group.
     */
    public function networkAddressGroups(): NetworkAddressGroupResource
    {
        return new NetworkAddressGroupResource($this->connector);
    }

    /**
     * Network Address.
     */
    public function networkAddresses(): NetworkAddressResource
    {
        return new NetworkAddressResource($this->connector);
    }

    /**
     * Quarantine.
     */
    public function quarantine(): QuarantineResource
    {
        return new QuarantineResource($this->connector);
    }

    /**
     * Rogue DHCP Detection.
     */
    public function rogueDhcpDetection(): RogueDhcpDetectionResource
    {
        return new RogueDhcpDetectionResource($this->connector);
    }

    /**
     * AAA Server.
     */
    public function aaaMappings(): AaaMappingResource
    {
        return new AaaMappingResource($this->connector);
    }

    /**
     * AAA Server.
     */
    public function aaaServers(): AaaServerResource
    {
        return new AaaServerResource($this->connector);
    }

    /**
     * Email.
     */
    public function email(): EmailSettingsResource
    {
        return new EmailSettingsResource($this->connector);
    }

    /**
     * Firewall Tag.
     */
    public function firewallTags(): FirewallTagResource
    {
        return new FirewallTagResource($this->connector);
    }

    /**
     * FSSO.
     */
    public function fsso(): FssoSettingsResource
    {
        return new FssoSettingsResource($this->connector);
    }

    /**
     * Google.
     */
    public function google(): GoogleSettingsResource
    {
        return new GoogleSettingsResource($this->connector);
    }

    /**
     * LDAP.
     */
    public function ldap(): LdapServerResource
    {
        return new LdapServerResource($this->connector);
    }

    /**
     * Log Receiver.
     */
    public function logReceiver(): LogReceiverResource
    {
        return new LogReceiverResource($this->connector);
    }

    /**
     * MDM.
     */
    public function mdm(): MdmServerResource
    {
        return new MdmServerResource($this->connector);
    }

    /**
     * Message Template.
     */
    public function messageTemplates(): MessageTemplateResource
    {
        return new MessageTemplateResource($this->connector);
    }

    /**
     * Messaging Gateway.
     */
    public function messagingGateways(): MessagingGatewayResource
    {
        return new MessagingGatewayResource($this->connector);
    }

    /**
     * Patch Management.
     */
    public function patchManagement(): PatchManagementResource
    {
        return new PatchManagementResource($this->connector);
    }

    /**
     * Proxy.
     */
    public function proxy(): ProxySettingsResource
    {
        return new ProxySettingsResource($this->connector);
    }

    /**
     * Security Event Parser.
     */
    public function securityEventParsers(): SecurityEventParserResource
    {
        return new SecurityEventParserResource($this->connector);
    }

    /**
     * SMS Provider.
     */
    public function smsProviders(): SmsProviderResource
    {
        return new SmsProviderResource($this->connector);
    }

    /**
     * SNMP.
     */
    public function snmp(): SnmpSettingsResource
    {
        return new SnmpSettingsResource($this->connector);
    }

    /**
     * Syslog.
     */
    public function syslog(): SyslogServerResource
    {
        return new SyslogServerResource($this->connector);
    }

    /**
     * Trap MIB.
     */
    public function trapMibs(): TrapMibResource
    {
        return new TrapMibResource($this->connector);
    }

    /**
     * Role, Vendor OUI.
     */
    public function vendorOuis(): VendorOuiResource
    {
        return new VendorOuiResource($this->connector);
    }

    /**
     * Vulnerability Scanner.
     */
    public function vulnerabilityScanners(): VulnerabilityScannerResource
    {
        return new VulnerabilityScannerResource($this->connector);
    }

    /**
     * Certificate.
     */
    public function certificates(): CertificateResource
    {
        return new CertificateResource($this->connector);
    }

    /**
     * Web Service Definition.
     */
    public function webServiceDefinitions(): WebServiceDefinitionResource
    {
        return new WebServiceDefinitionResource($this->connector);
    }

    /**
     * FortiGate Telemetry.
     */
    public function fortiGateTelemetry(): FortiGateTelemetryResource
    {
        return new FortiGateTelemetryResource($this->connector);
    }

    /**
     * TLS Service Configuration.
     */
    public function tlsServiceConfigurations(): TlsServiceConfigurationResource
    {
        return new TlsServiceConfigurationResource($this->connector);
    }

    /**
     * OS Update.
     */
    public function osUpdates(): OsUpdateResource
    {
        return new OsUpdateResource($this->connector);
    }
}
