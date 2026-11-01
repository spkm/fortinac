<?php

use Saloon\Config;
use spkm\FortiNac\Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| Every test boots the package in Testbench with an array cache. No request may reach a real FortiNAC: anything
| sent without a mock client throws a StrayRequestException. Fake FortiNAC with Tests\Helpers\FakeFortiNac.
|
*/

Config::preventStrayRequests();

pest()->extend(TestCase::class)->in('Feature', 'Spec');
