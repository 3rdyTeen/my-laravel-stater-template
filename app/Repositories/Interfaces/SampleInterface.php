<?php
namespace App\Repositories\Interfaces;

use App\Models\Sample;
use Illuminate\Support\Collection;

interface SampleInterface extends BaseRepositoryInterface
{
    public function save(): Sample;
    public function list(): Collection;
}
