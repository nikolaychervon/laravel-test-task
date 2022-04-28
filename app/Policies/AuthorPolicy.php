<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
{
    use HandlesAuthorization;

    /**
     * @param User|null $user
     * @param Author $author
     * @param Book $book
     * @return bool
     */
    public function view(?User $user, Author $author, Book $book): bool
    {
        if (!$author->hasBook($book)) {
            abort(404);
        }

        return true;
    }
}
