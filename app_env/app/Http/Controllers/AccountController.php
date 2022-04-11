<?php

namespace App\Http\Controllers;

use App\Models\Khachhang;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class AccountController extends Controller
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
            $idKH = $request->session()->get("KhachHangIdKH"); 
            $nameKH = $request->session()->get("KhachHangName");
            $a = null;
            $a = $DB::table('khachhang')->where('IdKH', $idKH)->first();
            return view('user/Account/Index')
                ->with("title","Thông tin tài khoản")
                ->with("Error", "")
                ->with('nameKH', $nameKH)    
                ->with('KH', $a)
                ->with('idKH', $idKH);
    }

        public function Index0(Request $request)
        {
            $idKH = $request->session()->get("KhachHangIdKH"); 
            $nameKH = $request->session()->get("KhachHangName");
            $a = new Khachhang();
            $a->IdKH = $idKH;
            $a->Name = $request->input('nameKH');
            $a->SDT = $request->input('sdtKH');
            $a->DiaChi = $request->input('diachiKH');
            $a->Email = $request->input('emailKH');
            $a->MatKhau = $request->input('pwKH');
            if (empty($a->Name))
            {
                $Error = "Họ và tên không được để trống";
                return view('user/Account/Index')
                ->with("title","Thông tin tài khoản")
                ->with("Error", $Error)
                ->with('nameKH', $nameKH)    
                ->with('KH', $a)
                ->with('idKH', $idKH);
            }
            if (empty($a->Email))
            {
                $Error = "Email không được để trống";
                return view('user/Account/Index')
                ->with("title","Thông tin tài khoản")
                ->with("Error", $Error)
                ->with('nameKH', $nameKH)    
                ->with('KH', $a)
                ->with('idKH', $idKH);
            }
            if(empty($a->MatKhau))
            {
                $Error = "Password không được để trống";
                return view('user/Account/Index')
                ->with("title","Thông tin tài khoản")
                ->with("Error", $Error)
                ->with('nameKH', $nameKH)    
                ->with('KH', $a)
                ->with('idKH', $idKH);
            }
            if($request->input('pwKH') != $request->input('repwKH'))
            {
                $Error = "Password và xác nhận lại password không đúng";
                return view('user/Account/Index')
                ->with("title","Thông tin tài khoản")
                ->with("Error", $Error)
                ->with('nameKH', $nameKH)    
                ->with('KH', $a)
                ->with('idKH', $idKH);
            }
            $DB = new DB();//update
            $a->exists = true;
            $a->save();// insnert // them exist = true la update

            $request->session()->put("KhachHangName",$a->Name);

            $Error = "Cập nhật thông tin thành công";
            
                return view('user/Account/Index')
                ->with("title","Thông tin tài khoản")
                ->with("Error", $Error)
                ->with('nameKH', $nameKH)    
                ->with('KH', $a)
                ->with('idKH', $idKH);
        }
     
        public function Invoice(Request $request)
        {
            $idKH = $request->session()->get("KhachHangIdKH"); 
            $nameKH = $request->session()->get("KhachHangName");

            $DB = new DB();
            $list = $DB::table('hoadonkhachhang')->where('IdKH', $idKH)->orderByDesc('IdInvoice')->get();
            return view('user/Account/Invoice')
            ->with("title","Hóa đơn khách hàng")
            ->with('nameKH', $nameKH)    
                ->with('list', $list)
                ->with('idKH', $idKH);
        }

        public function DetailInvoice(Request $request)
        {
            // id là id hóa đơn
            $id = $request->query('id');
            $idKH = $request->session()->get("KhachHangIdKH"); 
            $nameKH = $request->session()->get("KhachHangName");
            $DB = new DB();
            $list = $DB::table('chitiethoadonkhachhang')->where('IdInvoice', $id)->get();
            $LoHangs = $DB::table('lohang')->get();
            $ThucPhams = $DB::table('thucpham')->get();

            return view('user/Account/DetailInvoice')
            ->with("title","Chi tiết hóa đơn khách hàng")
            ->with('nameKH', $nameKH)    
                ->with('list', $list)
                ->with('LoHangs', $LoHangs)
                ->with('ThucPhams', $ThucPhams)
                ->with('idKH', $idKH);
        }

        public function FollowedFood(Request $request)
        {
            $idKH = $request->session()->get("KhachHangIdKH"); 
            $nameKH = $request->session()->get("KhachHangName");
            $DB = new DB();

            $list = $DB::table('theodoithucpham')->where('IdKH', $idKH)->get();
            $ThucPhams = $DB::table('thucpham')->get();

            return view('user/Account/FollowedFood')
            ->with("title","Thực phẩm theo dõi")
            ->with('nameKH', $nameKH)    
                ->with('list', $list)
                ->with('ThucPhams', $ThucPhams)
                ->with('idKH', $idKH);
        }
        
        public function DeleteFollowedFood(Request $request)
        {
            // id là id theodoi
            $idKH = $request->session()->get("KhachHangIdKH"); 
            $nameKH = $request->session()->get("KhachHangName");
            $DB = new DB();
            $id = $request->query('id');
            $delete = $DB::table('theodoithucpham')->where('IdTheoDoi', $id)->first();
            if(!empty($delete))
            {
                $DB::table('theodoithucpham')->where('IdTheoDoi', $id)->delete();
            }
            return redirect('Account/FollowedFood');
        }
        
        
}