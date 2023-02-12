<?php

// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']] , function(){
    Route::get('loginPage',[AuthController::class,'loginPage'])->name('loginPage');
    Route::post('login',[AuthController::class,'login'])->name('login');
});

 

    Route::get('/admin', function () {
        return redirect(route('loginPage'));
    });


 
Route::group(
    [    'prefix' => 'admin',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){

        Route::get('/', function () {
            return app()->getLocale();
        });

        Route::get('/',function(){
            return view('pages.home');
        })->name('dashboard');

        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('', [UserController::class, 'index'])->name('index');
            Route::post('store', [UserController::class, 'store'])->name('store');
            Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
            Route::put('update/{user}', [UserController::class, 'update'])->name('update');
            Route::get('delete/{user}', [UserController::class, 'delete'])->name('delete');
        });


        
    });



/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/



