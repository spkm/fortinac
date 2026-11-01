<?php

namespace spkm\FortiNac\Resources\System;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\System\Group;
use spkm\FortiNac\Data\System\GroupMembers;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\System\Group\AddGroupMembersRequest;
use spkm\FortiNac\Requests\System\Group\AddGroupToParentsRequest;
use spkm\FortiNac\Requests\System\Group\CopyGroupRequest;
use spkm\FortiNac\Requests\System\Group\CountAllGroupsRequest;
use spkm\FortiNac\Requests\System\Group\CountGroupsRequest;
use spkm\FortiNac\Requests\System\Group\DeleteGroupRequest;
use spkm\FortiNac\Requests\System\Group\DeleteGroupViaPostRequest;
use spkm\FortiNac\Requests\System\Group\DeleteManyGroupsRequest;
use spkm\FortiNac\Requests\System\Group\GetGroupDescendantsRequest;
use spkm\FortiNac\Requests\System\Group\GetGroupMemberIdsRequest;
use spkm\FortiNac\Requests\System\Group\GetGroupMembersRequest;
use spkm\FortiNac\Requests\System\Group\GetGroupRequest;
use spkm\FortiNac\Requests\System\Group\GetGroupsRequest;
use spkm\FortiNac\Requests\System\Group\GetGroupUsageRequest;
use spkm\FortiNac\Requests\System\Group\PostGroupAgingRequest;
use spkm\FortiNac\Requests\System\Group\PostGroupByIdRequest;
use spkm\FortiNac\Requests\System\Group\PostGroupManagesRequest;
use spkm\FortiNac\Requests\System\Group\PostGroupMembershipRequest;
use spkm\FortiNac\Requests\System\Group\RemoveGroupFromParentRequest;
use spkm\FortiNac\Requests\System\Group\RemoveGroupMembersRequest;
use spkm\FortiNac\Requests\System\Group\UpdateGroupRequest;

/**
 * Group, from FortiNac::system()->groups().
 *
 * @extends Builder<Group>
 */
class GroupResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Group::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetGroupsRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountGroupsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetGroupRequest($this->intId($id));
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateGroupRequest((string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteGroupRequest($this->intId($id), $options);
    }

    /**
     * Returns the count of all group records in the database: GET /system/group/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllGroupsRequest);
    }

    /**
     * Returns all groups that are descendants of the supplied group. If includeParentGroup is true, the list of groups will also include the supplied group: GET /system/group/{id}/descendants.
     *
     * @param  array<string, mixed>  $options  Query options: includeParent
     */
    public function descendants(int $id, array $options = []): mixed
    {
        return $this->fetch(new GetGroupDescendantsRequest($id, $options));
    }

    /**
     * Returns the member IDs of all descendant members: GET /system/group/{id}/member-ids.
     */
    public function memberIds(int $id): mixed
    {
        return $this->fetch(new GetGroupMemberIdsRequest($id));
    }

    /**
     * Returns all descendant members and subgroups for this group: GET /system/group/{id}/members.
     *
     * @param  array<string, mixed>  $options  Query options: getImages, getSubGroups
     */
    public function members(int $id, array $options = []): ?GroupMembers
    {
        return $this->fetchOrNull(new GetGroupMembersRequest($id, $options));
    }

    /**
     * Returns a list of group records that reference this record: GET /system/group/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetGroupUsageRequest($id));
    }

    /**
     * Adds members to a group or groups of a certain type and also adds groups to a group of a certain type: POST /system/group/add-members.
     *
     * @param  array<string, mixed>  $options  Query options: elemID, groupID, type
     */
    public function addMembers(array $options = []): bool
    {
        return $this->perform(new AddGroupMembersRequest($options));
    }

    /**
     * Sets the parent groups to the supplied group of same type. If replace is true it also removes from any groups that this supplied group currently belongs to and by default replace is true: POST /system/group/add-to-parents.
     *
     * @param  array<string, mixed>  $options  Query options: parentID, groupID, replace
     */
    public function addToParents(array $options = []): bool
    {
        return $this->perform(new AddGroupToParentsRequest($options));
    }

    /**
     * Sets the aging time for records in the group or groups: POST /system/group/aging.
     *
     * @param  array<string, mixed>  $options  Query options: id, daysValid, daysInactive
     */
    public function aging(array $options = []): bool
    {
        return $this->perform(new PostGroupAgingRequest($options));
    }

    /**
     * Creates a copy of the given group with the specified name: POST /system/group/copy.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function copy(array $options = []): bool
    {
        return $this->perform(new CopyGroupRequest($options));
    }

    /**
     * Deletes the group record or records supplied, if they are not currently in use: POST /system/group/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyGroupsRequest(['id' => $ids]));
    }

    /**
     * Sets the User, Host, and Port groups that may be managed by members of this group: POST /system/group/{groupID}/manages.
     *
     * @param  array<string, mixed>  $options
     */
    public function manages(int $groupId, array $options = []): bool
    {
        return $this->perform(new PostGroupManagesRequest($groupId, $options));
    }

    /**
     * Updates an existing user group in the database: POST /system/group/{groupType}/{id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function byId(string $groupType, int $id, array|Data $attributes = [], array $options = []): ?Group
    {
        return $this->fetch(new PostGroupByIdRequest($groupType, $id, $this->payloadOf($attributes), $options));
    }

    /**
     * Deletes the group record supplied, if they are not currently in use: POST /system/group/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteGroupViaPostRequest($id, $options));
    }

    /**
     * Sets the Group Membership for the supplied groups for the supplied member: POST /system/group/membership.
     *
     * @param  array<string, mixed>  $options  Query options: elemID, groupID, type, serverIP
     */
    public function membership(array $options = []): bool
    {
        return $this->perform(new PostGroupMembershipRequest($options));
    }

    /**
     * Removes one or more groups from the supplied parent group: POST /system/group/remove-from-parent.
     *
     * @param  array<string, mixed>  $options  Query options: parentID, id
     */
    public function removeFromParent(array $options = []): bool
    {
        return $this->perform(new RemoveGroupFromParentRequest($options));
    }

    /**
     * Removes a set of member IDs from a set of group IDs, if the member exists within the group: POST /system/group/remove-members.
     *
     * @param  array<string, mixed>  $options  Query options: elemID, groupID
     */
    public function removeMembers(array $options = []): bool
    {
        return $this->perform(new RemoveGroupMembersRequest($options));
    }
}
