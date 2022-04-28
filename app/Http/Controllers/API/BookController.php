<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actions\Book\CreateBookActionContract;
use App\Contracts\Actions\Book\GetBooksActionContract;
use App\Contracts\Actions\Book\RemoveBookActionContract;
use App\Contracts\Actions\Book\UpdateBookActionContract;
use App\DTO\BookDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookCreateRequest;
use App\Http\Requests\Book\BookUpdateRequest;
use App\Http\Resources\Book\BookCollection;
use App\Http\Resources\Book\BookResource;
use App\Http\Response\APIResponse;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class BookController extends Controller
{
    /**
     * Получить список книг
     *
     * @param Request $request
     * @param GetBooksActionContract $getBooks
     * @return JsonResponse
     */
    public function index(Request $request, GetBooksActionContract $getBooks): JsonResponse
    {
        $resource = new BookCollection($getBooks(
            $request->get('search')
        ));

        return APIResponse::success(__('api.books.index'), $resource);
    }

    /**
     * Получить список книг для автора
     *
     * @param Request $request
     * @param Author $author
     * @param GetBooksActionContract $getBooks
     * @return JsonResponse
     */
    public function indexByAuthor(Request $request, Author $author, GetBooksActionContract $getBooks): JsonResponse
    {
        $resource = new BookCollection($getBooks(
            $request->get('search'),
            $author
        ));

        return APIResponse::success(
            __('api.books.index_by_author'),
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
        $dto = new BookDTO($request->validated());

        return APIResponse::success(
            __('api.books.store'),
            new BookResource($createBook($dto)), 201
        );
    }

    /**
     * Получить книгу
     *
     * @param Book $book
     * @return JsonResponse
     */
    public function show(Book $book): JsonResponse
    {
        return APIResponse::success(__('api.books.show'), new BookResource($book));
    }

    /**
     * Получить книгу для автора
     *
     * @param Author $author
     * @param Book $book
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function showByAuthor(Author $author, Book $book): JsonResponse
    {
        $this->authorize('view', [$book, $author]);

        return APIResponse::success(
            __('api.books.show_by_author'),
            (new BookResource($book))->except(['author'])
        );
    }

    /**
     * Обновить книгу
     *
     * @param BookUpdateRequest $request
     * @param Book $book
     * @param UpdateBookActionContract $updateBook
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function update(BookUpdateRequest $request, Book $book, UpdateBookActionContract $updateBook): JsonResponse
    {
        $dto = new BookDTO($request->validated());
        $resource = new BookResource($updateBook($book, $dto));
        return APIResponse::success(__('api.books.update'), $resource);
    }

    /**
     * Удалить книгу
     *
     * @param Book $book
     * @param RemoveBookActionContract $removeBook
     * @return JsonResponse
     */
    public function destroy(Book $book, RemoveBookActionContract $removeBook): JsonResponse
    {
        $removeBook($book);
        return APIResponse::success(__('api.books.destroy'));
    }
}
