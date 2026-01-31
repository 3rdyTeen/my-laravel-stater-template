<?php

namespace App\Domain\Sample\Services;

use App\Domain\Sample\DTOs\CreateSampleDTO;
use App\Domain\Sample\Interfaces\SampleRepositoryInterface;

class UpdateSampleService
{
    public function __construct(

        private readonly SampleRepositoryInterface $sample
    ) {}

    public function execute(string $id, CreateSampleDTO $dto)
    {
        return $this->sample->update($id, $dto->toArray());
    }
}
