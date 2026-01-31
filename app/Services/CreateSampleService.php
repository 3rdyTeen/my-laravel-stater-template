<?php
namespace App\Services;

use App\DTOs\CreateSampleDTO;
use App\Interfaces\SampleInterface;

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
