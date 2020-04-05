<?php

namespace App\Providers;

use App\Model\Genre;
use App\Model\Movies;
use App\Model\Reviews;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer(['frontend.header','frontend.catalog'], function ($view) {
            $view->with('genres', Genre::orderByRaw('name ASC')->get());
        });

        View::composer(['frontend.expected_premeire','home'], function ($view) {
            $view->with('premieres', Movies::where('premiere',1)
                ->limit(6)
                ->get());
        });

        View::composer(['dashboard','backend.admin_home'], function ($view) {
            $view->with('reviews', Reviews::where('status',0)
                ->where('seen',0)
                ->orderByRaw('id DESC')
                ->get());
        });
    }
}
