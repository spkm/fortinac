<?php

namespace spkm\FortiNac\Query;

use InvalidArgumentException;

/**
 * The comparisons FortiNAC's filter parameter understands, as key{operator}pattern.
 */
enum Operator: string
{
    /** Matches the whole value, ignoring case. */
    case Equal = '==';
    case NotEqual = '!=';
    /** The pattern is found somewhere in the value. */
    case Contains = '=@';
    case NotContains = '!@';
    case GreaterThan = '>';
    case GreaterOrEqual = '>=';
    case LessThan = '<';
    case LessOrEqual = '<=';

    /**
     * The operator for a FortiNAC code or a familiar symbol: '=', '<>', 'contains', 'like', 'not contains' and
     * 'not like' are accepted as well as the codes.
     */
    public static function parse(self|string $operator): self
    {
        if ($operator instanceof self) {
            return $operator;
        }

        $normalised = strtolower(trim($operator));

        return self::tryFrom($normalised) ?? match ($normalised) {
            '=', 'eq' => self::Equal,
            '<>', 'ne' => self::NotEqual,
            'contains', 'like' => self::Contains,
            'not contains', 'not like' => self::NotContains,
            'gt' => self::GreaterThan,
            'gte' => self::GreaterOrEqual,
            'lt' => self::LessThan,
            'lte' => self::LessOrEqual,
            default => throw new InvalidArgumentException('"'.$operator.'" is not a FortiNAC filter operator.'),
        };
    }
}
