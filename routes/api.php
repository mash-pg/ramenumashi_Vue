<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Shop;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* 
下記はコントローラーに変更予定
*/

//初期お店一覧取得
Route::get('/user/shops',function (Request $request) {
	$shops = Shop::all();
	return response()->json(['shops' => $shops]);
});

Route::get('/user/shops/{shop}', function(Shop $shop){

	return response()->json(['shop' => $shop]);

});

Route::patch('/user/shops/{shop}', function(Shop $shop,Request $request){
	Log::info($request->shop);
	$shop->update($request->shop);

	return response()->json(['shop' => $shop]);

});

Route::delete('/user/shops/{shop}', function(Shop $shop){

	$shop->delete();

	return response()->json(['message' => 'delete successfully']);

});