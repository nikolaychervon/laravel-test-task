<?php

namespace App\Contracts\Actions;

use App\DTO\Author\CreateAuthorDTO;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;

interface CreateAuthorActionContract
{
    /**
     * Создать нового автора
     *
     * @param CreateAuthorDTO $DTO
     * @return ?Author
     */
    public function __invoke(CreateAuthorDTO $DTO): Model|Author;
}
