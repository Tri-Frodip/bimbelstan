<?php

use App\Models\Payment;
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

Route::post('register',[\App\Http\Controllers\UsersController::class, 'register'])->name('register');
Route::post('/payments', function(Request $request){
    $payment = Payment::find($request->callback_virtual_account_id)->update(['status'=>'PAID']);
    return response()->json($payment)->setStatusCode(200);
});
