<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\BaseInterface;
use App\Repositories\Eloquent\AuthorRepository;
use App\Repositories\AuthorInterface;
use App\Repositories\Eloquent\BookRepository;
use App\Repositories\BookInterface;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\CategoryInterface;
use App\Repositories\Eloquent\PublisherRepository;
use App\Repositories\PublisherInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseInterface::class, BaseRepository::class);
        $this->app->bind(BookInterface::class, BookRepository::class);
        $this->app->bind(AuthorInterface::class, AuthorRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(PublisherInterface::class, PublisherRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
