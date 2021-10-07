<?php

use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('questions', QuestionsController::class)->except('show');
//Route::post('/questions/{question}/answers', 'App\Http\Controllers\AnswersController@store')->name('answers.store');
Route::resource('questions.answers', AnswersController::class)->only(['store', 'update', 'edit', 'destroy']);
Route::get('questions/{slug}', 'App\Http\Controllers\QuestionsController@show')->name('questions.show');

Route::post('/answers/{answer}/accept', 'App\Http\Controllers\AcceptAnswerController')->name('answers.accept');

