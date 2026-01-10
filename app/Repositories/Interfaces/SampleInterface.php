<?php
namespace App\Repositories\Interfaces;

use App\Models\Sample;
use Illuminate\Support\Collection;

interface SampleInterface
{
    public function create(array $data): Sample;
    public function update(string $id, array $data): Sample;
    public function delete(Sample $sample): void;
    public function list(): Collection;
}
