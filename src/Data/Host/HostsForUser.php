<?php

namespace spkm\FortiNac\Data\Host;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;

/**
 * A HostsForUser record.
 */
readonly class HostsForUser extends Data
{
    protected const LISTS = ['ownedHosts' => Host::class, 'loggedOnHosts' => Host::class];

    /**
     * @param  Collection<int, Host>|null  $ownedHosts
     * @param  Collection<int, Host>|null  $loggedOnHosts
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?Collection $ownedHosts = null,
        public ?Collection $loggedOnHosts = null,
        public array $extra = [],
    ) {}
}
