<?php

namespace App\Providers;

use App\Repository\incomeRepository;
use App\Repository\IncomeInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IncomeInterface::class,IncomeRepository::class);


    }//end of register

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
