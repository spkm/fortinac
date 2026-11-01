<?php

namespace spkm\FortiNac\Resources;

use Saloon\Enums\Method;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\AdhocBodyRequest;
use spkm\FortiNac\Requests\AdhocCountRequest;
use spkm\FortiNac\Requests\AdhocListRequest;
use spkm\FortiNac\Requests\AdhocRequest;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Support\Path;

/**
 * A builder over a collection the package has no resource for, from FortiNac::from('/path'); its records are
 * arrays, listed at /path, counted at /path/count, created at /path, and found, updated (POST) and deleted at
 * /path/{id}, the way FortiNAC's collections are laid out.
 *
 * @extends Builder<Data>
 */
class AdhocResource extends Builder
{
    public function __construct(FortiNacConnector $connector, protected string $path)
    {
        parent::__construct($connector, null);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new AdhocListRequest($this->path, $query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new AdhocCountRequest($this->path, $query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new AdhocRequest(Method::GET, $this->item($id), shape: FortiNacRequest::ONE);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new AdhocBodyRequest(Method::POST, $this->path, $body, $options, FortiNacRequest::ONE);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new AdhocBodyRequest(Method::POST, $this->item($id), $body, $options, FortiNacRequest::ONE);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new AdhocRequest(Method::DELETE, $this->item($id), $options, FortiNacRequest::NONE);
    }

    private function item(int|string $id): string
    {
        return rtrim($this->path, '/').'/'.Path::segment((string) $id);
    }
}
