<?php

namespace App\Http\Controllers;

use App\Models\Hoadonkhachhang;
use App\Models\Chitiethoadonkhachhang;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Cast\Array_;

class ThanhToanController extends Controller
{
    //
    public function LayGioHang(Request $request)
    {
        $listGioHang = array();
        if (empty($request->session()->get('GioHang')))
        {
            $request->session()->put("GioHang", $listGioHang);
        }
        else
        {
            $listGioHang = $request->session()->get("GioHang");
        }
        return $listGioHang;
    }

    public function Index(Request $request)
    {
        $DB = new DB();
        $idkh = $request->session()->get("KhachHangIdKH");
        $listGH = $this->LayGioHang($request);
        if (empty($idkh)|| empty($listGH))
        {
            return redirect('Home/index');
        }
        $KhachHang = $DB::table('khachhang')->where('IdKH',$idkh)->first();
        $Tongsoluong = $this->TongSoLuong($request);
        $Tongtien = $this->TongTien($request);

        return view('user/ThanhToan/Index')
            ->with("title","Thanh toán")
            ->with('listGH', $listGH)
            ->with('KhachHang', $KhachHang)
            ->with('Tongsoluong', $Tongsoluong)
            ->with('Tongtien', $Tongtien);
    }
        
    public function ThanhToanPaypal(Request $request)
    {
        // dateDelivery
        // diaChiNhanHang
        // sb-hr8yk8650165@personal.example.com
        // p679$K6^
        // tai khoan va password thu nghiem paypal nguyen van a
        $namekh = $request->session()->get("KhachHangName");
        $idkh = $request->session()->get("KhachHangIdKH");
        $listGH = $this->LayGioHang($request);
        // tao hoa don khach hang
        $hoaDonKhachHang = new HoaDonKhachHang();
        $hoaDonKhachHang->IdKH = $idkh;
        $hoaDonKhachHang->NgayDat = date("Y-m-d H:i:s");
        $hoaDonKhachHang->NgayGiao = $request->query('dateDelivery');
        $hoaDonKhachHang->TongTien = $this->TongTien($request);
        $hoaDonKhachHang->PhuongThucThanhToan = "Paypal";
        $hoaDonKhachHang->TrangThai = "Chưa giao";
        $hoaDonKhachHang->DiaChiNhanHang = $request->query('diaChiNhanHang');
        $hoaDonKhachHang->save();
        // tao chi tiet hoa don khach hang
        for ($i = 0; $i < count($listGH); $i++)
        {
            $DB = new DB();
            $a = $DB::table('lohang')->where('IdThucPham', $listGH[$i]->getIdFood())
                    ->where('SoLuong','>', $listGH[$i]->getSoLuong())->first();
            if (empty($a))
            {
                // tim ko thay lo hang cho san pham // da chan ko cho vao gio hang neu het hang // truong hop nay ko bao gio xay ra
            }
            else
            {
                $temp = new ChiTietHoaDonKhachHang();
                $temp->IdInvoice = $hoaDonKhachHang->IdInvoice;
                $temp->IdThucPham = $listGH[$i]->getIdFood();
                $temp->IdLoHang = $a->IdLoHang;
                $temp->SoLuong = $listGH[$i]->getSoLuong();
                $temp->GiaTien = $listGH[$i]->getThanhTien();
                $temp->save();
            }
        }
        // lam sach gio hang
        $listGH = null;
        $request->session()->put('GioHang', $listGH);
        // khi xac nhan tu nhan vien tu dong trừ vao lo hang
        return redirect('Account/Invoice');
    }

    public function ThanhToanThuong(Request $request)// thanh toan gio hang
    {
        $namekh = $request->session()->get("KhachHangName");
        $idkh = $request->session()->get("KhachHangIdKH");
        $listGH = $this->LayGioHang($request);
        // tao hoa don khach hang
        $hoaDonKhachHang = new HoaDonKhachHang();
        $hoaDonKhachHang->IdKH = $idkh;
        $hoaDonKhachHang->NgayDat = date("Y-m-d H:i:s");
        $hoaDonKhachHang->NgayGiao = $request->query('dateDelivery');
        $hoaDonKhachHang->TongTien = $this->TongTien($request);
        $hoaDonKhachHang->PhuongThucThanhToan = "Thường";
        $hoaDonKhachHang->TrangThai = "Chưa giao";
        $hoaDonKhachHang->DiaChiNhanHang = $request->query('diaChiNhanHang');
        $hoaDonKhachHang->save();
        // tao chi tiet hoa don khach hang
        for ($i = 0; $i < count($listGH); $i++)
        {
            $DB = new DB();
            $a = $DB::table('lohang')->where('IdThucPham', $listGH[$i]->getIdFood())
                ->where('SoLuong','>', $listGH[$i]->getSoLuong())->first();
            if (empty($a))
            {
                // tim ko thay lo hang cho san pham // da chan ko cho vao gio hang neu het hang // truong hop nay ko bao gio xay ra
            }
            else
            {
                $temp = new ChiTietHoaDonKhachHang();
                $temp->IdInvoice = $hoaDonKhachHang->IdInvoice;
                $temp->IdThucPham = $listGH[$i]->getIdFood();
                $temp->IdLoHang = $a->IdLoHang;
                $temp->SoLuong = $listGH[$i]->getSoLuong();
                $temp->GiaTien = $listGH[$i]->getThanhTien();
                $temp->save();
            }
        }
        // lam sach gio hang
        $listGH = null;
        $request->session()->put('GioHang', $listGH);
        // khi xac nhan tu nhan vien tu dong trừ vao lo hang
        return redirect('Account/Invoice');
    }

    private function TongSoLuong(Request $request)
    {
        $zTongSoLuong = 0;
        $listGH = $this->LayGioHang($request);
        if(!empty($listGH))
        {
            for ($i = 0; $i < count($listGH); $i++)
            {
                $zTongSoLuong = ($zTongSoLuong + $listGH[$i]->getSoLuong());
            }
        }
        return $zTongSoLuong;
    }

    private function TongTien(Request $request)
    {
        $zTongTien = 0;
        $listGH = $this->LayGioHang($request);
        if(!empty($listGH))
        {
            for ($i = 0; $i < count($listGH); $i++)
            {
                $zTongTien = ($zTongTien + $listGH[$i]->getThanhTien());
            }
        }
        return $zTongTien;
    }
}
