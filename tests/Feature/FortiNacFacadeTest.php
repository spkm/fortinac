<?php

use spkm\FortiNac\Facades\FortiNac;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\FortiNacService;
use spkm\FortiNac\Resources\HasResources;

it('hints every resource group and every public connector method for the IDE', function () {
    $docblock = (string) (new ReflectionClass(FortiNac::class))->getDocComment();
    $resources = array_map(fn (ReflectionMethod $method) => $method->getName(), (new ReflectionClass(HasResources::class))->getMethods(ReflectionMethod::IS_PUBLIC));
    $service = array_map(fn (ReflectionMethod $method) => $method->getName(), array_filter((new ReflectionClass(FortiNacService::class))->getMethods(ReflectionMethod::IS_PUBLIC), fn (ReflectionMethod $method) => ! str_starts_with($method->getName(), '__')));
    $connector = ['send', 'paginate', 'from', 'get', 'post', 'put', 'delete'];

    expect($resources)->not->toBeEmpty();

    foreach ([...$resources, ...$service, ...$connector] as $method) {
        expect($docblock)->toContain(" $method(");
    }

    foreach ($connector as $method) {
        expect(method_exists(FortiNacConnector::class, $method))->toBeTrue();
    }
});
