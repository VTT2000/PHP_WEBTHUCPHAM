<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetThucPhams(Request $request, $id, $input)
    {
        $DB = new DB();
        if($id == "all")
        {
            return response()->json($DB::table('thucpham')->where('TenThucPham','like','%'.$input.'%')->get());
        }
        else
        {
            return response()->json($DB::table('thucpham')->where('IdLoai','=', $id)->where('TenThucPham','like','%'.$input.'%')->get());
        }
    }

    public function GetLoaiThucPhams(Request $request)
    {
        $DB = new DB();
        return response()->json($DB::table('loaithucpham')->get());
    }

}
