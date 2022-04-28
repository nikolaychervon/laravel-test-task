<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actions\Author\CreateAuthorActionContract;
use App\Contracts\Actions\Author\GetAuthorsActionContract;
use App\Contracts\Actions\Author\RemoveAuthorActionContract;
use App\Contracts\Actions\Author\UpdateAuthorActionContract;
use App\DTO\AuthorDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Author\AuthorCreateRequest;
use App\Http\Requests\Author\AuthorUpdateRequest;
use App\Http\Resources\Author\AuthorCollection;
use App\Http\Resources\Author\AuthorResource;
use App\Http\Response\APIResponse;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class AuthorController extends Controller
{
    /**
     * Получить список авторов
     *
     * @param GetAuthorsActionContract $getAuthors
     * @return JsonResponse
     */
    public function index(GetAuthorsActionContract $getAuthors): JsonResponse
    {
        return APIResponse::success(
            __('api.authors.index'),
            new AuthorCollection($getAuthors())
        );
    }

    /**
     * Создать нового автора
     *
     * @param AuthorCreateRequest $request
     * @param CreateAuthorActionContract $createAuthor
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function store(AuthorCreateRequest $request, CreateAuthorActionContract $createAuthor): JsonResponse
    {
        $dto = new AuthorDTO($request->validated());
        $resource = new AuthorResource($createAuthor($dto));

        return APIResponse::success(
            __('api.authors.store'),
            $resource, 201
        );
    }

    /**
     * Получить автора по ID
     *
     * @param Author $author
     * @return JsonResponse
     */
    public function show(Author $author): JsonResponse
    {
        return APIResponse::success(
            __('api.authors.show'),
            new AuthorResource($author)
        );
    }

    /**
     * Обновить автора по ID
     *
     * @param AuthorUpdateRequest $request
     * @param Author $author
     * @param UpdateAuthorActionContract $updateAuthor
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function update(AuthorUpdateRequest $request, Author $author, UpdateAuthorActionContract $updateAuthor): JsonResponse
    {
        $dto = new AuthorDTO($request->validated());
        $resource = new AuthorResource($updateAuthor($author, $dto));
        return APIResponse::success(__('api.authors.update'), $resource);
    }

    /**
     * Удалить автора по ID
     *
     * @param Author $author
     * @param RemoveAuthorActionContract $removeAuthor
     * @return JsonResponse
     */
    public function destroy(Author $author, RemoveAuthorActionContract $removeAuthor): JsonResponse
    {
        $removeAuthor($author);
        return APIResponse::success(__('api.authors.destroy'));
    }
}
