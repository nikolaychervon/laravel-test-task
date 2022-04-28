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
        return $this->query()
            ->when($authorID, fn($query) => $query->where('author_id', $authorID))
            ->when($search, fn($query) => $this->searchQuery($query, $search))
            ->latest()
            ->paginate($this->perPage);
    }

    /**
     * Найти книгу
     *
     * @param Builder $builder
     * @param string $search
     * @return void
     */
    private function searchQuery(Builder $builder, string $search): void
    {
        $builder->where(function ($query) use ($search) {
            $query
                ->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('release_date', 'like', "%$search%");
        });
    }
}
