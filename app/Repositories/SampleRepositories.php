<?php
namespace App\Repositories;

use App\Models\Sample;
use App\Repositories\Interfaces\SampleInterface;
use Illuminate\Support\Collection;

class SampleRepositories extends BaseRepository  implements SampleInterface
{

    public function list(): Collection
    {
        return Sample::all();
    }
}
