<?php
namespace App\Domain\Sample\Repositories;

use App\Domain\Sample\Interfaces\SampleRepositoryInterface;
use App\Domain\Sample\Models\Sample;
use Illuminate\Support\Collection;

class SampleRepository implements SampleRepositoryInterface
{
    public function create(array $data): Sample
    {
        return Sample::create($data);
    }


    public function update(string $id, array $data): Sample
    {
        $sample = Sample::findOrFail($id);
        return $sample;
    }

    public function delete(Sample $sample): void
    {
        $sample->delete();
    }

    public function list(): Collection
    {
        return Sample::all();
    }
}
