<?php

namespace App\Contracts\Actions\Author;

use App\DTO\AuthorDTO;
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
