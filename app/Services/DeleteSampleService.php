<?php
namespace App\Services;

use App\Interfaces\SampleInterface;
use App\Models\Sample;

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
