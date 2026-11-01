<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A ScheduledTaskActivityTypes record.
 */
readonly class ScheduledTaskActivityTypes extends Data
{
    protected const ALIASES = ['Enable_Ports' => 'Enable Ports', 'Custom_Script' => 'Custom Script', 'Resynchronize_Device' => 'Resynchronize Device', 'Synchronize_Users_from_Directory' => 'Synchronize Users from Directory', 'Check_for_OS_Updates' => 'Check for OS Updates', 'Verify_DHCP_Servers' => 'Verify DHCP Servers', 'Auto_Definition_Synchronizer' => 'Auto-Definition Synchronizer', 'System_Backup' => 'System Backup', 'Host_At_Risk' => 'Host At Risk', 'Certificate_Expiration_Monitor' => 'Certificate Expiration Monitor', 'Report_Generation' => 'Report Generation', 'Role_Assignment' => 'Role Assignment', 'Update_Default_VLAN_Values' => 'Update Default VLAN Values', 'Enable_Host' => 'Enable Host', 'CLI_Configuration' => 'CLI Configuration', 'Enable_HP_NT_Port_Security' => 'Enable HP/NT Port Security', 'Disable_Host' => 'Disable Host', 'Enable_Adapters' => 'Enable Adapters', 'SSID_Assignment' => 'SSID Assignment', 'Update_Interface_Status' => 'Update Interface Status', 'Disable_Ports' => 'Disable Ports', 'Port_Vlan_Switch' => 'Port Vlan Switch', 'Agentless_Host_Scanning' => 'Agentless Host Scanning', 'Database_Backup' => 'Database Backup', 'Disable_HP_NT_Port_Security' => 'Disable HP/NT Port Security', 'Policy_Rescan' => 'Policy Rescan', 'Command_Line_Script' => 'Command Line Script', 'Host_Safe' => 'Host Safe', 'Security_Rescan' => 'Security Rescan', 'Disable_Adapters' => 'Disable Adapters', 'Packeteer_Configuration' => 'Packeteer Configuration', 'Database_Archive_and_Purge' => 'Database Archive and Purge', 'Modify_Device_VLAN_Values' => 'Modify Device VLAN Values'];

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $Enable_Ports = null,
        public ?string $Custom_Script = null,
        public ?string $Resynchronize_Device = null,
        public ?string $Synchronize_Users_from_Directory = null,
        public ?string $Check_for_OS_Updates = null,
        public ?string $Verify_DHCP_Servers = null,
        public ?string $Auto_Definition_Synchronizer = null,
        public ?string $System_Backup = null,
        public ?string $Host_At_Risk = null,
        public ?string $Certificate_Expiration_Monitor = null,
        public ?string $Report_Generation = null,
        public ?string $Role_Assignment = null,
        public ?string $Update_Default_VLAN_Values = null,
        public ?string $Enable_Host = null,
        public ?string $CLI_Configuration = null,
        public ?string $Enable_HP_NT_Port_Security = null,
        public ?string $Disable_Host = null,
        public ?string $Enable_Adapters = null,
        public ?string $SSID_Assignment = null,
        public ?string $Update_Interface_Status = null,
        public ?string $Disable_Ports = null,
        public ?string $Port_Vlan_Switch = null,
        public ?string $Agentless_Host_Scanning = null,
        public ?string $Database_Backup = null,
        public ?string $Disable_HP_NT_Port_Security = null,
        public ?string $Policy_Rescan = null,
        public ?string $Command_Line_Script = null,
        public ?string $Host_Safe = null,
        public ?string $Security_Rescan = null,
        public ?string $Disable_Adapters = null,
        public ?string $Packeteer_Configuration = null,
        public ?string $Database_Archive_and_Purge = null,
        public ?string $Modify_Device_VLAN_Values = null,
        public array $extra = [],
    ) {}
}
