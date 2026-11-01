<?php

namespace spkm\FortiNac\Support;

use BackedEnum;
use DateTimeInterface;
use Stringable;

/**
 * Writes a query string the way FortiNAC reads one: a parameter with several values is repeated (id=1&id=2),
 * a boolean is true or false, and anything else is a plain key=value pair.
 */
final class QueryString
{
    /**
     * @param  array<string, mixed>  $parameters
     */
    public static function encode(array $parameters): string
    {
        $pairs = [];

        foreach ($parameters as $key => $value) {
            foreach (self::values($value) as $item) {
                $pairs[] = rawurlencode((string) $key).'='.rawurlencode($item);
            }
        }

        return implode('&', $pairs);
    }

    /**
     * @return list<string>
     */
    private static function values(mixed $value): array
    {
        if (is_array($value)) {
            if (! array_is_list($value)) {
                return [http_build_query($value, '', '&', PHP_QUERY_RFC3986)];
            }

            return array_merge(...array_map(fn (mixed $item) => self::values($item), $value) ?: [[]]);
        }

        return match (true) {
            $value === null => [],
            is_bool($value) => [$value ? 'true' : 'false'],
            $value instanceof BackedEnum => [(string) $value->value],
            $value instanceof DateTimeInterface => [(string) $value->format('Uv')],
            $value instanceof Stringable, is_scalar($value) => [(string) $value],
            default => [],
        };
    }
}
