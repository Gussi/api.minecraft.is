<?php

use App\Http\Controllers\ServerController;
use App\Http\Controllers\ServerStatusController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

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

Route::apiResources([
    'server'        => ServerController::class,
    'server.status' => ServerStatusController::class,
]);

Route::prefix('docs')->group(function () {
    Route::get('/', fn () => view('openapi', ['unpkg' => 'https://unpkg.com/swagger-ui-dist@3']));
    Route::get('/swagger.yaml', fn () => Response::file(base_path('resources/docs/openapi.yaml')));
});
