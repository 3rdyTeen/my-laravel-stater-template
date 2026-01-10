<?php
namespace App\Services;

use App\DTOs\CreateSampleDTO;
use App\Repositories\Interfaces\SampleInterface;

class CreateSampleService
{
    public function __construct(
        private readonly SampleInterface $sample
    ) {}

    public function execute(CreateSampleDTO $dto)
    {
        return $this->sample->create($dto->toArray());
    }
}
