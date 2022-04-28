<?php

namespace App\Contracts\Actions\Book;

use App\DTO\BookDTO;
use App\Models\Book;

interface UpdateBookActionContract
{
    /**
     * Обновить книгу
     *
     * @param Book $book
     * @param BookDTO $DTO
     * @return Book
     */
    public function __invoke(Book $book, BookDTO $DTO): Book;
}
