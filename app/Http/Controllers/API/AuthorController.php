<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actions\CreateAuthorActionContract;
use App\Contracts\Actions\GetAuthorsActionContract;
use App\DTO\Author\CreateAuthorDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Author\AuthorCreateRequest;
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
            'Authors list successfully received.',
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
        $dto = new CreateAuthorDTO($request->toArray());
        $resource = new AuthorResource($createAuthor($dto));

        return APIResponse::success(
            'Author successfully created.',
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
            'Author successfully received.',
            new AuthorResource($author)
        );
    }
}
