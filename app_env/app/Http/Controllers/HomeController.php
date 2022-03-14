<?php

namespace App\Http\Controllers;

use App\Models\Lohang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $thucPhams = $DB::table('thucpham')->get();



        return view('user/home/index')
            ->with("KhachHangIdKH", $request->session()->get('KhachHangIdKH'))
            ->with("GioHangSoLuong", $request->session()->get('GioHang'))
            ->with("title","Trang chu")
            ->with("loHangs", $loHangs)
            ->with("khuyenMais", $khuyenMais)
            ->with("thucPhams", $thucPhams);
    }
}
