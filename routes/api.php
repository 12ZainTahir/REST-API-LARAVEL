<?php
use App\Http\Controllers\ProductControl;
use App\Http\Controllers\AuthController;
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

//Route::resource('/products',ProductControl::class);

Route::post('/register',[AuthController::class,'register']);
Route::get('/products/{id}',[ProductControl::class,'show']);

Route::get('/products',[ProductControl::class,'index']);
Route::get('/products/search/{name}',[ProductControl::class ,'search']);
Route::post('/login',[AuthController::class,'login' ]);

Route::middleware('auth:sanctum')->get('/user', function () {
    return $request->user();
});


//Protected Routes
Route::group(['middleware'=>['auth:sanctum']],function(){



    
    Route::post('/products',[ProductControl::class,'store']);
    Route::put('/products/{id}',[ProductControl::class,'update']);
    Route::delete('/products/{id}',[ProductControl::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout' ]);

});