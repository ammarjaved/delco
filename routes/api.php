<?php

use App\Http\Controllers\api\siteDataCollections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\DBController;
use App\Http\Controllers\api\uploadImagesContoller;


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

Route::resource('api-site-data-collection',siteDataCollections::class);

Route::post('/login',[LoginController::class,'login']);

Route::post('/database/GetResults',[DBController::class,'GetResults']);

Route::post("/database/insert",[DBController::class,'insert']);
Route::post("/database/update",[DBController::class,'update']);

Route::post('/upload-site-images/{id}',[uploadImagesContoller::class,"uploadImages"]);
Route::post('/upload-toolbox-images/{id}/{type}',[uploadImagesContoller::class,"uploadImagesToolBox"]);

Route::post('/upload-precbl-images',[uploadImagesContoller::class,"preCblImage"]);
Route::post('/upload-shutdown-images',[uploadImagesContoller::class,"shutdownImage"]);
Route::post('/upload-sat-images',[uploadImagesContoller::class,"satImage"]);
Route::post('/update-shutdown-images/{id}',[uploadImagesContoller::class,"updateShutdownImage"]);
Route::post('/update-sat-images/{id}',[uploadImagesContoller::class,"updateSatImage"]);



Route::post('/',[uploadImagesContoller::class,""]);




