<?php

namespace App\Providers;

use App\Interfaces\AudioRepositoryInterface;
use App\Interfaces\ImageRepositoryInterface;
use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\StoryRepositoryInterface;
use App\Interfaces\TouchableRepositoryInterface;
use App\Models\Page;
use App\Repositories\AudioRepository;
use App\Repositories\ImageRepository;
use App\Repositories\PageRepository;
use App\Repositories\StoryRepository;
use App\Repositories\TouchableRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StoryRepositoryInterface::class, StoryRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
        $this->app->bind(TouchableRepositoryInterface::class, TouchableRepository::class);
        $this->app->bind(AudioRepositoryInterface::class, AudioRepository::class);
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
