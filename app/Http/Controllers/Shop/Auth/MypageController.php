<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Auth;

class TopController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:shop');
    }

    protected function guard()
    {
        return Auth::guard('shop');
    }
    public function showTopForm()
    {
        return view('shop.auth.top');
    }
    
    public function mypage(Request $request)
    {
        return redirect(route('mypage.login'));
    }
}
