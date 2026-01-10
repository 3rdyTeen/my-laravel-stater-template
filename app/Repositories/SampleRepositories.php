<?php
namespace App\Repositories;

use App\Models\Sample;
use App\Repositories\Interfaces\SampleInterface;
use Illuminate\Support\Collection;

class SampleRepositories implements SampleInterface
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
