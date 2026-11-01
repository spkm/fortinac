<?php

namespace spkm\FortiNac\Resources\Host;

use spkm\FortiNac\Data\Host\ScanResult;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Host\ScanResult\CountAllScanResultsRequest;
use spkm\FortiNac\Requests\Host\ScanResult\CountScanResultsRequest;
use spkm\FortiNac\Requests\Host\ScanResult\CreateScanResultRequest;
use spkm\FortiNac\Requests\Host\ScanResult\GetScanResultArchiveImportStatusRequest;
use spkm\FortiNac\Requests\Host\ScanResult\GetScanResultArchivesRequest;
use spkm\FortiNac\Requests\Host\ScanResult\GetScanResultRequest;
use spkm\FortiNac\Requests\Host\ScanResult\GetScanResultsRequest;
use spkm\FortiNac\Requests\Host\ScanResult\PostScanResultArchiveCreateRequest;
use spkm\FortiNac\Requests\Host\ScanResult\PostScanResultArchiveImportRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Host, Scan Result, from FortiNac::host()->scans().
 *
 * @extends Builder<ScanResult>
 */
class ScanResultResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, ScanResult::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetScanResultsRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountScanResultsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetScanResultRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateScanResultRequest([...$body, ...$options]);
    }

    /**
     * Return the list of archived scan result available on the file system: GET /host/scan/archives.
     */
    public function archives(): mixed
    {
        return $this->fetch(new GetScanResultArchivesRequest);
    }

    /**
     * Returns the percentage completed for the most recent import of a Scan Results archive: GET /host/scan/archive/import/status.
     */
    public function archiveImportStatus(): mixed
    {
        return $this->fetch(new GetScanResultArchiveImportStatusRequest);
    }

    /**
     * Returns the count of all Scan Results in the database: GET /host/scan/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllScanResultsRequest);
    }

    /**
     * Creates a new archive of all scans or set of scans by ID: POST /host/scan/archive/create.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function archiveCreate(array $options = []): bool
    {
        return $this->perform(new PostScanResultArchiveCreateRequest($options));
    }

    /**
     * Imports the contents of a Scan Results archive into the database from the filesystem: POST /host/scan/archive/import.
     *
     * @param  array<string, mixed>  $options
     */
    public function archiveImport(array $options = []): bool
    {
        return $this->perform(new PostScanResultArchiveImportRequest($options));
    }
}
