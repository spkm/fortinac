<?php

namespace spkm\FortiNac\Resources\User;

/**
 * Users, guests, admin profiles, dashboards and the current session.
 *
 * FortiNac::user() is itself the builder over User Record (UserResource); the API's other
 * collections are its methods.
 */
class UserResources extends UserResource
{
    /**
     * Admin Profile.
     */
    public function adminProfiles(): AdminProfileResource
    {
        return new AdminProfileResource($this->connector);
    }

    /**
     * Dashboard.
     */
    public function dashboards(): DashboardResource
    {
        return new DashboardResource($this->connector);
    }

    /**
     * GuestTemplate.
     */
    public function guestTemplates(): GuestTemplateResource
    {
        return new GuestTemplateResource($this->connector);
    }

    /**
     * Self Registration.
     */
    public function selfRegistrations(): SelfRegistrationResource
    {
        return new SelfRegistrationResource($this->connector);
    }

    /**
     * Guest Account.
     */
    public function guests(): GuestResource
    {
        return new GuestResource($this->connector);
    }

    /**
     * User.
     */
    public function attributes(): UserAttributeResource
    {
        return new UserAttributeResource($this->connector);
    }

    /**
     * User.
     */
    public function currentSession(): CurrentSessionResource
    {
        return new CurrentSessionResource($this->connector);
    }
}
