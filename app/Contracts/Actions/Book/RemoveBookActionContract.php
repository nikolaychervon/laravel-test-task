<?php

namespace App\Contracts\Actions\Book;

use App\Models\Book;

interface RemoveBookActionContract
{
    /**
     * Удалить книгу
     *
     * @param Book $book
     * @return bool
     */
    public function __invoke(Book $book): bool;
}
