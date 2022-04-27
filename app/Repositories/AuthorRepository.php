<?php

namespace App\Repositories;

use App\Models\Author;
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
}
