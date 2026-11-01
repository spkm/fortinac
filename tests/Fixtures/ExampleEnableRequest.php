<?php

namespace spkm\FortiNac\Tests\Fixtures;

use spkm\FortiNac\Requests\ActionRequest;

class ExampleEnableRequest extends ActionRequest
{
    protected ?string $dto = ExampleData::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return "/example/{$this->id}/enable";
    }
}
