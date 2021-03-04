<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Shop;
use App\Models\Reserve;
use DB;

class ShopIndexController extends Controller
{
    public function authInfo()
    {
        $user_id = Auth::user()->user_id;
        return $user_id;
    }

    public function shopReserve(Shop $shop,Reserve $reserve){
        $shofindex = new ShopIndexController();
        //ログイン情報(user_id)
        $auth = $shofindex->authInfo();
        //予約情報
        $reserve = Reserve::all();
        //お店情報
        //$shops = Shop::all();

        $shops = Shop::
                //カラムデータ処理
                // ->select('reserve_tb.reserve_id','shop_tb.img','shop_tb.shop_name','shop_tb.shop_id','reserve_tb.dlflag')
                where('shop_tb.dlflag',1)
                ->join('reserve_tb','reserve_tb.shop_id','=','shop_tb.shop_id')
                ->orderBy('reserve_tb.reserve_count', 'desc')
                ->offset(0)
                ->limit(3)
                ->get();

        Log::info("TANAKA : ".$auth);
        Log::info("SQL : ".$shops);
        return response()->json(['shops' => $shops]);
    }

    public function shopIndex(Request $request){
        $shofindex = new ShopIndexController();
        $auth = $shofindex->authInfo();
        Log::info("test : ".$auth);
        $name = $request->input('name');

        if(!($name === "undefined") && !(empty($name))){
            Log::info('message:1234');
            $shops = Shop::where('shop_name','like',"%$name%")->get();
        }else{
            $shops = Shop::all();
        }
        return response()->json(['shops' => $shops,'auth' => $auth]);
    }

    public function shopUpdate(Shop $shop,Request $request){
        $shofindex = new ShopIndexController();
        $auth = $shofindex->authInfo();
        Log::info("testasdfasdf : ".$auth);
        $shop->update($request->shop);
        return response()->json(['shop' => $shop]);
    }
    
    public function shopShow(Shop $shop){
        $shofindex = new ShopIndexController();
        $auth = $shofindex->authInfo();
        Log::info("testasdfasdf : ".$auth);
        return response()->json(['shop' => $shop]);
    }
    

    public function shopDelete(Shop $shop){
        $shofindex = new ShopIndexController();
        $auth = $shofindex->authInfo();
        Log::info("testasdfasdf : ".$auth);
        $shop->delete();

        return response()->json(['message' => 'delete successfully']);
    }

}
