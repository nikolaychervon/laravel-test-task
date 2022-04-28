<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class BookRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected string $model = Book::class;

    /**
     * @var int
     */
    private int $perPage;

    /**
     * @construct BookRepository
     */
    public function __construct()
    {
        $this->perPage = config('pagination.books.per_page');
    }

    /**
     * Получить список книг
     *
     * @param string|null $search
     * @param int|null $authorID
     * @return Paginator
     */
    public function getList(?string $search = null, ?int $authorID = null): Paginator
    {
        $query = $this->query();

        if ($authorID) {
            $query = $query->where('author_id', $authorID);
        }

        if ($search) {
            $query = $this->searchQuery($query, $search);
        }

        return $query->latest()->paginate($this->perPage);
    }

    /**
     * Найти книгу
     *
     * @param Builder $builder
     * @param string $text
     * @return Builder
     */
    private function searchQuery(Builder $builder, string $text): Builder
    {
        // Был вариант, сделать через CONCAT(title, description, release_date) like %search%.
        // Прочитал, что такой способ ухудшает производительность.
        return $builder
            ->where('title', 'like', "%$text%")
            ->orWhere('description', 'like', "%$text%")
            ->orWhere('release_date', 'like', "%$text%");
    }
}
