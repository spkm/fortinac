<?php

namespace spkm\FortiNac\Requests\Winbind\WinbindConfig;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Joins the domain for the Winbind instance specified by id: POST /winbind/config/joinDomain/{id}.
 *
 * Parameters: username, password.
 */
class JoinWinbindConfigDomainByIdRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: username, password
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/winbind/config/joinDomain/'.$this->id;
    }
}
