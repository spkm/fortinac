<?php

namespace spkm\FortiNac;

use BadMethodCallException;
use InvalidArgumentException;

/**
 * What the FortiNac facade resolves: the default connector, built from config('fortinac') the first time it is
 * needed, and any named connections.
 *
 * @mixin FortiNacConnector
 */
class FortiNacService
{
    protected FortiNacConnector $connector;

    /** @var array<string, FortiNacConnector> */
    protected array $connections = [];

    /**
     * The connector for another server, configured under fortinac.connections.{name}.
     */
    public function connection(string $name): FortiNacConnector
    {
        $config = config("fortinac.connections.$name");

        if (! is_array($config)) {
            throw new InvalidArgumentException('No FortiNAC connection named "'.$name.'" is configured in fortinac.connections.');
        }

        return $this->connections[$name] ??= $this->connect($config, 'The FortiNAC connection "'.$name.'"');
    }

    /**
     * @param  array<mixed>  $parameters
     */
    public function __call(string $method, array $parameters): mixed
    {
        $this->connector ??= $this->connect((array) config('fortinac'), 'The default FortiNAC connection');

        if (method_exists($this->connector, $method)) {
            return $this->connector->{$method}(...$parameters);
        }

        throw new BadMethodCallException("Method {$method} does not exist.");
    }

    /**
     * @param  array<string, mixed>  $config
     */
    private function connect(array $config, string $connection): FortiNacConnector
    {
        foreach (['base_url', 'token'] as $setting) {
            if (! is_string($config[$setting] ?? null) || $config[$setting] === '') {
                throw new InvalidArgumentException("$connection needs a $setting.");
            }
        }

        return new FortiNacConnector($config['base_url'], $config['token'], $config['verify'] ?? true);
    }
}
