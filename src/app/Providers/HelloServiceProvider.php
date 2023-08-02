<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewView;

class HelloServiceProvider extends ServiceProvider
{
    // /**
    //  * Register services.
    //  */
    // public function register(): void
    // {
    //     //
    // }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(
            'template.trapped', function (ViewView $view) {
                $view->with('composerMessage', 'composer message!');
            }
        );

        View::composer('template.composer-class', 'App\Http\Composers\HelloComposer');
    }
}
