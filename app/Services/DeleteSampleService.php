<?php
namespace App\Services;

use App\Models\Sample;
use App\Repositories\Interfaces\SampleInterface;

class DeleteSampleService
{
    public function __construct(
        private readonly SampleInterface $sample
    ) {}

    public function execute(Sample $dto)
    {
        return $this->sample->delete($dto);
    }
}
