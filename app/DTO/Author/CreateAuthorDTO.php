<?php

namespace App\DTO\Author;

use Spatie\DataTransferObject\DataTransferObject;

class CreateAuthorDTO extends DataTransferObject
{
    /**
     * Имя
     *
     * @var string
     */
    public string $name;

    /**
     * Фамилия
     *
     * @var string
     */
    public string $surname;

    /**
     * Дата рождения
     *
     * @var string
     */
    public string $birth_date;
}
