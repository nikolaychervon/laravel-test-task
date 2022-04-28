<?php

namespace App\Actions\Book;

use App\Contracts\Actions\Book\GetBooksActionContract;
use App\Models\Author;
use App\Repositories\BookRepository;
use Illuminate\Contracts\Pagination\Paginator;

class GetBooksAction implements GetBooksActionContract
{
    /**
     * @var BookRepository
     */
    private BookRepository $books;

    /**
     * @param BookRepository $books
     */
    public function __construct(BookRepository $books)
    {
        $this->books = $books;
    }

    /**
     * Получить список книг
     *
     * @param string|null $search
     * @param Author|null $author
     * @return Paginator
     */
    public function __invoke(?string $search = null, ?Author $author = null): Paginator
    {
        return $this->books->getList($search, $author?->id);
    }
}
