<?php

namespace App\Actions\Author;

use App\Contracts\Actions\Author\CreateAuthorActionContract;
use App\DTO\AuthorDTO;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;

class CreateAuthorAction implements CreateAuthorActionContract
{
    /**
     * Создание нового автора
     *
     * @param AuthorDTO $DTO
     * @return ?Author
     */
    public function __invoke(AuthorDTO $DTO): Model|Author
    {
        return Author::query()->create($DTO->toArray());
    }
}
