<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A LdapServer record.
 */
readonly class LdapServer extends Data
{
    /**
     * @param  array<mixed>|null  $ldapClientSearchBranch
     * @param  array<mixed>|null  $ldapGroupSearchBranch
     * @param  array<mixed>|null  $ldapGroupAllows
     * @param  array<mixed>|null  $me
     * @param  array<mixed>|null  $pingable
     * @param  array<mixed>|null  $tls
     * @param  array<mixed>|null  $ctxEnv
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $ip = null,
        public ?bool $connectByName = null,
        public ?string $protocol = null,
        public ?bool $pollable = null,
        public ?CarbonImmutable $pollInterval = null,
        public ?string $deviceGroup = null,
        public ?string $type = null,
        public ?string $description = null,
        public ?string $state = null,
        public ?string $status = null,
        public ?int $landscape = null,
        public ?string $mac = null,
        public ?bool $ldapSyncState = null,
        public ?bool $ldapAddDirectoryUsers = null,
        public ?string $ldapDomainName = null,
        public ?string $ldapRedundantHost = null,
        public ?string $ldapLoginDN = null,
        public ?int $ldapPort = null,
        public ?string $ldapVersion = null,
        public ?string $ldapTimeLimit = null,
        public ?string $ldapRemoveClients = null,
        public ?string $ldapPassword = null,
        public ?string $ldapClientClassObject = null,
        public ?string $ldapGroupClassObject = null,
        public ?string $ldapSSLConnectionType = null,
        public ?string $ldapCharacterSet = null,
        public ?array $ldapClientSearchBranch = null,
        public ?array $ldapGroupSearchBranch = null,
        public ?string $clientName = null,
        public ?string $clientPassword = null,
        public ?string $clientFirstName = null,
        public ?string $clientLastName = null,
        public ?string $clientID = null,
        public ?string $clientAddress = null,
        public ?string $clientCity = null,
        public ?string $clientState = null,
        public ?string $clientZipCode = null,
        public ?string $clientTelephoneNumber = null,
        public ?string $clientMobileNumber = null,
        public ?string $clientMobileProvider = null,
        public ?string $clienteMail = null,
        public ?string $clientVlanId = null,
        public ?string $clientUnitName = null,
        public ?string $clientScanPolicy = null,
        public ?string $clientNumRecords = null,
        public ?string $clientDeleteTime = null,
        public ?string $clientDeleteUnits = null,
        public ?string $ldapClientDisableAttr = null,
        public ?string $ldapClientDisableValue = null,
        public ?string $referrals = null,
        public ?string $groupName = null,
        public ?string $groupMembers = null,
        public ?string $clientDN = null,
        public ?string $rootDN = null,
        public ?array $ldapGroupAllows = null,
        public ?array $me = null,
        public ?array $pingable = null,
        public ?bool $debug = null,
        public ?array $tls = null,
        public ?array $ctxEnv = null,
        public ?string $clientMSDSPrincipalName = null,
        public ?bool $attributeDisabled = null,
        public ?string $clientSAMAccountName = null,
        public ?string $samaccountName = null,
        public ?string $netBIOSName = null,
        public ?string $note = null,
        public ?bool $defaultAPLocation = null,
        public array $extra = [],
    ) {}
}
