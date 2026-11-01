<?php

namespace spkm\FortiNac\Resources;

use InvalidArgumentException;
use JsonException;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Exceptions\NotFoundException;
use spkm\FortiNac\Exceptions\ServerErrorException;
use spkm\FortiNac\FortiNacApiException;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;

/**
 * What every resource shares: its connector, the model its records are returned as, and sending a request for its
 * model.
 *
 * @template TData of Data
 */
abstract class BaseResource
{
    /**
     * @param  class-string<TData>|null  $dataClass  The model records are returned as; null for arrays.
     */
    public function __construct(protected FortiNacConnector $connector, protected ?string $dataClass) {}

    public function connector(): FortiNacConnector
    {
        return $this->connector;
    }

    /**
     * Send a request and return what FortiNAC answered as the request's model, throwing for an error status or a
     * failed envelope.
     */
    protected function fetch(FortiNacRequest $request): mixed
    {
        $response = $this->connector->send($request);

        if (! $response->successful()) {
            throw FortiNacApiException::fromResponse($response);
        }

        try {
            return $response->dto();
        } catch (JsonException) {
            throw new ServerErrorException($response);
        }
    }

    /**
     * As fetch(), but null when FortiNAC has no such record.
     */
    protected function fetchOrNull(FortiNacRequest $request): mixed
    {
        try {
            return $this->fetch($request);
        } catch (NotFoundException) {
            return null;
        }
    }

    /**
     * As fetch(), for an operation whose answer is the envelope alone: true once FortiNAC said it succeeded.
     */
    protected function perform(FortiNacRequest $request): bool
    {
        $this->fetch($request);

        return true;
    }

    /**
     * A record id for a request path: an integer, or a string of digits; anything else is refused rather than
     * cast, so '12abc' never reaches record 12.
     */
    protected function intId(int|string $id): int
    {
        if (is_int($id) || ctype_digit($id)) {
            return (int) $id;
        }

        throw new InvalidArgumentException('"'.$id.'" is not a FortiNAC record id.');
    }

    /**
     * @param  array<string, mixed>|Data  $attributes
     * @return array<string, mixed>
     */
    protected function payloadOf(array|Data $attributes): array
    {
        return $attributes instanceof Data ? $attributes->toArray() : $attributes;
    }
}
