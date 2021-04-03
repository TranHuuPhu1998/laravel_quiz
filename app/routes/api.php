<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
   
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::delete('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
// route question 

    // Route::post('reset-password', 'ResetPasswordController@sendMail');
   
    Route::get('/questions' ,[QuestionController::class , 'index']);
    Route::get('/ques-ans' ,[QuestionController::class , 'storeQuestionsAnswer']);
    Route::get('/questions/{id}', [QuestionController::class , 'edit']);
    Route::post('/questions/create' ,[QuestionController::class , 'store']);
    Route::delete('/questions/delete/{id}' ,[QuestionController::class , 'delete']);
    Route::put('/questions/update/{id}' ,[QuestionController::class , 'update']);

// route taks
    Route::get('tasks' , [TaskController::class , 'index']);
// route users
    Route::get('/users' , [AuthController::class,'getUsers']);
    Route::delete('/users/delete/{id}' , [AuthController::class , 'deleteUser']);
    Route::post('/users/create' , [AuthController::class , 'createUser']);
    Route::put('/users/update/{id}' , [AuthController::class , 'updateUser']);

    Route::post('forgot-password', 'ResetPasswordController@forgot');
    Route::post('reset-password', 'ResetPasswordController@reset');
