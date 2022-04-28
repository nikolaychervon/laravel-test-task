<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actions\Book\CreateBookActionContract;
use App\Contracts\Actions\Book\GetBooksActionContract;
use App\DTO\BookDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookCreateRequest;
use App\Http\Resources\Book\BookCollection;
use App\Http\Resources\Book\BookResource;
use App\Http\Response\APIResponse;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

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

    /**
     * Создать новую книгу
     *
     * @param BookCreateRequest $request
     * @param CreateBookActionContract $createBook
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function store(BookCreateRequest $request, CreateBookActionContract $createBook): JsonResponse
    {
        $dto = new BookDTO($request->toArray());

        return APIResponse::success(
            "Book successfully created.",
            new BookResource($createBook($dto)), 201
        );
    }

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
