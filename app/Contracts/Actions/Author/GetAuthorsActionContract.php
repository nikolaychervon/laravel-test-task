<?php

namespace App\Contracts\Actions\Author;

use Illuminate\Contracts\Pagination\Paginator;

interface GetAuthorsActionContract
{
    /**
     * Получить список авторов
     *
     * @return Paginator
     */
    public function __invoke(): Paginator;
}
