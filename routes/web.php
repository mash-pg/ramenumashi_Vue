<?php
Route::get('/', function () {
    return view('user/welcome');
});

// ユーザー
Route::namespace('User')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'welcome' => true,
        'confirm'  => false,
        'reset'    => false
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {
        // Route::get('/', 'HomeController@welcome');
        // Homeページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
    });
});

// 管理者
Route::namespace('Shop')->prefix('shop')->name('shop.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'confirm'  => false,
        'reset'    => false
    ]);
    // ログイン認証後
    Route::middleware('auth:shop')->group(function () {
        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });

});
