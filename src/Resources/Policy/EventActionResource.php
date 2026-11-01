<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Policy\EventAction;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\EventAction\CreateEventActionRequest;
use spkm\FortiNac\Requests\Policy\EventAction\DeleteEventActionRequest;
use spkm\FortiNac\Requests\Policy\EventAction\DeleteEventActionViaPostRequest;
use spkm\FortiNac\Requests\Policy\EventAction\DeleteManyEventActionsRequest;
use spkm\FortiNac\Requests\Policy\EventAction\GetEventActionRequest;
use spkm\FortiNac\Requests\Policy\EventAction\GetEventActionsRequest;
use spkm\FortiNac\Requests\Policy\EventAction\GetEventActionSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\EventAction\GetEventActionUsageRequest;
use spkm\FortiNac\Requests\Policy\EventAction\UpdateEventActionRequest;

/**
 * Event Action, from FortiNac::policy()->eventActions().
 *
 * @extends Builder<EventAction>
 */
class EventActionResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, EventAction::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEventActionsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetEventActionRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateEventActionRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateEventActionRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteEventActionRequest($this->intId($id), $options);
    }

    /**
     * Returns a list of records that reference this Event Action record: GET /policy/event-action/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetEventActionUsageRequest($id));
    }

    /**
     * Returns the additional information needed to create a Security Rule: GET /policy/event-action/supporting-info.
     */
    public function supportingInfo(): mixed
    {
        return $this->fetch(new GetEventActionSupportingInfoRequest);
    }

    /**
     * Deletes a list of Event Action records supplied under the id parameter: POST /policy/event-action/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyEventActionsRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Event Action record by ID: POST /policy/event-action/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteEventActionViaPostRequest($id, $options));
    }
}
