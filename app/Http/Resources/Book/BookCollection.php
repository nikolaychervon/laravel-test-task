<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Traits\HasPaginatorResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BookCollection extends ResourceCollection
{
    use HasPaginatorResource;

    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return $this->getPaginationResponse($this->resource);
    }
}
