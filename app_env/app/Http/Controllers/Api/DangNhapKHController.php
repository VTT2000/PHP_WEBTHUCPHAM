<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class DangNhapKHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $DB = new DB();
        //$request->get('')
        $kh = $DB::table('khachhang')->where('Email', $request->get('email'))->first();
        $phanHoi = -1;
        if ($kh == null)
        {
            $phanHoi = 0;//"Tài khoản không tồn tại"
        }
        else
        {
            if (strcmp($kh->MatKhau, $request->get('pass')) == 0)
            {
                //Session::put('KhachHangName', $kh->Name);
                //Session::put('KhachHangIdKH', $kh->IdKH);
                $request->session()->put('KhachHangName', $kh->Name);
                $request->session()->put('KhachHangIdKH', $kh->IdKH);
                //session not working api controller
                // vao kernel.php pass cai ben duoi
                /*
                    'api' => [
                        \App\Http\Middleware\EncryptCookies::class,
                        \Illuminate\Session\Middleware\StartSession::class,
                    ],
                */
                if ($request->get('remember') == false)
                {
                    // Session
                    //Session::put("KhachHangName", $kh->Name);
                    //Session::put("KhachHangIdKH", $kh->IdKH);
                    // Read Session
                    //Session::get("KhachHang");
                }
                else
                {
                    // Cookies
                    $minutes = 60*2; // 2h
                    Cookie::queue('KhachHangIdKH', $kh->IdKH, $minutes);
                    Cookie::queue('KhachHangName', $kh->Name, $minutes);
                    // Read Cookies
                    // Cookie::get('KhachHangIdKH');
                }
                $phanHoi = 1;
            }
            else
            {
                $phanHoi = 2;//"Sai mật khẩu"
            }
        }
        return response()->json($phanHoi);
    }
}
