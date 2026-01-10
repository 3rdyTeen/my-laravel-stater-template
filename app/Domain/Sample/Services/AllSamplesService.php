<?php

namespace App\Domain\Sample\Services;

use App\Domain\Sample\Repositories\SampleRepositoryInterface;

class AllSamplesService
{
    public function __construct(

        private readonly SampleRepositoryInterface $sample
    ) {}

    public function execute()
    {
        return $this->sample->list();
    }
}
