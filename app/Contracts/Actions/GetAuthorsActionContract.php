<?php

namespace App\Contracts\Actions;

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
