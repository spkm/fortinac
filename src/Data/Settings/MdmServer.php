<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A MdmServer record.
 */
readonly class MdmServer extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?string $name = null,
        public ?string $version = null,
        public ?string $request = null,
        public ?string $identifier = null,
        public ?string $userID = null,
        public ?string $credentialText = null,
        public ?string $pluginName = null,
        public ?bool $deleteOnRemove = null,
        public ?bool $onDemandRegistration = null,
        public ?bool $reValidation = null,
        public ?bool $updateApplications = null,
        public ?bool $poll = null,
        public ?CarbonImmutable $pollInterval = null,
        public ?CarbonImmutable $lastPoll = null,
        public ?CarbonImmutable $lastSuccessfulPoll = null,
        public ?CarbonImmutable $createDate = null,
        public ?string $maaS360PlatformID = null,
        public ?string $maaS360AppID = null,
        public ?string $maaS360AppVersion = null,
        public ?string $maaS360AppAccessKey = null,
        public ?bool $otOnly = null,
        public ?bool $approvedOnly = null,
        public ?bool $insecureSSL = null,
        public ?string $riskLevel = null,
        public ?bool $complianceRetrieval = null,
        public ?bool $sslVerifyCert = null,
        public ?bool $sslVerifyHostname = null,
        public ?string $option1 = null,
        public ?string $option2 = null,
        public ?string $option3 = null,
        public ?string $option4 = null,
        public ?CarbonImmutable $connectTimeout = null,
        public ?CarbonImmutable $readTimeout = null,
        public ?string $password = null,
        public array $extra = [],
    ) {}
}
