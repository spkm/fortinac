<?php

namespace spkm\FortiNac\Query;

use BackedEnum;
use DateTimeInterface;
use InvalidArgumentException;
use JsonSerializable;
use spkm\FortiNac\Data\Data;
use Stringable;

/**
 * A FortiNAC filter, built up immutably. FortiNAC reads one condition per filter parameter (key{operator}pattern),
 * ANDs the parameters a request carries, and ORs the alternatives a parameter lists with a comma; so the filter is
 * a list of clauses, each clause one or more alternatives. A dot or backslash in a pattern is escaped the way FortiNAC
 * reads it, and a date is written as a Unix timestamp in milliseconds, which is what FortiNAC compares.
 */
final class Filter implements JsonSerializable, Stringable
{
    /** @var list<list<array{field: string, operator: Operator, value: mixed}>> */
    private array $clauses = [];

    /**
     * @param  string  $dateFormat  How dates in conditions are written: 'Uv' for milliseconds, 'U' for seconds, or
     *                              a date format.
     */
    public function __construct(private string $dateFormat = 'Uv') {}

    public static function make(string $dateFormat = 'Uv'): self
    {
        return new self($dateFormat);
    }

    /**
     * A condition on a field, ANDed with the ones before it.
     */
    public function where(string $field, Operator|string $operator, mixed $value = null): self
    {
        $filter = clone $this;
        $filter->clauses[] = [self::condition($field, $operator, $value)];
        $filter->pattern($value);

        return $filter;
    }

    /**
     * Everything so far, OR the given expressions: each clause's alternatives are joined into one clause.
     */
    public function or(Filter ...$filters): self
    {
        $filter = clone $this;
        $alternatives = $this->isEmpty() ? [] : $this->flattened();

        foreach ($filters as $other) {
            $alternatives = [...$alternatives, ...$other->flattened()];
        }

        $filter->clauses = $alternatives === [] ? [] : [$alternatives];

        return $filter;
    }

    /**
     * The given expressions, ANDed with everything so far.
     */
    public function and(Filter ...$filters): self
    {
        $filter = clone $this;

        foreach ($filters as $other) {
            $filter->clauses = [...$filter->clauses, ...$other->clauses];
        }

        return $filter;
    }

    public function isEmpty(): bool
    {
        return $this->clauses === [];
    }

    /**
     * The filter parameters FortiNAC reads: one string per ANDed clause, alternatives joined by a comma.
     *
     * @return list<string>
     */
    public function toArray(): array
    {
        return array_map(fn (array $clause) => implode(',', array_map(fn (array $condition) => $condition['field'].$condition['operator']->value.$this->pattern($condition['value'], $condition['operator']), $clause)), $this->clauses);
    }

    /**
     * The whole filter as one expression, clauses joined by &, as you would read it.
     */
    public function toString(): string
    {
        return implode('&', $this->toArray());
    }

    /**
     * @return list<string>
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * Every condition as one flat list of alternatives, for ORing a filter that has several clauses.
     *
     * @return list<array{field: string, operator: Operator, value: mixed}>
     */
    private function flattened(): array
    {
        return array_merge(...$this->clauses);
    }

    /**
     * @return array{field: string, operator: Operator, value: mixed}
     */
    private static function condition(string $field, Operator|string $operator, mixed $value): array
    {
        return ['field' => self::field($field), 'operator' => Operator::parse($operator), 'value' => $value];
    }

    /**
     * A condition's value as a pattern. In text, a backslash is written as \\ and a dot as \., so an IP or MAC
     * address matches itself, and a comma as \, so the value cannot add an alternative of its own; a * is written
     * as \* unless the operator takes a pattern (=@, !@), where it is the wildcard. A number is written as it is.
     */
    private function pattern(mixed $value, ?Operator $operator = null): string
    {
        if ($value instanceof BackedEnum) {
            $value = $value->value;
        }

        if ($value instanceof DateTimeInterface) {
            $value = Data::formatDate($value, $this->dateFormat);
        }

        return match (true) {
            $value === null => throw new InvalidArgumentException('A condition needs a value.'),
            $value instanceof Pattern => (string) $value,
            is_bool($value) => $value ? 'true' : 'false',
            is_int($value), is_float($value) => (string) $value,
            is_string($value), $value instanceof Stringable => self::escape((string) $value, $operator),
            default => throw new InvalidArgumentException('A condition value must be a string, number, bool, date or enum.'),
        };
    }

    private static function escape(string $value, ?Operator $operator): string
    {
        return in_array($operator, [Operator::Contains, Operator::NotContains], true)
            ? str_replace(['\\', '.', ','], ['\\\\', '\\.', '\\,'], $value)
            : self::literal($value);
    }

    /**
     * Text written so that FortiNAC reads every character as itself: backslash, dot, comma and star escaped.
     */
    public static function literal(string $value): string
    {
        return str_replace(['\\', '.', ',', '*'], ['\\\\', '\\.', '\\,', '\\*'], $value);
    }

    /**
     * A field name as FortiNAC's records carry them: letters, digits, underscores and dots.
     */
    public static function field(string $field): string
    {
        if (! preg_match('/^[A-Za-z_][\w.]*\z/', $field)) {
            throw new InvalidArgumentException('"'.$field.'" is not a FortiNAC field name.');
        }

        return $field;
    }
}
