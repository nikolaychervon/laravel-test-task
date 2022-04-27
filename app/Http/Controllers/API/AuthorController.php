<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actions\CreateAuthorActionContract;
use App\Contracts\Actions\GetAuthorsActionContract;
use App\DTO\Author\CreateAuthorDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Author\AuthorCreateRequest;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class AuthorController extends Controller
{
    /**
     * Получить список авторов
     *
     * @param GetAuthorsActionContract $getAuthors
     * @return AnonymousResourceCollection
     */
    public function index(GetAuthorsActionContract $getAuthors): AnonymousResourceCollection
    {
        return AuthorResource::collection($getAuthors());
    }

    /**
     * Создать нового автора
     *
     * @param AuthorCreateRequest $request
     * @param CreateAuthorActionContract $createAuthor
     * @return AuthorResource
     * @throws UnknownProperties
     */
    public function store(AuthorCreateRequest $request, CreateAuthorActionContract $createAuthor): AuthorResource
    {
        $dto = new CreateAuthorDTO($request->toArray());
        return new AuthorResource($createAuthor($dto));
    }
}
