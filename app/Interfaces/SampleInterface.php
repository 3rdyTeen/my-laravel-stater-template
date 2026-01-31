<?php
namespace App\Interfaces;

use App\Models\Sample;
use Illuminate\Support\Collection;

interface SampleInterface
{
    public function create(array $arg): Sample;
    public function update(string $id, array $arg): Sample;
    public function delete(Sample $sample): void;
    public function list(): Collection;
}
