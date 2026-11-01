<?php

namespace spkm\FortiNac\Resources\Radius;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Resources\BaseResource;

/**
 * FortiNAC's RADIUS servers, attribute groups, dictionary and health. FortiNac::radius().
 *
 * @extends BaseResource<Data>
 */
class RadiusResources extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Radius Attribute Group Configuration.
     */
    public function attributeGroups(): RadiusAttributeGroupResource
    {
        return new RadiusAttributeGroupResource($this->connector);
    }

    /**
     * Radius Dictionary Configuration.
     */
    public function dictionary(): RadiusDictionaryAttributeResource
    {
        return new RadiusDictionaryAttributeResource($this->connector);
    }

    /**
     * Radius Health.
     */
    public function health(): RadiusHealthResource
    {
        return new RadiusHealthResource($this->connector);
    }

    /**
     * Radius Server Configuration.
     */
    public function servers(): RadiusServerResource
    {
        return new RadiusServerResource($this->connector);
    }
}
