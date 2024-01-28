<?php

namespace App\Http\Controllers\Phearith;

use Illuminate\Database\Eloquent\Builder;


// GET /your-api-endpoint?filter1=value1&filter2=value2&sort=created_at&fields=name,description&page=1&limit=10

class APIFeatures
{
    protected $query;
    protected $queryString;

    public function __construct(Builder $query, array $queryString)
    {
        $this->query = $query;
        $this->queryString = $queryString;
    }

    public function apply()
    {
        $this->filter();
        $this->sort();
        $this->limitFields();
        $this->paginate();

        return $this->query;
    }

    protected function filter()
    {
        $queryObj = $this->queryString;
        $excludedFields = ['page', 'sort', 'limit', 'fields'];
        foreach ($excludedFields as $field) {
            unset($queryObj[$field]);
        }

        // Advanced filtering
        $queryStr = json_encode($queryObj);
        $queryStr = preg_replace('/\b(gte|gt|lte|lt)\b/', '$$1', $queryStr);

        $this->query = $this->query->where(json_decode($queryStr, true));

        return $this;
    }

    protected function sort()
    {
        if (isset($this->queryString['sort'])) {
            $sortBy = str_replace(',', ' ', $this->queryString['sort']);
            $this->query = $this->query->orderBy($sortBy);
        } else {
            $this->query = $this->query->orderBy('created_at', 'desc');
        }

        return $this;
    }

    protected function limitFields()
    {
        if (isset($this->queryString['fields'])) {
            $fields = str_replace(',', ' ', $this->queryString['fields']);
            $this->query = $this->query->selectRaw($fields);
        } else {
            $this->query = $this->query->selectRaw('*');
        }

        return $this;
    }

    protected function paginate()
    {
        $page = isset($this->queryString['page']) ? max(1, $this->queryString['page']) : 1;
        $limit = isset($this->queryString['limit']) ? max(1, $this->queryString['limit']) : 100;
        $skip = ($page - 1) * $limit;

        $this->query = $this->query->skip($skip)->take($limit);

        return $this;
    }
}
