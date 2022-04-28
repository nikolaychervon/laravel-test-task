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
     * @param string|null $search
     * @return Paginator
     */
    public function __invoke(?string $search = null, ?Author $author = null): Paginator;
}
