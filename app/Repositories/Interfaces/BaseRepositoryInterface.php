<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    public function get(array $data): Collection|LengthAwarePaginator|Model;
    public function getOne(array $data): Model;
    public function insert(array $data): Model;
    public function patch(array $data): int;
    public function destroy(array $data): int;
    public function delete(array $data): int;
}
