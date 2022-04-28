<?php

namespace App\Actions\Book;

use App\Contracts\Actions\Book\UpdateBookActionContract;
use App\DTO\BookDTO;
use App\Models\Book;

class UpdateBookAction implements UpdateBookActionContract
{
    /**
     * Обновить книгу
     *
     * @param Book $book
     * @param BookDTO $DTO
     * @return Book
     */
    public function __invoke(Book $book, BookDTO $DTO): Book
    {
        $book->update($DTO->exceptNullable());
        return $book;
    }
}
