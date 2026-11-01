<?php

namespace spkm\FortiNac\Requests\Settings\GoogleSettings;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Modifies an existing Google authentication domain: POST /settings/integration/google/domains/{id}.
 *
 * Parameters: domainName.
 */
class PostGoogleSettingsDomainsByIdRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: domainName
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/google/domains/'.$this->id;
    }
}
