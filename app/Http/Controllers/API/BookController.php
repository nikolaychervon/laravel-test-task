<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actions\Book\GetBooksActionContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookCollection;
use App\Http\Response\APIResponse;
use App\Models\Author;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    /**
     * Получить список книг
     *
     * @param GetBooksActionContract $getBooks
     * @return JsonResponse
     */
    public function index(GetBooksActionContract $getBooks): JsonResponse
    {
        return APIResponse::success(
            'Books list successfully received.',
            new BookCollection($getBooks())
        );
    }

    /**
     * Получить список книг для автора
     *
     * @param Author $author
     * @param GetBooksActionContract $getBooks
     * @return JsonResponse
     */
    public function indexByAuthor(Author $author, GetBooksActionContract $getBooks): JsonResponse
    {
        $resource = new BookCollection($getBooks($author));

        return APIResponse::success(
            "Books list for '{$author->name}' successfully received.",
            $resource->except(['author'])
        );
    }

//    public function store()
//    {
//        //
//    }

//    public function show()
//    {
//        //
//    }
//
//    public function update()
//    {
//        //
//    }
//
//    public function destroy()
//    {
//        //
//    }
}
