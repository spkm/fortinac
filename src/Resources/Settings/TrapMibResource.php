<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Settings\TrapMib;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Settings\TrapMib\AddTrapMibRequest;
use spkm\FortiNac\Requests\Settings\TrapMib\DeleteManyTrapMibsRequest;
use spkm\FortiNac\Requests\Settings\TrapMib\DeleteTrapMibRequest;
use spkm\FortiNac\Requests\Settings\TrapMib\DeleteTrapMibTrapOidRequest;
use spkm\FortiNac\Requests\Settings\TrapMib\GetTrapMibsRequest;
use spkm\FortiNac\Requests\Settings\TrapMib\PostTrapMibMibNameRequest;
use spkm\FortiNac\Requests\Settings\TrapMib\UpdateTrapMibRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Trap MIB, from FortiNac::settings()->trapMibs().
 *
 * @extends BaseResource<TrapMib>
 */
class TrapMibResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, TrapMib::class);
    }

    /**
     * Returns all TrapMibs: GET /settings/integration/trap-mib.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, TrapMib>
     */
    public function get(Query|array $query = []): Collection
    {
        return $this->fetch(new GetTrapMibsRequest($query));
    }

    /**
     * Adds a new trap mib if a trap mib with the name does not exist and adds a new trap object to the trap mib if a trap mib already exists with the name: POST /settings/integration/trap-mib/add.
     *
     * @param  array<string, mixed>  $options  Query options: oid, label, entOid, ipOid, macOid, userOid, specificType, alarmCause, evtFormat, eventFormat, enterpriseOID, ipaddressOID, macaddressOID, userIDOID
     */
    public function add(array $options = []): bool
    {
        return $this->perform(new AddTrapMibRequest($options));
    }

    /**
     * Deletes Trap Objects supplied in the list: POST /settings/integration/trap-mib/delete.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteMany(array|Data $attributes = [], array $options = []): bool
    {
        return $this->perform(new DeleteManyTrapMibsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Updates the Mib File Name with the supplied name: POST /settings/integration/trap-mib/mib-name.
     *
     * @param  array<string, mixed>  $options  Query options: oid, label, entOid, ipOid, macOid, userOid, specificType, alarmCause, evtFormat, eventFormat, enterpriseOID, ipaddressOID, macaddressOID, userIDOID
     */
    public function mibName(array $options = []): bool
    {
        return $this->perform(new PostTrapMibMibNameRequest($options));
    }

    /**
     * Updates the trap object with mib file name change if supplied name is different from original name and updates the trap object with mib file name change if the supplied name is same as original name: POST /settings/integration/trap-mib/update.
     *
     * @param  array<string, mixed>  $options  Query options: oid, label, entOid, ipOid, macOid, userOid, specificType, alarmCause, evtFormat, eventFormat, enterpriseOID, ipaddressOID, macaddressOID, userIDOID
     */
    public function update(array $options = []): bool
    {
        return $this->perform(new UpdateTrapMibRequest($options));
    }

    /**
     * Deletes Trap MIBs supplied in the list: DELETE /settings/integration/trap-mib.
     *
     * @param  array<string, mixed>  $options
     */
    public function delete(array $options = []): bool
    {
        return $this->perform(new DeleteTrapMibRequest($options));
    }

    /**
     * Deletes Trap Objects supplied in the list: DELETE /settings/integration/trap-mib/trap-oid.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteTrapOid(array $options = []): bool
    {
        return $this->perform(new DeleteTrapMibTrapOidRequest($options));
    }
}
