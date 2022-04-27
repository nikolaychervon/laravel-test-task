<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

class AuthorRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected string $model = Author::class;

    /**
     * Получить рандомного Автора
     *
     * @return Model|Author
     */
    public function getRandom(): Model|Author
    {
        return $this->query()->inRandomOrder()->first();
    }

    /**
     * Получить список Авторов
     *
     * @return Paginator
     */
    public function getList(): Paginator
    {
        $perPage = config('pagination.authors.per_page');
        return $this->query()->simplePaginate($perPage);
    }
}
