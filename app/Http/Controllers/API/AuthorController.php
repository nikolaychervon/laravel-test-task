<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actions\CreateAuthorActionContract;
use App\Contracts\Actions\GetAuthorsActionContract;
use App\DTO\Author\CreateAuthorDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Author\AuthorCreateRequest;
use App\Http\Resources\Author\AuthorCollection;
use App\Http\Resources\Author\AuthorResource;
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
        return response()->json([
            'success' => true,
            'message' => 'Authors list successfully received.',
            'data' => new AuthorCollection($getAuthors()),
        ]);
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

        return response()->json([
            'success' => true,
            'message' => 'Author successfully created.',
            'author' => new AuthorResource($createAuthor($dto)),
        ]);
    }

    /**
     * Получить автора по ID
     *
     * @param Author $author
     * @return JsonResponse
     */
    public function show(Author $author): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Author successfully received.',
            'author' => new AuthorResource($author),
        ]);
    }
}
