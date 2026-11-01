<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\RogueDhcpDetection;
use spkm\FortiNac\Data\Settings\RogueDhcpDetectionVlans;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Settings\RogueDhcpDetection\GetRogueDhcpDetectionRequest;
use spkm\FortiNac\Requests\Settings\RogueDhcpDetection\GetRogueDhcpDetectionVlansRequest;
use spkm\FortiNac\Requests\Settings\RogueDhcpDetection\PostRogueDhcpDetectionVlanDeleteRequest;
use spkm\FortiNac\Requests\Settings\RogueDhcpDetection\PostRogueDhcpDetectionVlanRequest;
use spkm\FortiNac\Requests\Settings\RogueDhcpDetection\UpdateRogueDhcpDetectionRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * Rogue DHCP Detection, from FortiNac::settings()->rogueDhcpDetection().
 *
 * @extends SingletonResource<RogueDhcpDetection>
 */
class RogueDhcpDetectionResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, RogueDhcpDetection::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetRogueDhcpDetectionRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateRogueDhcpDetectionRequest([...$body, ...$options]);
    }

    /**
     * Returns the configured rogue DHCP vlans to scan: GET /settings/device/rogue-DHCP-detection/vlans.
     */
    public function vlans(): ?RogueDhcpDetectionVlans
    {
        return $this->fetchOrNull(new GetRogueDhcpDetectionVlansRequest);
    }

    /**
     * Adds a new vlan to scan for Rogue DHCP detection: POST /settings/device/rogue-DHCP-detection/vlan.
     *
     * @param  array<string, mixed>  $options  Query options: vlan, vlanName, dbid
     */
    public function vlan(array $options = []): bool
    {
        return $this->perform(new PostRogueDhcpDetectionVlanRequest($options));
    }

    /**
     * Deletes one or more vlans being scanned for Rogue DHCP servers: POST /settings/device/rogue-DHCP-detection/vlan/delete.
     *
     * @param  array<string, mixed>  $options  Query options: dbid
     */
    public function vlanDelete(array $options = []): bool
    {
        return $this->perform(new PostRogueDhcpDetectionVlanDeleteRequest($options));
    }
}
