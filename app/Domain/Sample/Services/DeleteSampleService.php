<?php

namespace App\Domain\Sample\Services;

use App\Domain\Sample\Models\Sample;
use App\Domain\Sample\Repositories\SampleRepositoryInterface;

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
