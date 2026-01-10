<?php
namespace App\Services;

use App\DTOs\CreateSampleDTO;
use App\Repositories\Interfaces\SampleInterface;

class UpdateSampleService
{
    public function __construct(
        private readonly SampleInterface $sample
    ) {}

    public function execute(string $id, CreateSampleDTO $dto)
    {
        return $this->sample->update($id, $dto->toArray());
    }
}
