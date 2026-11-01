<?php

namespace spkm\FortiNac\Facades;

use Illuminate\Support\Facades\Facade;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\FortiNacPaginator;
use spkm\FortiNac\FortiNacService;
use spkm\FortiNac\Query\Builder;

/**
 * @method static \spkm\FortiNac\Resources\Adapter\AdapterResource adapters()
 * @method static \spkm\FortiNac\Resources\Device\DeviceResources device()
 * @method static \spkm\FortiNac\Resources\Host\HostResources host()
 * @method static \spkm\FortiNac\Resources\Dynamic\FirewallSessionResource firewallSessions()
 * @method static \spkm\FortiNac\Resources\Logging\LoggingResources logging()
 * @method static \spkm\FortiNac\Resources\Policy\PolicyResources policy()
 * @method static \spkm\FortiNac\Resources\Portal\PortalSslSettingsResource portalSettings()
 * @method static \spkm\FortiNac\Resources\Radius\RadiusResources radius()
 * @method static \spkm\FortiNac\Resources\Settings\SettingsResources settings()
 * @method static \spkm\FortiNac\Resources\Ssid\SsidResource ssids()
 * @method static \spkm\FortiNac\Resources\System\SystemResources system()
 * @method static \spkm\FortiNac\Resources\User\UserResources user()
 * @method static \spkm\FortiNac\Resources\Winbind\WinbindConfigResource winbind()
 * @method static FortiNacConnector connection(string $name)
 * @method static Response send(Request $request)
 * @method static FortiNacPaginator paginate(Request $request, ?int $perPage = null)
 * @method static Builder<\spkm\FortiNac\Data\Data> from(string $path)
 * @method static Response get(string $path, array<string, mixed> $query = [])
 * @method static Response post(string $path, array<string, mixed>|\JsonSerializable $body = [], array<string, mixed> $query = [])
 * @method static Response put(string $path, array<string, mixed>|\JsonSerializable $body = [], array<string, mixed> $query = [])
 * @method static Response delete(string $path, array<string, mixed> $query = [])
 *
 * @see FortiNacService
 * @see FortiNacConnector
 */
class FortiNac extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'fortinac';
    }
}
