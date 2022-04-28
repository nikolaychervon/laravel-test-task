<?php

namespace App\DTO;

use App\DTO\Traits\HasNullable;
use Spatie\DataTransferObject\DataTransferObject;

class AuthorDTO extends DataTransferObject
{
    use HasNullable;

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
