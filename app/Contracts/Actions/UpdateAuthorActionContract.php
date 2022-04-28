<?php

namespace App\Contracts\Actions;

use App\DTO\Author\AuthorDTO;
use App\Models\Author;

interface UpdateAuthorActionContract
{
    /**
     * Обновить автора
     *
     * @param Author $author
     * @param AuthorDTO $DTO
     * @return Author
     */
    public function __invoke(Author $author, AuthorDTO $DTO): Author;
}
