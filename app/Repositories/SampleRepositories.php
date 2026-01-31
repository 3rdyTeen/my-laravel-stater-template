<?php
namespace App\Repositories;

use App\Interfaces\SampleInterface;
use App\Models\Sample;
use Illuminate\Support\Collection;

class SampleRepositories implements SampleInterface
{
    public function create(array $arg): Sample
    {
        return Sample::create($arg);
    }

    public function list(): Collection
    {
        return Sample::all();
    }

    public function update(string $id, array $arg): Sample
    {
        return Sample::findOrFail($id);
    }

    public function delete(Sample $sample): void
    {
        $sample->delete();
    }
}
