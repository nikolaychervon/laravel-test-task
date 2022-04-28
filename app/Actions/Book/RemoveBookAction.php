<?php

namespace App\Actions\Book;

use App\Contracts\Actions\Book\RemoveBookActionContract;
use App\Models\Book;

class RemoveBookAction implements RemoveBookActionContract
{
    /**
     * Удалить книгу
     *
     * @param Book $book
     * @return bool
     */
    public function __invoke(Book $book): bool
    {
        return $book->delete();
    }
}
