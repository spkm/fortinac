<?php

namespace spkm\FortiNac\Resources\System;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\System\DebugDatabaseRelation;
use spkm\FortiNac\Data\System\DebugElementsAttribute;
use spkm\FortiNac\Data\System\DebugPluginStatus;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\System\Debug\GetDebugDatabaseRelationsRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugDatabaseTablesDataRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugDatabaseTablesRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugElementsAttributesRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugElementsRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugGrabLogSnapshotDownloadRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugGrabLogSnapshotStatusRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugGuiExperimentsRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugLoggerNamesRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugLogRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugPluginNamesRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugPluginPerformanceRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugPluginResourcesReloadersRequest;
use spkm\FortiNac\Requests\System\Debug\GetDebugPluginStatusRequest;
use spkm\FortiNac\Requests\System\Debug\PostDebugElementsAttributesDeleteRequest;
use spkm\FortiNac\Requests\System\Debug\PostDebugGrabLogSnapshotStartRequest;
use spkm\FortiNac\Requests\System\Debug\PostDebugGuiSnapshotRequest;
use spkm\FortiNac\Requests\System\Debug\PostDebugPluginRequest;
use spkm\FortiNac\Requests\System\Debug\PostDebugPluginResourcesReloadRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * System, from FortiNac::system()->debug().
 *
 * @extends BaseResource<Data>
 */
class DebugResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns the requested number of lines from the tail of one of the log files on the system: GET /system/debug/log.
     *
     * @param  array<string, mixed>  $options  Query options: logName, tailLog, lastKnownLogLength, LogLines, hostName, filter
     */
    public function log(array $options = []): mixed
    {
        return $this->fetch(new GetDebugLogRequest($options));
    }

    /**
     * Queries the relations table, a polymorphic associative table between various other tables: GET /system/debug/database/relations.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, DebugDatabaseRelation>
     */
    public function databaseRelations(Query|array $query = []): Collection
    {
        return $this->fetch(new GetDebugDatabaseRelationsRequest($query));
    }

    /**
     * Returns a summary of all tables in the database: GET /system/debug/database/tables.
     */
    public function databaseTables(): mixed
    {
        return $this->fetch(new GetDebugDatabaseTablesRequest);
    }

    /**
     * Queries the table and returns the results of the query as a JSON array: GET /system/debug/database/tables/data.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function databaseTablesData(Query|array $query = []): Collection
    {
        return $this->fetch(new GetDebugDatabaseTablesDataRequest($query));
    }

    /**
     * Returns Name/ID pairs of the elements of a given type. Allowed types are host, adapter, user, and device: GET /system/debug/elements.
     *
     * @param  array<string, mixed>  $options  Query options: type, id
     */
    public function elements(array $options = []): mixed
    {
        return $this->fetch(new GetDebugElementsRequest($options));
    }

    /**
     * Returns attributes stored by the system on the elements of a given type and DBID. Allowed types are host, adapter, user, device, and nselem: GET /system/debug/elements/attributes.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, DebugElementsAttribute>
     */
    public function elementsAttributes(Query|array $query = []): Collection
    {
        return $this->fetch(new GetDebugElementsAttributesRequest($query));
    }

    /**
     * Download the gran log snapshot file: GET /system/debug/grabLogSnapshot-download.
     *
     * @param  array<string, mixed>  $options  Query options: hostName, type
     */
    public function grabLogSnapshotDownload(array $options = []): mixed
    {
        return $this->fetch(new GetDebugGrabLogSnapshotDownloadRequest($options));
    }

    /**
     * Returns the status of an ongoing grab log snapshot collection: GET /system/debug/grabLogSnapshot-status.
     *
     * @param  array<string, mixed>  $options  Query options: hostName, type
     */
    public function grabLogSnapshotStatus(array $options = []): mixed
    {
        return $this->fetch(new GetDebugGrabLogSnapshotStatusRequest($options));
    }

    /**
     * Returns if the GUI is currently configured to display any experimental or early development features: GET /system/debug/gui/experiments.
     */
    public function guiExperiments(): mixed
    {
        return $this->fetch(new GetDebugGuiExperimentsRequest);
    }

    /**
     * Returns the current list of loggers defined for the system: GET /system/debug/logger-names.
     */
    public function loggerNames(): mixed
    {
        return $this->fetch(new GetDebugLoggerNamesRequest);
    }

    /**
     * Returns the list of plugins able to dynamically reload system resources: GET /system/debug/plugin/resources/reloaders.
     */
    public function pluginResourcesReloaders(): mixed
    {
        return $this->fetch(new GetDebugPluginResourcesReloadersRequest);
    }

    /**
     * Returns the current list of plugins defined for the system: GET /system/debug/plugin-names.
     */
    public function pluginNames(): mixed
    {
        return $this->fetch(new GetDebugPluginNamesRequest);
    }

    /**
     * Gets the current performance statistics for the supplied plugin: GET /system/debug/plugin-performance.
     *
     * @param  array<string, mixed>  $options  Query options: pluginName
     */
    public function pluginPerformance(array $options = []): mixed
    {
        return $this->fetch(new GetDebugPluginPerformanceRequest($options));
    }

    /**
     * Returns the debug status for all plugins: GET /system/debug/plugin-status.
     */
    public function pluginStatus(): ?DebugPluginStatus
    {
        return $this->fetchOrNull(new GetDebugPluginStatusRequest);
    }

    /**
     * Start collecting a grab log snapshot: POST /system/debug/grabLogSnapshot-start.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function grabLogSnapshotStart(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new PostDebugGrabLogSnapshotStartRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Sends an e-mail to FortiNAC support using the configured SMTP server containing a provided snapshot from the GUI: POST /system/debug/gui/snapshot.
     *
     * @param  array<string, mixed>  $options  Query options: recipient, subject, message
     */
    public function guiSnapshot(array $options = []): bool
    {
        return $this->perform(new PostDebugGuiSnapshotRequest($options));
    }

    /**
     * Sets the debug status to be enabled or disabled for one or more plugins: POST /system/debug/plugin.
     *
     * @param  array<string, mixed>  $options  Query options: enable, plugin
     */
    public function plugin(array $options = []): bool
    {
        return $this->perform(new PostDebugPluginRequest($options));
    }

    /**
     * Issues a request for the plugin to reload system resources or device mappings, if supported: POST /system/debug/plugin/resources/reload.
     *
     * @param  array<string, mixed>  $options  Query options: reloadType
     */
    public function pluginResourcesReload(array $options = []): bool
    {
        return $this->perform(new PostDebugPluginResourcesReloadRequest($options));
    }

    /**
     * Deletes one or more attributes stored by the system on the elements of a given type and DBID. Allowed types are host, adapter, user, device, and nselem: POST /system/debug/elements/attributes/delete.
     *
     * @param  array<string, mixed>  $options  Query options: type, id, attrName
     */
    public function elementsAttributesDelete(array $options = []): bool
    {
        return $this->perform(new PostDebugElementsAttributesDeleteRequest($options));
    }
}
