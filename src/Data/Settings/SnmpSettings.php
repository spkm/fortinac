<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A SnmpSettings record.
 */
readonly class SnmpSettings extends Data
{
    protected const HIDDEN = ['authPassword', 'privPassword'];

    /**
     * @param  array<mixed>|null  $hostsArray
     * @param  array<mixed>|null  $mgmtHosts
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $snmpProto = null,
        public ?string $authProto = null,
        public ?string $username = null,
        public ?string $security = null,
        public ?string $authPasswd = null,
        public ?string $privPasswd = null,
        public ?string $privProto = null,
        public ?array $hostsArray = null,
        public ?string $snmpProtocol = null,
        public ?string $authProtocol = null,
        public ?string $securityString = null,
        public ?string $authPassword = null,
        public ?string $privPassword = null,
        public ?string $privProtocol = null,
        public ?array $mgmtHosts = null,
        public array $extra = [],
    ) {}
}
