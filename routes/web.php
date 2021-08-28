<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\dashboard\Bank\BankController;
use App\Http\Controllers\dashboard\Bank\WithdrowBankController;
use App\Http\Controllers\dashboard\Expense\ExpenseController;
use App\Http\Controllers\dashboard\Expense\SpendController;
use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\Incentive\incentiveController;
use App\Http\Controllers\dashboard\Income\IncomeController;
use App\Http\Controllers\dashboard\LearBox\LearnBoxController;
use App\Http\Controllers\dashboard\NecessaryBox\NecessaryBoxController;
use App\Http\Controllers\dashboard\SelfBox\SelfBoxController;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
});





Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...


    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

        Route::get('/',[HomeController::class,'index']);


        Route::resource('/incomes',IncomeController::class);
        Route::resource('/incentives',incentiveController::class);
        Route::resource('/selfboxes',SelfBoxController::class);
        Route::resource('/learnboxes',LearnBoxController::class);
        Route::resource('/necessariesboxes',NecessaryBoxController::class);
        Route::resource('/expenses',ExpenseController::class);
        Route::resource('/banks',BankController::class);
        Route::resource('/spends',SpendController::class);
        Route::resource('/withdraw-bank',WithdrowBankController::class);
    });
});

Route::get('/{page}', [AdminController::class,'index'])->middleware('auth');
