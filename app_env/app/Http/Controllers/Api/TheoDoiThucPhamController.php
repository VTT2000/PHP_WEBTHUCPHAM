<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Khachhang;
use App\Models\Theodoithucpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class TheoDoiThucPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Get(Request $request, $id)
    {
        
        if(empty($request->session()->get("KhachHangIdKH")))
        {
            return "Bạn hãy đăng nhập để theo dõi thực phẩm";
        }
        $DB = new DB();
        $a = $DB::table('khachhang')->where('IdKH', $request->session()->get("KhachHangIdKH"))->first();
        if (!empty($a))
        {
            $x = $DB::table('theodoithucpham')->where('IdKH', $a->IdKH)->where('IdFood', $id)->first();
            if (empty($x))
            {
                $x = new TheoDoiThucPham();
                $x->IdFood = $id;
                $x->IdKH = $a->IdKH;
                $x->save();
                return response()->json(1);
            }
            else
            {
                $delete = TheoDoiThucPham::find($x->IdTheoDoi);
                $delete->delete();
                return response()->json(0);
            }
        }
        else
        {
            return response()->json("Thực phẩm không tồn tại");
        }
    }
}