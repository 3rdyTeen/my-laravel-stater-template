<?php

namespace App\Domain\Sample\Services;

use App\Domain\Sample\DTOs\CreateSampleDTO;
use App\Domain\Sample\Interfaces\SampleRepositoryInterface;

class CreateSampleService
{
    public function __construct(
        private readonly SampleRepositoryInterface $sample
    ) {}

    public function execute(CreateSampleDTO $dto)
    {
        return $this->sample->create($dto->toArray());
    }
}
