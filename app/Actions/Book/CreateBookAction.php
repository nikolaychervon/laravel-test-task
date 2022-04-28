<?php

namespace App\Actions\Book;

use App\Contracts\Actions\Book\CreateBookActionContract;
use App\DTO\BookDTO;
use App\Models\Book;
use Illuminate\Database\Eloquent\Model;

class CreateBookAction implements CreateBookActionContract
{
    /**
     * Создание новой книги
     *
     * @param BookDTO $DTO
     * @return Model|Book
     */
    public function __invoke(BookDTO $DTO): Model|Book
    {
        return Book::query()->create($DTO->toArray());
    }
}
