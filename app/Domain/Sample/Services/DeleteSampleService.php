<?php

namespace App\Domain\Sample\Services;

use App\Domain\Sample\Interfaces\SampleRepositoryInterface;
use App\Domain\Sample\Models\Sample;

class DeleteSampleService
{
    public function __construct(

        private readonly SampleRepositoryInterface $sample
    ) {}

    public function execute(Sample $dto)
    {
        return $this->sample->delete($dto);
    }
}
