<?php

namespace App\Domain\Sample\Repositories;

use App\Domain\Sample\Models\Sample;
use Illuminate\Support\Collection;

interface SampleRepositoryInterface
{
    public function create(array $data): Sample;
    public function update(string $id, array $data): Sample;
    public function delete(Sample $sample): void;
    public function list(): Collection;
}
