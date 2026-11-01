<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the details used to display and edit a product within the policy. Each product supplies its own markup and scripts that may be used to create a valid configuration: GET /policy/endpoint-compliance/scan/product.
 *
 * Parameters: policyName, productName, osName, familyName.
 */
class GetEndpointComplianceScanProductRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: policyName, productName, osName, familyName
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan/product';
    }
}
