<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:shop');
    }

    public function index()
    {
        $user = Auth::user(); // 現在認証ユーザー取得
        return view('shop.home',compact('user'));
    }
    
}
