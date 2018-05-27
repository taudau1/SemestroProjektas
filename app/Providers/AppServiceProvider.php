<?php

namespace App\Providers;

use Collective\Html\FormFacade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        FormFacade::macro('rawLabel', function($name, $value = null, $options = array()) {
            $label = FormFacade::label($name, '%s', $options);

            return sprintf($label, $value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
