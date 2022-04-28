<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Author\AuthorResource;
use App\Http\Resources\Traits\Filtratable;
use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $release_date
 * @property ?Author $author
 * @property Carbon $created_at
 */
class BookResource extends JsonResource
{
    use Filtratable;

    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        $author = $this->author ? new AuthorResource($this->author) : 'Автор данной книги был удален с площадки.';

        return $this->filtratableFields([
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'release_date' => $this->release_date,
            'author' => $author,
            'created_at' => str($this->created_at),
        ]);
    }
}
