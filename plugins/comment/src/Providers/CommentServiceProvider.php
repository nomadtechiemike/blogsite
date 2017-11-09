<?php

namespace Botble\Comment\Providers;

use Botble\Comment\Models\Comment;
use Illuminate\Support\ServiceProvider;
use Botble\Comment\Repositories\Caches\CommentCacheDecorator;
use Botble\Comment\Repositories\Eloquent\CommentRepository;
use Botble\Comment\Repositories\Interfaces\CommentInterface;
use Botble\Base\Services\Cache\Cache;
use Botble\Base\Supports\Helper;

class CommentServiceProvider extends ServiceProvider
{
    /**
     * @author Sang Nguyen
     */
    public function register()
    {
        if (setting('enable_cache', false)) {
            $this->app->singleton(CommentInterface::class, function () {
                return new CommentCacheDecorator(new CommentRepository(new Comment()), new Cache($this->app['cache'], CommentRepository::class));
            });
        } else {
            $this->app->singleton(CommentInterface::class, function () {
                return new CommentRepository(new Comment());
            });
        }

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    /**
     * @author Sang Nguyen
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'comment');
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->mergeConfigFrom(__DIR__ . '/../../config/comment.php', 'comment');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'comment');

        if (app()->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

            $this->publishes([__DIR__ . '/../../resources/views' => resource_path('views/vendor/comment')], 'views');
            $this->publishes([__DIR__ . '/../../resources/lang' => resource_path('lang/vendor/comment')], 'lang');
            $this->publishes([__DIR__ . '/../../config/comment.php' => config_path('comment.php')], 'config');
        }
    }
}
