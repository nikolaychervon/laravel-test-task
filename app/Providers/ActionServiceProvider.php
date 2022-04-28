<?php

namespace App\Providers;

use App\Actions\Author\CreateAuthorAction;
use App\Actions\Author\GetAuthorsAction;
use App\Actions\Author\RemoveAuthorAction;
use App\Actions\Author\UpdateAuthorAction;
use App\Actions\Book\CreateBookAction;
use App\Actions\Book\GetBooksAction;
use App\Actions\Book\RemoveBookAction;
use App\Actions\Book\UpdateBookAction;
use App\Contracts\Actions\Author\CreateAuthorActionContract;
use App\Contracts\Actions\Author\GetAuthorsActionContract;
use App\Contracts\Actions\Author\RemoveAuthorActionContract;
use App\Contracts\Actions\Author\UpdateAuthorActionContract;
use App\Contracts\Actions\Book\CreateBookActionContract;
use App\Contracts\Actions\Book\GetBooksActionContract;
use App\Contracts\Actions\Book\RemoveBookActionContract;
use App\Contracts\Actions\Book\UpdateBookActionContract;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->registerAuthorActions();
        $this->registerBookActions();
    }

    /**
     * @return void
     */
    private function registerAuthorActions(): void
    {
        $this->app->singleton(GetAuthorsActionContract::class, GetAuthorsAction::class);
        $this->app->singleton(CreateAuthorActionContract::class, CreateAuthorAction::class);
        $this->app->singleton(UpdateAuthorActionContract::class, UpdateAuthorAction::class);
        $this->app->singleton(RemoveAuthorActionContract::class, RemoveAuthorAction::class);
    }

    /**
     * @return void
     */
    private function registerBookActions(): void
    {
        $this->app->singleton(GetBooksActionContract::class, GetBooksAction::class);
        $this->app->singleton(CreateBookActionContract::class, CreateBookAction::class);
        $this->app->singleton(UpdateBookActionContract::class, UpdateBookAction::class);
        $this->app->singleton(RemoveBookActionContract::class, RemoveBookAction::class);
    }
}
