<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Data\Radius\RadiusServer;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Updates all NAS that are configured to use a RADIUS server configuration that no longer exists to use the specified cfg ID: POST /radius/radius-server-config/nas/fixstale/{id}.
 */
class PostRadiusServerNasFixstaleByIdRequest extends ActionRequest
{
    protected ?string $dto = RadiusServer::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config/nas/fixstale/'.$this->id;
    }
}
