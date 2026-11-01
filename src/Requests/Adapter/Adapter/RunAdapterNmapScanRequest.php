<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Run an NMAP scan for the adapter by the IP address provided: POST /adapter/run-nmap-scan.
 *
 * Parameters: ip-address.
 */
class RunAdapterNmapScanRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/adapter/run-nmap-scan';
    }
}
