<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\FirewallTag;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\CreateFirewallTagRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\DeleteFirewallTagRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\DeleteFirewallTagViaPostRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\DeleteManyFirewallTagsRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\GetFirewallTagRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\GetFirewallTagsRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\GetFirewallTagUsageRequest;
use spkm\FortiNac\Requests\Settings\FirewallTag\UpdateFirewallTagRequest;

/**
 * Firewall Tag, from FortiNac::settings()->firewallTags().
 *
 * @extends Builder<FirewallTag>
 */
class FirewallTagResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, FirewallTag::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetFirewallTagsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetFirewallTagRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateFirewallTagRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateFirewallTagRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteFirewallTagRequest($this->intId($id), $options);
    }

    /**
     * Returns a list of records that reference this Firewall Tag record: GET /settings/integration/firewall-tag/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetFirewallTagUsageRequest($id));
    }

    /**
     * Deletes a list of Firewall Tag records supplied under the id parameter: POST /settings/integration/firewall-tag/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyFirewallTagsRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Firewall Tag record by ID: POST /settings/integration/firewall-tag/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteFirewallTagViaPostRequest($id, $options));
    }
}
