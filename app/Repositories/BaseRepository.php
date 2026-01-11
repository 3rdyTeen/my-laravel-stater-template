<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;
    protected int $defaultCacheMinutes = 60;//default cache

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Dynamic select query builder
     *
     * @param array $select Columns to select
     * @param array $relations Eager loaded relations
     * @param array $where [['column','operator','value'], ...]
     * @param array $joins [['table','first','operator','second','type']]
     * @param array $order [['column','direction'], ...]
     * @param int|null $limit
     * @param int|null $paginate
     * @param string|null $cacheKey
     */
    public function get(array $options = []): Collection|LengthAwarePaginator|Model
    {
        // Default config
        $config = array_merge([
            'select' => ['*'],
            'relations' => [],
            'where' => [],
            'joins' => [],
            'order' => [],
            'limit' => null,
            'paginate' => null,
            'cacheKey' => null,
            'getOne' => false,
        ], $options);

        // Key checker: remove unknown keys
        $allowedKeys = ['select','relations','where','joins','order','limit','paginate','cacheKey'];
        $config = array_filter($config, fn($k) => in_array($k, $allowedKeys), ARRAY_FILTER_USE_KEY);

        $query = $this->model->newQuery();

        // Select columns
        $query->select($config['select']);

        // Joins
        foreach ($config['joins'] as $join) {
            $query->join($join[0], $join[1], $join[2], $join[3], $join[4] ?? 'inner');
        }

        // Eager load
        if ($config['relations']) $query->with($config['relations']);

        // Where clauses
        foreach ($config['where'] as $condition) {
            if (count($condition) === 2) {
                $query->where($condition[0], '=', $condition[1]);
            } else {
                $query->where(...$condition);
            }
        }

        // Order
        foreach ($config['order'] as $o) {
            $query->orderBy($o[0], $o[1] ?? 'asc');
        }

        // Limit
        if ($config['limit']) $query->limit($config['limit']);

        // Cache
        if ($config['cacheKey']) {
            return Cache::remember($config['cacheKey'], $this->defaultCacheMinutes, fn() =>
                $config['paginate'] ? $query->paginate($config['paginate']) : $query->get()
            );
        }

        if ($config['getOne']) {
            return $query->firstOrFail();
        }

        // Pagination or get
        return $config['paginate'] ? $query->paginate($config['paginate']) : $query->get();
    }

    /**
     * Get One record
     * Same Paramater on
     *
     */
    public function getOne(array $options = []): Model
    {
        $options['getOne'] = true;
        return $this->get($options);
    }

    /**
     * Insert Query
     *
     */
    public function insert(array $data): Model
    {
        // Create record
        return $this->model->create($data);
    }


    /**
     * Dynamic update query builder
     *
     * @param array $attributes Columns to update
     * @param array $where [['column','operator','value'], ...]
     */
     public function patch(array $data): int
    {
        return DB::transaction(function () use ($data) {
            $attributes = $data['attributes'] ?? [];
            $where = $data['where'] ?? [];

            $query = $this->model->newQuery();
            foreach ($where as $condition) $query->where(...$condition);

            return $query->update($attributes);
        });
    }

    /**
     * Dynamic update delete builder
     *
     * @param array $attributes Columns to update
     * @param array $where [['column','operator','value'], ...]
    */
    public function destroy(array $data): int
    {
        return DB::transaction(function () use ($data) {
            $where = $data['where'] ?? [];
            $query = $this->model->newQuery();
            foreach ($where as $condition) $query->where(...$condition);
            return $query->delete();
        });
    }


    /**
     * Dynamic update delete builder
     *
     * @param array $attributes Columns to update
     * @param array $where [['column','operator','value'], ...]
    */
    public function delete(array|string|int $data): int
    {
        $deleteParam = [];
        if (is_int($data) || is_string($data)) {
            // single id
            $deleteParams['where'] = [['id', '=', $data]];
        }
        else if (is_array($data) && array_is_list($data)) {
            // Array of IDs
            $deleteParams['where'] = [['id', 'in', $data]];
        }else if(is_array($data) && isset($data['where'])){
            // Array with 'where' key
            $deleteParam = $data;
        }

        if(empty($deleteParam)) return 0;

        return $this->destroy($deleteParam);
    }
}
