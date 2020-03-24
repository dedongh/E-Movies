<?php

namespace App\Providers;

use App\Contracts\AttributeContract;
use App\Contracts\AttributeValueContract;
use App\Contracts\GenreContract;
use App\Repositories\AttributeRepo;
use App\Repositories\AttributeValueRepo;
use App\Repositories\GenreRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        GenreContract::class         =>          GenreRepo::class,
        AttributeContract::class     =>          AttributeRepo::class,
        AttributeValueContract::class     =>          AttributeValueRepo::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
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
