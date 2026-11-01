<?php

use Carbon\CarbonImmutable;
use spkm\FortiNac\Query\Filter;
use spkm\FortiNac\Query\Operator;
use spkm\FortiNac\Query\Query;

enum ExampleStatus: string
{
    case Online = 'Online';
}

it('writes conditions the way FortiNAC reads them', function () {
    $filter = Filter::make()
        ->where('status', '==', 'Online')
        ->where('ports', '>', 2)
        ->where('ports', '<=', 4)
        ->where('enabled', '=', true)
        ->where('ratio', '!=', 1.5)
        ->where('status', 'contains', ExampleStatus::Online)
        ->where('notes', 'not like', 'old');

    expect($filter->toString())->toBe('status==Online&ports>2&ports<=4&enabled==true&ratio!=1.5&status=@Online&notes!@old')
        ->and((string) $filter)->toBe($filter->toString())
        ->and($filter->toArray())->toBe(['status==Online', 'ports>2', 'ports<=4', 'enabled==true', 'ratio!=1.5', 'status=@Online', 'notes!@old'])
        ->and(json_encode($filter))->toBe(json_encode($filter->toArray()))
        ->and(Filter::make()->isEmpty())->toBeTrue()
        ->and($filter->isEmpty())->toBeFalse();
});

it('escapes dots and backslashes in patterns', function () {
    expect(Filter::make()->where('ip', '==', '10.1.2.3')->toString())->toBe('ip==10\.1\.2\.3')
        ->and(Filter::make()->where('path', '==', 'C:\\Temp\\x.txt')->toString())->toBe('path==C:\\\\Temp\\\\x\.txt')
        ->and(Filter::make()->where('ratio', '>', 1.5)->toString())->toBe('ratio>1.5');
});

it('joins alternatives with a comma and further conditions with an ampersand', function () {
    $either = Filter::make()->where('a', '==', 1)->or(Filter::make()->where('b', '==', 2), Filter::make()->where('c', '==', 3));
    $then = $either->where('d', '==', 4);
    $fromEmpty = Filter::make()->or(Filter::make()->where('a', '==', 1), Filter::make()->where('b', '==', 2));
    $anded = Filter::make()->where('a', '==', 1)->and(Filter::make()->where('b', '==', 2)->where('c', '==', 3));

    $nested = Filter::make()->where('a', '==', 1)->where('b', '==', 2)->or(Filter::make()->where('c', '==', 3)->where('d', '==', 4));

    expect($either->toString())->toBe('a==1,b==2,c==3')
        ->and($then->toString())->toBe('a==1,b==2,c==3&d==4')
        ->and($then->toArray())->toBe(['a==1,b==2,c==3', 'd==4'])
        ->and($fromEmpty->toString())->toBe('a==1,b==2')
        ->and($anded->toString())->toBe('a==1&b==2&c==3')
        ->and($anded->toArray())->toBe(['a==1', 'b==2', 'c==3'])
        ->and($nested->toArray())->toBe(['a==1,b==2,c==3,d==4']);
});

it('writes dates as the format says', function () {
    $date = CarbonImmutable::parse('2026-01-01T00:00:00.250+00:00');

    expect(Filter::make()->where('t', '>', $date)->toString())->toBe('t>1767225600250')
        ->and(Filter::make('U')->where('t', '>', $date)->toString())->toBe('t>1767225600')
        ->and(Filter::make('Y-m-d')->where('t', '>', $date)->toString())->toBe('t>2026-01-01');
});

it('refuses what FortiNAC cannot read', function () {
    expect(fn () => Filter::make()->where('a', '==', null))->toThrow(InvalidArgumentException::class, 'needs a value')
        ->and(fn () => Filter::make()->where('a', '==', [1]))->toThrow(InvalidArgumentException::class, 'must be a string, number, bool, date or enum')
        ->and(fn () => Filter::make()->where('a b', '==', 1))->toThrow(InvalidArgumentException::class, 'is not a FortiNAC field name')
        ->and(fn () => Filter::make()->where('a', '~', 1))->toThrow(InvalidArgumentException::class, 'is not a FortiNAC filter operator')
        ->and(fn () => Filter::make()->where('a', '==', new stdClass))->toThrow(InvalidArgumentException::class);
});

it('parses operators from codes and symbols', function (string $given, Operator $operator) {
    expect(Operator::parse($given))->toBe($operator)
        ->and(Operator::parse($operator))->toBe($operator);
})->with([
    ['==', Operator::Equal],
    ['=', Operator::Equal],
    ['eq', Operator::Equal],
    ['!=', Operator::NotEqual],
    ['<>', Operator::NotEqual],
    ['=@', Operator::Contains],
    ['like', Operator::Contains],
    ['!@', Operator::NotContains],
    ['not contains', Operator::NotContains],
    ['>', Operator::GreaterThan],
    ['gte', Operator::GreaterOrEqual],
    ['<', Operator::LessThan],
    ['lte', Operator::LessOrEqual],
]);

it('builds the query string FortiNAC reads', function () {
    $query = Query::make()->where('a', '==', 1)->orderBy('name', 'desc')->start(20)->count(10);

    expect($query->toArray())->toBe(['filter' => 'a==1', 'sortKey' => 'name', 'sortDir' => 'DESC', 'start' => 20, 'count' => 10])
        ->and((string) $query)->toBe('filter=a==1&sortKey=name&sortDir=DESC&start=20&count=10')
        ->and($query->withoutPaging()->toArray())->toBe(['filter' => 'a==1', 'sortKey' => 'name', 'sortDir' => 'DESC'])
        ->and($query->getSortKey())->toBe('name')
        ->and($query->getSortDir())->toBe('DESC')
        ->and($query->getStart())->toBe(20)
        ->and($query->getCount())->toBe(10)
        ->and(Query::make()->toArray())->toBe([])
        ->and(Query::make()->orderBy('x')->toArray())->toBe(['sortKey' => 'x', 'sortDir' => 'ASC'])
        ->and((new Query(Filter::make()->where('b', '==', 2)))->filter()->toString())->toBe('b==2')
        ->and(fn () => Query::make()->orderBy('x', 'sideways'))->toThrow(InvalidArgumentException::class, 'Sort direction must be "asc" or "desc"')
        ->and(fn () => Query::make()->start(-1))->toThrow(InvalidArgumentException::class, 'cannot be negative')
        ->and(fn () => Query::make()->count(0))->toThrow(InvalidArgumentException::class, 'at least 1');
});

it('keeps a value from adding alternatives or wildcards of its own', function () {
    expect(Filter::make()->where('accessCode', '==', 'x,id>0')->toArray())->toBe(['accessCode==x\\,id>0'])
        ->and(Filter::make()->where('name', '==', '*')->toArray())->toBe(['name==\\*'])
        ->and(Filter::make()->where('name', '!=', 'a*b')->toArray())->toBe(['name!=a\\*b'])
        ->and(Filter::make()->where('name', '=@', '*lab*')->toArray())->toBe(['name=@*lab*'])
        ->and(Filter::make()->where('name', '!@', 'a,b*')->toArray())->toBe(['name!@a\\,b*'])
        ->and(fn () => Filter::make()->where("name\n", '==', 1))->toThrow(InvalidArgumentException::class, 'is not a FortiNAC field name')
        ->and(fn () => Query::make()->orderBy("id\n"))->toThrow(InvalidArgumentException::class, 'is not a FortiNAC field name')
        ->and(fn () => Query::make()->orderBy('id; drop'))->toThrow(InvalidArgumentException::class);
});
