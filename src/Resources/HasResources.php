<?php

namespace spkm\FortiNac\Resources;

/**
 * A resource group for every API FortiNAC documents, on the connector and so on the FortiNac facade.
 */
trait HasResources
{
    /**
     * Adapter records: the network interfaces FortiNAC has seen, each belonging to a host.
     */
    public function adapters(): Adapter\AdapterResource
    {
        return new Adapter\AdapterResource($this);
    }

    /**
     * Network devices, their ports and containers, and the scans that find them.
     */
    public function device(): Device\DeviceResources
    {
        return new Device\DeviceResources($this);
    }

    /**
     * Host records and what FortiNAC knows about them: identities, fingerprints, scans and profiling rules.
     */
    public function host(): Host\HostResources
    {
        return new Host\HostResources($this);
    }

    /**
     * Firewall sessions: the connections FortiNAC learns from FortiGate.
     */
    public function firewallSessions(): Dynamic\FirewallSessionResource
    {
        return new Dynamic\FirewallSessionResource($this);
    }

    /**
     * Alarms, events, the audit log and the connection log.
     */
    public function logging(): Logging\LoggingResources
    {
        return new Logging\LoggingResources($this);
    }

    /**
     * The policies FortiNAC applies: access, authentication, endpoint compliance, portal, roles, security rules and supplicants.
     */
    public function policy(): Policy\PolicyResources
    {
        return new Policy\PolicyResources($this);
    }

    /**
     * Captive portal settings.
     */
    public function portalSettings(): Portal\PortalSslSettingsResource
    {
        return new Portal\PortalSslSettingsResource($this);
    }

    /**
     * FortiNAC's RADIUS servers, attribute groups, dictionary and health.
     */
    public function radius(): Radius\RadiusResources
    {
        return new Radius\RadiusResources($this);
    }

    /**
     * Agent, device, integration and security settings.
     */
    public function settings(): Settings\SettingsResources
    {
        return new Settings\SettingsResources($this);
    }

    /**
     * SSIDs and their configuration.
     */
    public function ssids(): Ssid\SsidResource
    {
        return new Ssid\SsidResource($this);
    }

    /**
     * The system itself: groups, tasks, the scheduler, backups, licences and managed servers.
     */
    public function system(): System\SystemResources
    {
        return new System\SystemResources($this);
    }

    /**
     * Users, guests, admin profiles, dashboards and the current session.
     */
    public function user(): User\UserResources
    {
        return new User\UserResources($this);
    }

    /**
     * Winbind (Active Directory) configuration.
     */
    public function winbind(): Winbind\WinbindConfigResource
    {
        return new Winbind\WinbindConfigResource($this);
    }
}
