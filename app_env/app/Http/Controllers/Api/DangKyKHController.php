<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Khachhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class DangKyKHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Register(Request $request)
    {
        $DB = new DB();
        $findKH = $DB::table('khachhang')->where('Email', $request->get('Email'))->first();
        if(empty($findKH))
        {
            if(strlen($request->get('Password')) >= 6)                
            {
                $findKH = new Khachhang();
                $findKH->Name = $request->get('Name');
                $findKH->Email = $request->get('Email');
                $findKH->MatKhau = $request->get('Password');
                $findKH->save();
                return response()->json("OK");
            }
            else
            {
                return response()->json("Password tối thiểu 6 kí tự");
            }
                
        }
        else
        {
            return response()->json("Email đã được đăng ký, bạn hãy nhập Email khác");
        }
    }
}
