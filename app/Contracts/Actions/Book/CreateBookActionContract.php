<?php

namespace App\Contracts\Actions\Book;

use App\DTO\BookDTO;
use App\Models\Book;
use Illuminate\Database\Eloquent\Model;

interface CreateBookActionContract
{
    /**
     * Создать новую книгу
     *
     * @param BookDTO $DTO
     * @return Model|Book
     */
    public function __invoke(BookDTO $DTO): Model|Book;
}
