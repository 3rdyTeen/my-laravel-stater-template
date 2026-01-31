<?php
namespace App\Services;

use App\Interfaces\SampleInterface;

class AllSamplesService
{
    public function __construct(
        private readonly SampleInterface $sample
    ) {}

    public function execute()
    {
        return $this->sample->list();
    }
}
