<?php

namespace App\DTO;

use App\DTO\Traits\HasNullable;
use Spatie\DataTransferObject\DataTransferObject;

class BookDTO extends DataTransferObject
{
    use HasNullable;

    /**
     * Название
     *
     * @var ?string
     */
    public ?string $title;

    /**
     * Описание
     *
     * @var ?string
     */
    public ?string $description;

    /**
     * Дата публикации
     *
     * @var ?string
     */
    public ?string $release_date;

    /**
     * ID автора
     *
     * @var ?int
     */
    public ?int $author_id;
}
