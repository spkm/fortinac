<?php

namespace spkm\FortiNac\Support;

use Illuminate\Support\Collection;
use Saloon\Http\Response;
use spkm\FortiNac\Data\Data;
use UnexpectedValueException;

/**
 * Reads FortiNAC's response bodies, which wrap everything in one envelope: {"status": "success", "errorMessage":
 * null, "results": [...], "total": n, "filtered": n}. A record is the one element of "results" (or the object under
 * "result", which a setting answers with); a count is "total". A few answers put their records under their own key
 * ({"ownedHosts": [...]}) or carry plain values beside the status ({"timeout": 0}); those are read too, as are a bare
 * list and a bare object.
 */
final class Payload
{
    /**
     * The decoded JSON body, or null when the body is empty. Throws JsonException for anything that isn't JSON.
     */
    public static function json(Response $response): mixed
    {
        $body = $response->body();

        return trim($body) === '' ? null : json_decode($body, true, flags: JSON_THROW_ON_ERROR);
    }

    /**
     * The envelope, when the body is a JSON object.
     *
     * @return array<string, mixed>|null
     */
    public static function envelope(Response $response): ?array
    {
        $json = self::json($response);

        return is_array($json) && ! array_is_list($json) ? $json : null;
    }

    /**
     * FortiNAC's "status": "success" when the request did what was asked, null when the body has no envelope.
     */
    public static function status(Response $response): ?string
    {
        $status = self::envelope($response)['status'] ?? null;

        return is_scalar($status) ? (string) $status : null;
    }

    /**
     * Whether FortiNAC said the request succeeded: a "status" of "success", or no envelope to say otherwise.
     */
    public static function succeeded(Response $response): bool
    {
        $status = self::status($response);

        return $status === null || strtolower($status) === 'success';
    }

    /**
     * FortiNAC's "errorMessage", when it gave one.
     */
    public static function errorMessage(Response $response): ?string
    {
        $body = json_decode($response->body(), true);
        $message = is_array($body) ? ($body['errorMessage'] ?? null) : null;

        return is_scalar($message) && trim((string) $message) !== '' ? trim((string) $message) : null;
    }

    /**
     * The records in the response, as arrays.
     *
     * @return list<array<string, mixed>>
     */
    public static function records(Response $response): array
    {
        $json = self::json($response);

        if ($json === null || $json === []) {
            return [];
        }

        if (! is_array($json)) {
            throw new UnexpectedValueException("FortiNAC's response to ".self::requestLine($response).' is not a record or a list of records.');
        }

        if (array_is_list($json)) {
            return self::onlyArrays($json);
        }

        foreach (['results', 'result'] as $key) {
            if (array_key_exists($key, $json)) {
                $results = $json[$key];

                if (is_array($results)) {
                    return array_is_list($results) ? self::onlyArrays($results) : [$results];
                }

                return [];
            }
        }

        if (! array_key_exists('status', $json)) {
            return [$json];
        }

        // An envelope that carries its answer under its own keys, such as {"ownedHosts": [...], "loggedOnHosts":
        // [...]} or {"timeout": 0}: the one record is everything beside the status.
        $rest = array_diff_key($json, ['status' => true, 'errorMessage' => true, 'total' => true, 'filtered' => true]);

        return $rest === [] ? [] : [$rest];
    }

    /**
     * The records as models of the request's class, or as arrays when it has none.
     *
     * @param  class-string<Data>|null  $dto
     * @return Collection<int, Data|array<string, mixed>>
     */
    public static function items(Response $response, ?string $dto): Collection
    {
        return collect(self::records($response))->map(fn (array $item) => $dto === null ? $item : $dto::from($item));
    }

    /**
     * The one record in the response, or null when FortiNAC sent nothing.
     *
     * @param  class-string<Data>|null  $dto
     * @return Data|array<string, mixed>|null
     */
    public static function object(Response $response, ?string $dto): mixed
    {
        $record = self::records($response)[0] ?? null;

        return $record === null || $dto === null ? $record : $dto::from($record);
    }

    /**
     * The one value in the response, as a count endpoint answers: the single element of "results", or "results"
     * itself when it is a scalar, or "total" when there is nothing else.
     */
    public static function scalar(Response $response): int|float|string|bool|null
    {
        $json = self::json($response);

        if (is_scalar($json) || $json === null) {
            return $json;
        }

        $results = array_is_list($json) ? $json : ($json['results'] ?? null);

        if (is_scalar($results)) {
            return $results;
        }

        if (is_array($results) && count($results) === 1 && is_scalar($results[0] ?? null)) {
            return $results[0];
        }

        $total = $json['total'] ?? null;

        return is_scalar($total) ? $total : null;
    }

    /**
     * The total in the response: what a count endpoint answers with, and, with a list, how many records the
     * collection has altogether (FortiNAC gives a list's "total" without regard to its filter).
     */
    public static function count(Response $response): int
    {
        $json = self::json($response);
        $count = is_array($json) ? ($json['filtered'] ?? $json['total'] ?? null) : null;

        if (! is_int($count) && ! (is_string($count) && ctype_digit($count))) {
            throw new UnexpectedValueException("FortiNAC's response to ".self::requestLine($response).' has no total.');
        }

        return (int) $count;
    }

    /**
     * How many records matched, or null when the response doesn't say.
     */
    public static function total(Response $response): ?int
    {
        $json = self::json($response);
        $count = is_array($json) ? ($json['filtered'] ?? $json['total'] ?? null) : null;

        return is_int($count) || (is_string($count) && ctype_digit($count)) ? (int) $count : null;
    }

    /**
     * @param  list<mixed>  $items
     * @return list<array<string, mixed>>
     */
    private static function onlyArrays(array $items): array
    {
        return array_values(array_filter($items, fn (mixed $item) => is_array($item)));
    }

    private static function requestLine(Response $response): string
    {
        $pendingRequest = $response->getPendingRequest();

        return $pendingRequest->getMethod()->value.' '.(parse_url($pendingRequest->getUrl(), PHP_URL_PATH) ?: '/');
    }
}
