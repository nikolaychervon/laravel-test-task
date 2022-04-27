<?php

namespace App\Http\Resources\Traits;

use Illuminate\Contracts\Pagination\Paginator;

trait HasPaginatorResource
{
    /**
     * @param Paginator $paginator
     * @return array
     */
    private function getPaginationResponse(Paginator $paginator): array
    {
        return [
            'items' => $paginator->items(),
            'meta' => [
                'total' => $paginator->total(),
                'count' => $paginator->count(),
                'current_page' => $paginator->currentPage(),
                'per_page' => $paginator->perPage(),
                'links' => [
                    'path' => $paginator->path(),
                    'next_page_url' => $paginator->nextPageUrl(),
                    'prev_page_url' => $paginator->previousPageUrl(),
                ],
            ],
        ];
    }
}
