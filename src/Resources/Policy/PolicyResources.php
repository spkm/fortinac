<?php

namespace spkm\FortiNac\Resources\Policy;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Resources\BaseResource;

/**
 * The policies FortiNAC applies: access, authentication, endpoint compliance, portal, roles, security rules and supplicants. FortiNac::policy().
 *
 * @extends BaseResource<Data>
 */
class PolicyResources extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Access Configuration.
     */
    public function accessConfigurations(): AccessConfigurationResource
    {
        return new AccessConfigurationResource($this->connector);
    }

    /**
     * Access Policy.
     */
    public function accessPolicies(): AccessPolicyResource
    {
        return new AccessPolicyResource($this->connector);
    }

    /**
     * Authentication Configuration.
     */
    public function authenticationConfigurations(): AuthenticationConfigurationResource
    {
        return new AuthenticationConfigurationResource($this->connector);
    }

    /**
     * Authentication Policy.
     */
    public function authenticationPolicies(): AuthenticationPolicyResource
    {
        return new AuthenticationPolicyResource($this->connector);
    }

    /**
     * Endpoint Compliance Configuration.
     */
    public function endpointComplianceConfigurations(): EndpointComplianceConfigurationResource
    {
        return new EndpointComplianceConfigurationResource($this->connector);
    }

    /**
     * Endpoint Compliance Custom Scan.
     */
    public function endpointComplianceCustomScans(): EndpointComplianceCustomScanResource
    {
        return new EndpointComplianceCustomScanResource($this->connector);
    }

    /**
     * Endpoint Compliance Scan.
     */
    public function endpointComplianceScans(): EndpointComplianceScanResource
    {
        return new EndpointComplianceScanResource($this->connector);
    }

    /**
     * Endpoint Compliance Policy.
     */
    public function endpointCompliancePolicies(): EndpointCompliancePolicyResource
    {
        return new EndpointCompliancePolicyResource($this->connector);
    }

    /**
     * Event Action.
     */
    public function eventActions(): EventActionResource
    {
        return new EventActionResource($this->connector);
    }

    /**
     * Logical Network Configuration.
     */
    public function logicalNetworkConfigurations(): LogicalNetworkConfigurationResource
    {
        return new LogicalNetworkConfigurationResource($this->connector);
    }

    /**
     * Logical Network.
     */
    public function logicalNetworks(): LogicalNetworkResource
    {
        return new LogicalNetworkResource($this->connector);
    }

    /**
     * Portal Configuration, Portal Policy.
     */
    public function portalConfigurations(): PortalConfigurationResource
    {
        return new PortalConfigurationResource($this->connector);
    }

    /**
     * Portal Policy.
     */
    public function portalPolicies(): PortalPolicyResource
    {
        return new PortalPolicyResource($this->connector);
    }

    /**
     * Role.
     */
    public function roleMappings(): RoleMappingResource
    {
        return new RoleMappingResource($this->connector);
    }

    /**
     * Role.
     */
    public function roles(): RoleResource
    {
        return new RoleResource($this->connector);
    }

    /**
     * Security Event.
     */
    public function securityAlarms(): SecurityAlarmResource
    {
        return new SecurityAlarmResource($this->connector);
    }

    /**
     * Security Event.
     */
    public function securityEventSummary(): SecurityEventSummaryResource
    {
        return new SecurityEventSummaryResource($this->connector);
    }

    /**
     * Security Event.
     */
    public function securityEvents(): SecurityEventResource
    {
        return new SecurityEventResource($this->connector);
    }

    /**
     * Security Rule.
     */
    public function securityRuleTriggers(): SecurityRuleTriggerResource
    {
        return new SecurityRuleTriggerResource($this->connector);
    }

    /**
     * Security Rule.
     */
    public function securityRules(): SecurityRuleResource
    {
        return new SecurityRuleResource($this->connector);
    }

    /**
     * Supplicant Policy.
     */
    public function supplicantConfigurations(): SupplicantConfigurationResource
    {
        return new SupplicantConfigurationResource($this->connector);
    }

    /**
     * Supplicant Policy.
     */
    public function supplicantPolicies(): SupplicantPolicyResource
    {
        return new SupplicantPolicyResource($this->connector);
    }

    /**
     * User Host Profile.
     */
    public function userHostProfiles(): UserHostProfileResource
    {
        return new UserHostProfileResource($this->connector);
    }
}
