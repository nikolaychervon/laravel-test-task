<?php

namespace App\Actions\Author;

use App\Contracts\Actions\Author\UpdateAuthorActionContract;
use App\DTO\Author\AuthorDTO;
use App\Models\Author;

class UpdateAuthorAction implements UpdateAuthorActionContract
{
    /**
     * Обновление автора
     *
     * @param Author $author
     * @param AuthorDTO $DTO
     * @return Author
     */
    public function __invoke(Author $author, AuthorDTO $DTO): Author
    {
        $author->update($DTO->exceptNullable());
        return $author;
    }
}
