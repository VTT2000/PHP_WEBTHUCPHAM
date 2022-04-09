<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $DB = new DB();

        $loHangs = $DB::table('lohang')->get();
        $khuyenMais = $DB::table('khuyenmai')->get();
        $thucPhams = $DB::table('thucpham')->get()->take(8);
        
        if(!is_null(Cookie::get('KhachHangIdKH')) && !is_null(Cookie::get('KhachHangName')))
        {
            $request->session()->put('KhachHangIdKH', Cookie::get('KhachHangIdKH'));
            $request->session()->put('KhachHangName', Cookie::get('KhachHangName'));             
        }
        
        return view('user/home/index')
            ->with("title","Trang chủ")
            ->with("loHangs", $loHangs)
            ->with("khuyenMais", $khuyenMais)
            ->with("thucPhams", $thucPhams);
    }
    public function LogOut(Request $request)
        {
            if (!empty(Cookie::get("KhachHangIdKH")) && !empty(Cookie::get("KhachHangName")))
            {
                Cookie::delete("KhachHangIdKH");
                Cookie::delete("KhachHangName");
            }

            $request->session()->put("KhachHangName", "");
            $request->session()->put("KhachHangIdKH", "");
            
            return redirect("Home/Index");
        }
}
