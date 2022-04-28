<?php

namespace App\Contracts\Actions\Author;

use App\Models\Author;

interface RemoveAuthorActionContract
{
    /**
     * Удалить автора
     *
     * @param Author $author
     * @return ?bool
     */
    public function __invoke(Author $author): ?bool;
}
