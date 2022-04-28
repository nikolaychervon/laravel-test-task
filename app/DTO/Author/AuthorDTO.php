<?php

namespace App\DTO\Author;

use Spatie\DataTransferObject\DataTransferObject;

class AuthorDTO extends DataTransferObject
{
    /**
     * Имя
     *
     * @var ?string
     */
    public ?string $name;

    /**
     * Фамилия
     *
     * @var ?string
     */
    public ?string $surname;

    /**
     * Дата рождения
     *
     * @var ?string
     */
    public ?string $birth_date;

    /**
     * @return array
     */
    public function exceptNullable(): array
    {
        return array_diff($this->toArray(), [null]);
    }
}
