<?php

namespace App\Providers;

use App\Actions\Author\CreateAuthorAction;
use App\Actions\Author\GetAuthorsAction;
use App\Contracts\Actions\CreateAuthorActionContract;
use App\Contracts\Actions\GetAuthorsActionContract;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(GetAuthorsActionContract::class, GetAuthorsAction::class);
        $this->app->singleton(CreateAuthorActionContract::class, CreateAuthorAction::class);
    }
}
