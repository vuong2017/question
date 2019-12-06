<?php

use Illuminate\Http\Request;


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

Route::middleware(['auth:api'])->group(function () {
    // Category question
    Route::apiResource('category-question', 'CategoryQuestionController');
    // Question
    Route::apiResource('question', 'QuestionController');
    Route::apiResource('question-choice', 'QuestionChoicesController');
    Route::apiResource('user-question-answer', 'UserQuestionAnswerController');
    Route::apiResource('question-daily', 'QuestionDailyController');
});

Route::prefix('auth')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
});

