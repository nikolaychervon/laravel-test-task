<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class AbstractRepository
{
    /**
     * @var string
     */
    protected string $model;

    /**
     * @return Builder
     */
    protected function query(): Builder
    {
        $model = new $this->model;
        if ($model instanceof Model) {
            return $model::query();
        }

        $exception = new ModelNotFoundException('Не найдена модель');
        $exception->setModel($this->model);
        throw $exception;
    }
}
