<?php

namespace App\Actions\Author;

use App\Contracts\Actions\Author\GetAuthorsActionContract;
use App\Repositories\AuthorRepository;
use Illuminate\Contracts\Pagination\Paginator;

class GetAuthorsAction implements GetAuthorsActionContract
{
    /**
     * @var AuthorRepository
     */
    private AuthorRepository $authors;

    /**
     * @param AuthorRepository $authors
     */
    public function __construct(AuthorRepository $authors)
    {
        $this->authors = $authors;
    }

    /**
     * Получить список авторов
     *
     * @return Paginator
     */
    public function __invoke(): Paginator
    {
        return $this->authors->getList();
    }
}
