<?php

namespace App\Actions\Author;

use App\Contracts\Actions\RemoveAuthorActionContract;
use App\Models\Author;

class RemoveAuthorAction implements RemoveAuthorActionContract
{
    /**
     * Удаление автора
     *
     * @param Author $author
     * @return ?bool
     */
    public function __invoke(Author $author): ?bool
    {
        return $author->delete();
    }
}
