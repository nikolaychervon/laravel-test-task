<?php

namespace App\Contracts\Actions\Book;

use App\Models\Author;
use Illuminate\Contracts\Pagination\Paginator;

interface GetBooksActionContract
{
    /**
     * Получить список книг
     *
     * @param Author|null $author
     * @return Paginator
     */
    public function __invoke(?Author $author = null): Paginator;
}
