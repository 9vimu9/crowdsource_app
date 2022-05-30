<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function () {
    Route::get("/paragraph/{uuid}", [\App\Http\Controllers\API\ParagraphController::class, "show"]);


    Route::post(
        "/questions",
        [
            \App\Http\Controllers\API\SaveQuestionsController::class,
            "saveQuestions"
        ])
        ->name("questions.saveQuestions");
});


//Verb          Path                        Action  Route Name
//GET           /users                      index   users.index
//GET           /users/create               create  users.create
//POST          /users                      store   users.store
//GET           /users/{user}               show    users.show
//GET           /users/{user}/edit          edit    users.edit
//PUT|PATCH     /users/{user}               update  users.update
//DELETE        /users/{user}               destroy users.destroy

//GET retrieves resources.
//POST submits new data to the server.
//PUT updates existing data.
//DELETE removes data.
//https://stackoverflow.blog/2020/03/02/best-practices-for-rest-api-design/
