<?php

namespace App\Contracts\Actions\Author;

use App\DTO\Author\AuthorDTO;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;

interface CreateAuthorActionContract
{
    /**
     * Создать нового автора
     *
     * @param AuthorDTO $DTO
     * @return ?Author
     */
    public function __invoke(AuthorDTO $DTO): Model|Author;
}
