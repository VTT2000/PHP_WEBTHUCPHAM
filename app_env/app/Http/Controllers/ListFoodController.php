<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Ramsey\Uuid\Type\Integer;

class ListFoodController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Index(Request $request)
    {
        $DB = new DB();
        $list = null;
        $NhaSanXuats = $DB::table('nhasanxuat')->get();
        $LoaiThucPhams = $DB::table('loaithucpham')->get();
        $LoHangs = $DB::table('lohang')->get();
        $KhuyenMais = $DB::table('khuyenmai')->get();

        if($request->query('sapxep') == 1)
        {
            $list = $DB::table('thucpham')->orderBy('GiaBan')->get();
        }
        else{
            $list = $DB::table('thucpham')->get();
        }

        return view('user/ListFood/Index')
            ->with('title', 'Tất cả sản phẩm')
            ->with('list', $list)
            ->with('NhaSanXuats', $NhaSanXuats)
            ->with('LoaiThucPhams', $LoaiThucPhams)
            ->with('LoHangs', $LoHangs)
            ->with('KhuyenMais', $KhuyenMais);
    }

    public function FoodTheoNCC(Request $request)
    {
        $DB = new DB();
        $id = $request->query("id");
        $list = null;
        if($request->query('sapxep') == 1)
        {
            $list = $DB::table('thucpham')->where("IdNSX", $id)->orderBy('GiaBan')->get();
        }
        else{
            $list = $DB::table('thucpham')->where("IdNSX", $id)->get();
        }
            
        $NameId = $DB::table('nhasanxuat')->where("IdNSX", $id)->first()->TenNSX; 
            
        $NhaSanXuats = $DB::table('nhasanxuat')->get();
        $LoaiThucPhams = $DB::table('loaithucpham')->get();
        $LoHangs = $DB::table('lohang')->get();
        $KhuyenMais = $DB::table('khuyenmai')->get();

        return view('user/ListFood/FoodTheoNCC')
        ->with('title', 'Sản phẩm theo nhà cung cấp')
        ->with('NameId', $NameId)
        ->with('Id', $id)
        ->with('list', $list)
        ->with('NhaSanXuats', $NhaSanXuats)
        ->with('LoaiThucPhams', $LoaiThucPhams)
        ->with('LoHangs', $LoHangs)
        ->with('KhuyenMais', $KhuyenMais); 
    }

    public function FoodTheoLoai(Request $request)
    {
        $DB = new DB();
        $id = $request->query("id");
        $list = null;
        if($request->query('sapxep') == 1)
        {
            $list = $DB::table('thucpham')->where("IdLoai", $id)->orderBy('GiaBan')->get();
        }
        else{
            $list = $DB::table('thucpham')->where("IdLoai", $id)->get();
        }
                
        $NameId = $DB::table('loaithucpham')->where("IdLoai", $id)->first()->TenLoai; 
                
        $NhaSanXuats = $DB::table('nhasanxuat')->get();
        $LoaiThucPhams = $DB::table('loaithucpham')->get();
        $LoHangs = $DB::table('lohang')->get();
        $KhuyenMais = $DB::table('khuyenmai')->get();
    
        return view('user/ListFood/FoodTheoLoai')
        ->with('title', 'Sản phẩm theo loại')
        ->with('NameId', $NameId)
        ->with('Id', $id)
        ->with('list', $list)
        ->with('NhaSanXuats', $NhaSanXuats)
        ->with('LoaiThucPhams', $LoaiThucPhams)
        ->with('LoHangs', $LoHangs)
        ->with('KhuyenMais', $KhuyenMais); 
    }
    public function FoodDuocKM(Request $request)
    {
        $DB = new DB();
        $list = null;
        $NhaSanXuats = $DB::table('nhasanxuat')->get();
        $LoaiThucPhams = $DB::table('loaithucpham')->get();
        $LoHangs = $DB::table('lohang')->get();
        $KhuyenMais = $DB::table('khuyenmai')->get();

        if($request->query('sapxep') == 1)
        {
            $list = $DB::table('thucpham')->where("IdKhuyenMai","!=",null)->orderBy('GiaBan')->get();
        }
        else{
            $list = $DB::table('thucpham')->where("IdKhuyenMai","!=",null)->get();
        }

        return view('user/ListFood/FoodDuocKM')
            ->with('title', 'Tất cả sản phẩm')
            ->with('list', $list)
            ->with('NhaSanXuats', $NhaSanXuats)
            ->with('LoaiThucPhams', $LoaiThucPhams)
            ->with('LoHangs', $LoHangs)
            ->with('KhuyenMais', $KhuyenMais);
    }    
}