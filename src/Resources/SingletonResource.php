<?php

namespace spkm\FortiNac\Resources;

use LogicException;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Requests\FortiNacRequest;

/**
 * A setting FortiNAC keeps one of, such as the proxy or the aging configuration: read it, change it, or (where
 * FortiNAC allows) delete or reset it.
 *
 * @template TData of Data
 *
 * @extends BaseResource<TData>
 */
abstract class SingletonResource extends BaseResource
{
    /**
     * @param  array<string, mixed>  $options
     */
    abstract protected function getRequest(array $options): FortiNacRequest;

    /**
     * @param  array<string, mixed>  $body
     * @param  array<string, mixed>  $options
     */
    protected function updateRequest(array $body, array $options): ?FortiNacRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $options
     */
    protected function deleteRequest(array $options): ?FortiNacRequest
    {
        return null;
    }

    /**
     * The setting as it is.
     *
     * @param  array<string, mixed>  $options  Query options the operation documents.
     * @return TData|null
     */
    public function get(array $options = []): mixed
    {
        return $this->fetch($this->getRequest($options));
    }

    /**
     * Change the setting. FortiNAC answers with the setting as stored, or with nothing but the envelope.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     * @return TData|null
     */
    public function update(array|Data $attributes, array $options = []): mixed
    {
        return $this->fetch($this->updateRequest($this->payloadOf($attributes), $options) ?? $this->undocumented('update'));
    }

    /**
     * @param  array<string, mixed>  $options
     */
    public function delete(array $options = []): bool
    {
        $this->fetch($this->deleteRequest($options) ?? $this->undocumented('delete'));

        return true;
    }

    private function undocumented(string $action): never
    {
        throw new LogicException("FortiNAC's API documents no way to $action this setting.");
    }
}
