<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewView;

use App\Http\Validators\HelloValidator;
use Illuminate\Support\Facades\Validator;

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
        // Add view composer
        View::composer(
            'template.trapped', function (ViewView $view) {
                $view->with('composerMessage', 'composer message!');
            }
        );

        View::composer('template.composer-class', 'App\Http\Composers\HelloComposer');

        // Add validation rule
        $validator = $this->app['validator'];
        $validator->resolver(function($translator, $data, $rules, $messages) {
            return new HelloValidator($translator, $data, $rules, $messages);
        });

        Validator::extend('nabe', function($attribute, $value, $parameters, $validator) {
            return $value % 3 == 0 or str_contains($value, 3);
        }, '3の倍数か3を含む数値である必要があります。');
    }
}
