<?php

namespace App\Actions\Author;

use App\Contracts\Actions\CreateAuthorActionContract;
use App\DTO\Author\CreateAuthorDTO;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;

class CreateAuthorAction implements CreateAuthorActionContract
{
    /**
     * Создание нового автора
     *
     * @param CreateAuthorDTO $DTO
     * @return ?Author
     */
    public function __invoke(CreateAuthorDTO $DTO): Model|Author
    {
        return Author::query()->create($DTO->toArray());
    }
}
