<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class FoodController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->query("id");
        $DB = new DB();
        $a = null;
        $a = $DB::table('thucpham')->where("IdThucPham", $id)->first();
        if($a == null)
        {
            return new NotFound();
        }
        $listDaXem = array();
        if (empty($request->session()->get("listSPdaXem")))
        {
            array_push($listDaXem, $a->IdThucPham);
            $request->session()->put("listSPdaXem", $listDaXem);
        }
        else
        {
            $listDaXem = $request->session()->get("listSPdaXem");
            if(!in_array($a->IdThucPham, $listDaXem))
            {
                array_push($listDaXem, $a->IdThucPham);
                $request->session()->put("listSPdaXem", $listDaXem);
            }
        }
        if (empty($request->session()->get("KhachHangIdKH")))
        {
            $TheoDoi = false;
        }
        else
        {
            $TheoDoi = $DB::table("theodoithucpham")->where("IdFood", $id)->where("IdKH", $request->session()->get("KhachHangIdKH"))->exists();
        }
        
        $LoaiThucPhams = $DB::table('loaithucpham')->get();
        $KhuyenMais = $DB::table('khuyenmai')->get();
        $NhaSanXuats = $DB::table('nhasanxuat')->get();
        $ThucPhams = $DB::table('thucpham')->get();
        $LoHangs = $DB::table('lohang')->get();
        
        return view('user/Food/Index')
            ->with("title","Sản phẩm")
            ->with("thucPham", $a)
            ->with("TheoDoi", $TheoDoi)
            ->with("LoaiThucPhams", $LoaiThucPhams)
            ->with("KhuyenMais", $KhuyenMais)
            ->with("NhaSanXuats", $NhaSanXuats)
            ->with("ThucPhams", $ThucPhams)
            ->with("LoHangs", $LoHangs);
    }
}

            
            