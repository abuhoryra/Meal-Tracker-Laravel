<?php
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/deactive', 'Account@get_deactived_users');
Route::get('/active/{id}', 'Account@active_users');
Route::get('/allUsers', 'Account@get_all_active_users');
Route::get('/changeSuper/{id}/{field}', 'Account@change_super');
Route::get('/meal', 'Account@meal');
Route::post('/saveMeal', 'Account@save_meal');
Route::get('/myMeal', 'Account@my_current_month_meal');
Route::get('/publicMeal/{id}', 'Account@get_public_meal');
Route::post('/editMeal', 'Account@edit_meal');
