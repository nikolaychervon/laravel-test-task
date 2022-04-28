<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * @param ?User $user
     * @param Book $book
     * @param Author $author
     * @return bool
     */
    public function view(?User $user, Book $book, Author $author): bool
    {
        if (!$book->hasAuthor($author)) {
            abort(404);
        }

        return true;
    }
}
