<?php

namespace App\Providers;

use App\Actions\Author\CreateAuthorAction;
use App\Actions\Author\GetAuthorsAction;
use App\Actions\Author\RemoveAuthorAction;
use App\Actions\Author\UpdateAuthorAction;
use App\Contracts\Actions\CreateAuthorActionContract;
use App\Contracts\Actions\GetAuthorsActionContract;
use App\Contracts\Actions\RemoveAuthorActionContract;
use App\Contracts\Actions\UpdateAuthorActionContract;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    public array $singletons = [
        GetAuthorsActionContract::class => GetAuthorsAction::class,
        CreateAuthorActionContract::class => CreateAuthorAction::class,
        UpdateAuthorActionContract::class => UpdateAuthorAction::class,
        RemoveAuthorActionContract::class => RemoveAuthorAction::class,
    ];
}
