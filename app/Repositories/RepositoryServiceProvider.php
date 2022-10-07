<?php
namespace App\Repositories;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            "App\Repositories\IBacchaMrittuRepository",
            "App\Repositories\BacchaMrittuRepository"
        );
        $this->app->bind(
            "App\Repositories\ISheetRepository",
            "App\Repositories\SheetRepository"
        );
        $this->app->bind(
            "App\Repositories\ICostRepository",
            "App\Repositories\CostRepository"
        );


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

