<?php

namespace App\Providers;

use App\Repository\IncentiveInterface;
use App\Repository\IncentiveRepository;
use App\Repository\incomeRepository;
use App\Repository\IncomeInterface;
use App\Repository\LearnBoxInterface;
use App\Repository\LearnBoxRepository;
use App\Repository\SelfBoxInterface;
use App\Repository\SelfBoxRepository;
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
        $this->app->bind(IncentiveInterface::class,IncentiveRepository::class);
        $this->app->bind(SelfBoxInterface::class,SelfBoxRepository::class);
        $this->app->bind(LearnBoxInterface::class,LearnBoxRepository::class);
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
