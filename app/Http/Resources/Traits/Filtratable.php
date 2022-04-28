<?php

namespace App\Http\Resources\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

trait Filtratable
{
    /**
     * @var array
     */
    private array $filtratableFields = [];

    /**
     * @var string
     */
    private string $filterMethod;

    /**
     * @param array $fields
     * @return $this
     */
    public function except(array $fields): static
    {
        $this->registerFilter('except', $fields);
        return $this;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function only(array $fields): static
    {
        $this->registerFilter('only', $fields);
        return $this;
    }

    /**
     * @param array|Collection $collection
     * @return array|Collection
     */
    public function processCollection(array|Collection $collection): array|Collection
    {
        if (empty($this->filtratableFields)) {
            return $collection;
        }

        if (is_array($collection)) {
            $collection = collect($collection);
        }

        return $collection->map(function ($resource) {
            $method = $this->filterMethod;
            return $resource->$method($this->filtratableFields)->toArray(new Request());
        })->all();
    }

    /**
     * @param array $fields
     * @return array
     */
    private function filtratableFields(array $fields): array
    {
        if (isset($this->filterMethod)) {
            $filter = $this->filterMethod;
            return collect($fields)->{$filter}($this->filtratableFields)->toArray();
        }

        return $fields;
    }

    /**
     * @param string $method
     * @param array $fields
     * @return void
     */
    private function registerFilter(string $method, array $fields): void
    {
        $this->filterMethod = $method;
        $this->filtratableFields = $fields;
    }
}
