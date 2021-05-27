<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::get('/{any}', 'App\Http\Controllers\PagesController@index')->where('any', '.*');
// Route::get('/{any}', 'App\Http\Controllers\UserController@create')->where('any', '.*');
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('logout',[PassportAuthController::class, 'logoutApi']);
Route::get('getProfile/{user_id}', [PagesController::class, 'getUserProfile']);
Route::post('addCompany', [PagesController::class, 'addCompany']);
Route::get('getAllCompanies', [PagesController::class, 'getAllCompanies']);
Route::delete('deleteCompany/{id}', [PagesController::class, 'deleteCompany']);
Route::get('editCompany/{id}', [PagesController::class, 'editCompany']);
Route::post('updateCompany/{id}', [PagesController::class, 'updateCompany']);

Route::group(['prefix' => 'pages'], function () {
    
    
    Route::get('edit/{id}', 'PagesController@edit');
    Route::post('update/{id}', 'PagesController@update');
    Route::delete('delete/{id}', 'PagesController@delete');
});