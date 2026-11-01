![Banner](https://banners.beyondco.de/FortiNAC.png?theme=dark&packageManager=composer+require&packageName=spkm%2Ffortinac&pattern=architect&style=style_2&description=&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

[![Tests](https://github.com/spkm/fortinac/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/spkm/fortinac/actions/workflows/tests.yml?branch=main)
[![Latest version](https://img.shields.io/packagist/v/spkm/fortinac)](https://packagist.org/packages/spkm/fortinac)
[![PHP version](https://img.shields.io/packagist/php-v/spkm/fortinac)](https://packagist.org/packages/spkm/fortinac)

A Laravel package for the [Fortinet FortiNAC-F](https://www.fortinet.com/products/network-access-control) REST API,
built with [Saloon](https://docs.saloon.dev). It has a typed model, a request and an Eloquent-style query builder for
every operation in FortiNAC's REST API documentation (version 7.2), grouped by the API's own paths: `adapters()`,
`device()`, `firewallSessions()`, `host()`, `logging()`, `policy()`, `portalSettings()`, `radius()`, `settings()`,
`ssids()`, `system()`, `user()` and `winbind()`. Where a path is itself a collection (`/host`, `/user`, `/device`),
its method is the builder over those records, with the path's other collections as methods on it.

```php
use spkm\FortiNac\Facades\FortiNac;

$host = FortiNac::host()->findByMac('00:50:56:B5:24:EA');                   // Host or null

$stale = FortiNac::host()
    ->where('status', 0)
    ->where('validForTime', '<', now()->subMonth())
    ->orderBy('validForTime')
    ->limit(50)
    ->get();

foreach (FortiNac::device()->ports()->where('status', 1)->lazy() as $port) {
    // one page of 100 at a time
}

FortiNac::user()->guests()->create([
    'template' => 'Visitor',
    'firstName' => 'Sam',
    'lastName' => 'Jones',
    'email' => 'sam@example.com',
]);
```

## Requirements

- PHP 8.5
- Laravel 12.39 or higher, or Laravel 13
- An admin user on your FortiNAC server with API access (System > Admin Users), whose Admin Profile allows the APIs
  you need and whose Allowed Subnets include the machine making the calls. FortiNAC answers a call the profile doesn't
  allow with 403.

## Installation

```bash
composer require spkm/fortinac
php artisan fortinac:install
```

The install command publishes `config/fortinac.php`. Set the server and the token in `.env`:

```dotenv
FORTINAC_BASE_URL=https://nac.example.com:8443
FORTINAC_TOKEN=your-api-token
```

FortiNAC's REST API listens on port 8443 by default. A server with a self-signed certificate needs
`FORTINAC_VERIFY=false`, or the path of a CA bundle to verify it against.

## Usage

### Two ways to call FortiNAC

**Resources** give an Eloquent-style builder for each collection, reached from the API group it belongs to. They
return models and throw a `FortiNacApiException` when FortiNAC answers with an error:

```php
$host = FortiNac::host()->find(1904);                                   // Host or null
$count = FortiNac::host()->where('status', 1)->count();
$ports = FortiNac::device()->ports()->orderBy('name')->all();           // Collection of Port
```

**Requests** are plain Saloon, for when you want the response itself:

```php
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Host\Host\GetHostsRequest;

$response = FortiNac::send(new GetHostsRequest(Query::make()->where('role', '==', 'Staff')->count(50)));
$response->status();
$response->json();
$response->dto();   // the same models the resource gives; throws FortiNacApiException for an error
```

`FortiNac::get()`, `post()`, `put()` and `delete()` send any path, and `FortiNac::from('/some-path')` gives a
builder over a collection the package has no resource for, returning arrays. Every resource, request and model is
listed in [ENDPOINTS.md](ENDPOINTS.md).

### Resources

Each API is a method on the facade, and each collection a method on the API. An API whose own path is a collection
(`host()`, `user()`, `device()`) is the builder over those records, and its other collections hang off it
(`host()->fingerprints()`, `user()->guests()`, `device()->ports()`); an API with one collection, such as `adapters()`,
is reached directly. A collection gives a builder; a setting FortiNAC keeps one of (such as `settings()->proxy()`)
gives `get()` and `update()`; an action FortiNAC performs is a method on the collection.

```php
FortiNac::host()->find(1904);                                           // by id, null when there is none
FortiNac::host()->findByIp('10.1.2.3');
FortiNac::host()->update(1904, ['notes' => 'Lab laptop']);
FortiNac::host()->delete(1904);
FortiNac::host()->deleteMany([1904, 1905]);                              // POST /host/delete
FortiNac::host()->enable(1904);
FortiNac::host()->setRole(['id' => 1904, 'role' => 'Staff']);           // the parameters the operation documents
FortiNac::host()->fingerprints()->get();                                // another collection under /host
FortiNac::adapters()->countAll();
FortiNac::settings()->proxy()->update(['httpProxyHost' => 'proxy.example.com']);
FortiNac::system()->groups()->members(12);                             // GroupMembers or null
```

Parameters an operation documents without a JSON body (an `id`, a `mac`, a `rank`) go in the last array argument and
are sent in the query string; a record goes in the body as JSON.

### Examples

Every device registered to a user, by the host record's `owner` (the user ID, matched ignoring case):

```php
use spkm\FortiNac\Data\Host\Host;

$devices = FortiNac::host()->where('owner', 'SPKM')->get();            // Collection of Host

foreach ($devices as $device) {
    echo $device->hostName, ' ', implode(', ', $device->adapters ?? []), PHP_EOL;   // the MAC addresses
}
```

FortiNAC's own lookup gives the same hosts, and the ones the user is logged on to right now:

```php
$mine = FortiNac::host()->forUser(['userID' => 'SPKM']);                 // HostsForUser
$mine->ownedHosts;                                                       // Collection of Host
$mine->loggedOnHosts;                                                    // Collection of Host
```

The active devices registered to a user that have been on the network in the last month. FortiNAC's filter compares
`lastSuccessfulPoll` (when it last saw the host) as a timestamp, so that part runs on the server; `disabled` and
`expired` are booleans, which FortiNAC's filter ignores, so they are checked on the records that come back:

```php
$active = FortiNac::host()
    ->where('owner', 'SPKM')
    ->where('lastSuccessfulPoll', '>', now()->subMonth())
    ->get()
    ->reject(fn (Host $device) => $device->disabled || $device->expired);

$online = $active->filter(fn (Host $device) => $device->connected);   // on the network at this moment
```

### The query builder

FortiNAC filters, sorts and pages in the query string, and the builder writes those parameters for you: one `filter`
parameter per condition (FortiNAC ANDs them), `sortKey` and `sortDir`, `start` and `count`.

```php
FortiNac::host()
    ->where('role', 'Staff')                          // filter=role==Staff
    ->where('creationTime', '>', now()->subWeek())    // filter=creationTime>1767225600000
    ->whereNot('status', 0)                           // filter=status!=0
    ->whereContains('hostName', 'LAB')                // filter=hostName=@*LAB*
    ->whereIn('type', [1, 9])                         // filter=type==1,type==9
    ->orderByDesc('creationTime')
    ->forPage(2, 50);
```

| Builder | FortiNAC |
|---|---|
| `where($field, $value)`, `where($field, '==', $value)` | `field==value`, matched as a whole and ignoring case |
| `where($field, '!=', $value)`, `whereNot($field, $value)` | `field!=value` |
| `whereContains($field, $text)`, `whereNotContains(...)` | `field=@*text*`, `field!@*text*` |
| `where($field, '=@', 'LAB-*')` | a pattern of your own, with `*` wildcards |
| `where($field, '>', $value)` and `<`, `>=`, `<=` | `field>value` |
| `whereBetween($field, [$from, $to])` | two conditions, `field>=from` and `field<=to` |
| `whereIn($field, [...])`, `orWhere(...)` | alternatives joined with a comma in one parameter |
| `orderBy($field)`, `orderByDesc($field)` | `sortKey`, `sortDir` |
| `offset($n)`, `limit($n)`, `forPage($page, $perPage)` | `start`, `count` |

A dot or a backslash in a value is escaped as FortiNAC expects. Dates are sent as Unix timestamps in milliseconds,
which is what FortiNAC compares. Only a record's own top-level fields filter (`hostName`, `owner`, `type`, `status`,
`creationTime`); FortiNAC ignores a condition on a nested field such as `adapters` or `ips.ip`.

`get()` returns the matching records (as many as `limit()` asked for, or all of them); `first()`, `count()`,
`exists()`, `find($id)` and `findOrFail($id)` do what they say; `all()` and `lazy()` page through every match, 100 at
a time (`fortinac.pagination.per_page`), and `paginate()` gives the paginator itself. `count()` asks the collection's
count endpoint, which honours the filter; the `total` FortiNAC sends with a list does not.

### Models

Every record is a readonly model with FortiNAC's own property names and types: `$host->hostName`,
`$host->creationTime` (a `CarbonImmutable`), `$host->adapters`. FortiNAC's records carry more fields than its
documentation shows, so a model keeps the ones it has no property for in `$extra` and sends them back when the model
is written. `toArray()` and `json_encode()` give the record as FortiNAC would send it.

### Writing

`create()`, `update()` and the action methods take an array of FortiNAC's field names or a model. FortiNAC answers a
write with the record as stored, or with nothing but its status; the methods return the model, `null`, or `true`
accordingly.

### Errors

FortiNAC wraps every answer in `{"status", "errorMessage", "results"}`. A resource method throws a
`FortiNacApiException` for an error status, and for a 200 whose `status` is not `success`; a request's `dto()` does
the same. `errorMessage()` gives FortiNAC's explanation, and `getResponse()` the response.

| FortiNAC answered | Exception |
|---|---|
| 404 | `NotFoundException` (`find()` returns `null` instead) |
| 401, 403 | `UnauthorizedException` |
| 400, 405, 406, 415, 422 | `InvalidRequestException` |
| 408, 5xx, or a success that isn't JSON | `ServerErrorException` |
| a success whose `status` isn't `success` | `FailedException` |

### Several servers

Add further servers under `connections` in `config/fortinac.php` and reach them with `FortiNac::connection('name')`,
which gives a connector with the same resources and methods as the facade.

### Caching, timeouts and retries

`FORTINAC_CACHE=true` caches GET responses for `fortinac.cache.seconds` in `FORTINAC_CACHE_STORE` (the default cache
store when unset). `FORTINAC_CONNECT_TIMEOUT` and `FORTINAC_REQUEST_TIMEOUT` are in seconds. `FORTINAC_RETRIES` retries
a GET that failed with a connection error, 408, 429 or 5xx, with exponential backoff from `fortinac.retries.interval_ms`;
writes are never retried.

## Testing

```bash
composer test
```

The suite fakes FortiNAC with Saloon's `MockClient`; nothing reaches a real server.

## Contributing

Pull requests are welcome. Run `composer format`, `composer analyse` and `composer test` before opening one.

## Security

If you discover a security issue, email hello@spkmitchell.co.uk rather than opening an issue.

## Credits

- [Simon Mitchell](https://github.com/spkm)
- [Saloon](https://docs.saloon.dev)

## Licence

MIT.
