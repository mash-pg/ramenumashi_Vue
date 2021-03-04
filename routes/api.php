<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

/* 
下記はコントローラーに変更予定
*/

//初期お店一覧取得

Route::get('/user/home','Api\ShopIndexController@shopReserve');

Route::get('/user/shops/{shop}','Api\ShopIndexController@shopShow');

Route::get('/user/shops','Api\ShopIndexController@shopIndex');

Route::patch('/user/shops/{shop}', 'Api\ShopIndexController@shopUpdate');

Route::delete('/user/shops/{shop}', 'Api\ShopIndexController@shopDelete');
