<?php

namespace spkm\FortiNac\Resources\Policy;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan\GetEndpointComplianceCustomScanHtmlRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan\GetEndpointComplianceCustomScanRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan\GetEndpointComplianceCustomScanUsageRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan\PostEndpointComplianceCustomScanCustomScanDeleteRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan\PostEndpointComplianceCustomScanCustomScanRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Endpoint Compliance Custom Scan, from FortiNac::policy()->endpointComplianceCustomScans().
 *
 * @extends BaseResource<Data>
 */
class EndpointComplianceCustomScanResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns the HTML content of a custom scan for the supplied OS, Scan Type, and Scan Name: GET /policy/endpoint-compliance/custom-scan/html.
     *
     * @param  array<string, mixed>  $options  Query options: os, type, scanName, Request Body
     */
    public function html(array $options = []): bool
    {
        return $this->perform(new GetEndpointComplianceCustomScanHtmlRequest($options));
    }

    /**
     * Returns all Custom Scans currently stored in the filesystem: GET /policy/endpoint-compliance/custom-scan.
     */
    public function get(): bool
    {
        return $this->perform(new GetEndpointComplianceCustomScanRequest);
    }

    /**
     * Returns a list of records that reference this Custom Scan record: GET /policy/endpoint-compliance/custom-scan/usage.
     *
     * @param  array<string, mixed>  $options  Query options: os, scanType, scanName, Request Body
     */
    public function usage(array $options = []): mixed
    {
        return $this->fetch(new GetEndpointComplianceCustomScanUsageRequest($options));
    }

    /**
     * Adds a new Custom Scan for the supplied OS of the supplied type: POST /policy/endpoint-compliance/custom-scan/custom-scan.
     *
     * @param  array<string, mixed>  $options  Query options: osName, csType, scanName, formData, isModify, modify, global
     */
    public function customScan(array $options = []): bool
    {
        return $this->perform(new PostEndpointComplianceCustomScanCustomScanRequest($options));
    }

    /**
     * Deletes a custom scan uniquely identified by its combination of OS, scan type, and scan name: POST /policy/endpoint-compliance/custom-scan/custom-scan/delete.
     *
     * @param  array<string, mixed>  $options  Query options: os, scanType, scanName
     */
    public function customScanDelete(array $options = []): bool
    {
        return $this->perform(new PostEndpointComplianceCustomScanCustomScanDeleteRequest($options));
    }
}
