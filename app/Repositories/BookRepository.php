<?php

namespace App\Repositories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\Pagination\Paginator;

class BookRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected string $model = Book::class;

    /**
     * Получить список книг
     *
     * @return Paginator
     */
    public function getList(): Paginator
    {
        $perPage = config('pagination.books.per_page');
        return $this->query()->paginate($perPage);
    }

    /**
     * Получить списко книг для автора
     *
     * @param int $authorID
     * @return Paginator
     */
    public function getListByAuthorID(int $authorID): Paginator
    {
        $perPage = config('pagination.books.per_page');
        return $this
            ->query()
            ->where('author_id', $authorID)
            ->paginate($perPage);
    }
}
