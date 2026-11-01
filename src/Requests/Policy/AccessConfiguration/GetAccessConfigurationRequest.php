<?php

namespace spkm\FortiNac\Requests\Policy\AccessConfiguration;

use spkm\FortiNac\Data\Policy\AccessConfiguration;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Access Configuration records matching the supplied filter: GET /policy/access-configuration/{id}.
 */
class GetAccessConfigurationRequest extends ItemRequest
{
    protected ?string $dto = AccessConfiguration::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/access-configuration/'.$this->id;
    }
}
