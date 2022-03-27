<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use App\Models\Khachhang;
use App\Models\Khuyenmai;
use App\Models\Thucpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Cast\Array_;

class GioHangController extends Controller
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

    public function ThemGioHang(Request $request)
    {
        $DB = new DB();
        $listGH = array();
        $listGH = $this->LayGioHang($request);
        $sanPham = null;
        
        foreach($listGH as $item){
            if($item->getIdFood() == $request->query('IdFood')){
                $sanPham = $item;
            }
        }
        
        if(empty($sanPham))
        {
            $a = $DB::table('thucpham')->where('IdThucPham', $request->query('IdFood'))->first();
            $sanPham = new GioHang();
            $sanPham->setIdFood($a->IdThucPham);
            
            if (empty($a->IdKhuyenMai))
            {
                $sanPham->setDonGia($a->GiaBan);
            }
            else
            {
                $b = $DB::table('khuyenmai')->where('IdKhuyenMai', $a->IdKhuyenMai)->first();
                $sanPham->setDonGia($a->GiaBan * (100 - $b->PhanTramKhuyenMai) / 100);
            }
            $sanPham->setNameFood($a->TenThucPham);
            $sanPham->setLinkHinhAnh($a->LinkHinhAnh);
            $sanPham->setSoLuong(1);

            if (!empty($request->query('soLuong')))
            {
                $sanPham->setSoLuong($request->query('soLuong'));
            }
            array_push($listGH, $sanPham);
            $request->session()->put("GioHang", $listGH);
        }
        else
        {
            for ($i = 0; $i < count($listGH); $i++){
                if($listGH[$i]->getIdFood() == $request->query('IdFood')){
                    if(!empty($request->query('soLuong'))){
                        $listGH[$i]->setSoLuong(($listGH[$i]->getSoLuong() + $request->query('soLuong')));
                    }
                    else{
                        $listGH[$i]->setSoLuong(($listGH[$i]->getSoLuong() + 1));
                    }
                }
            }
            $request->session()->put("GioHang", $listGH);
        }
        
        return Redirect::to($request->query('strURL'));
    }
    public function Index(Request $request)
    {
        $DB = new DB();
        $idkh = $request->session()->get("KhachHangIdKH");
        $listGH = array();
        $listGH = $this->LayGioHang($request);

        $KhachHang = new Khachhang();
        $KhachHang = $DB::table('khachhang')->where('IdKH', $idkh)->first();
        $Tongsoluong = $this->TongSoLuong($request);
        $Tongtien = $this->TongTien($request);

        return view('user/GioHang/Index')
            ->with("title","Giỏ hàng")
            ->with("gioHangs", $listGH)
            ->with("KhachHang", $KhachHang)
            ->with("Tongsoluong", $Tongsoluong)
            ->with("Tongtien", $Tongtien);
    }

    public function ThemMot(Request $request)
    {
        $listGioHang = $this->LayGioHang($request);
        for ($i = 0; $i < count($listGioHang); $i++)
        {
            if ($listGioHang[$i]->getIdFood() == $request->query('IdFood'))
            {
                if($listGioHang[$i]->getSoLuong() + 1 > 10)
                {
                    $listGioHang[$i]->setSoLuong(10);
                }
                else
                {
                    $listGioHang[$i]->setSoLuong(($listGioHang[$i]->getSoLuong() + 1));
                }
            }
        }
        $request->session()->put("GioHang",$listGioHang);
        return redirect('GioHang/Index');
    }

    public function GiamMot(Request $request)
    {
        $listGioHang = $this->LayGioHang($request);
        for ($i = 0; $i < count($listGioHang); $i++)
        {
            if ($listGioHang[$i]->getIdFood() == $request->query('IdFood'))
            {
                if ($listGioHang[$i]->getSoLuong() - 1 < 1)
                {
                    $listGioHang[$i]->setSoLuong(1);
                }
                else
                {
                    $listGioHang[$i]->setSoLuong(($listGioHang[$i]->getSoLuong() - 1));
                }
            }
        }

        $request->session()->put("GioHang", $listGioHang);
        return redirect('GioHang/Index');
    }


    public function CapNhatGioHang(Request $request)
    {
        $listGioHang = $this->LayGioHang($request);
        for ($i = 0; $i < count($listGioHang); $i++)
        {
            if ($listGioHang[$i]->getIdFood() == $request->query('IdFood'))
            {
                $listGioHang[$i]->setSoLuong($request->query('soLuong'));
            }
        }

        $request->session()->put("GioHang", $listGioHang);
        return redirect('GioHang/Index');
    }

    public function DeleteGH(Request $request)
    {
        $listGH = $this->LayGioHang($request);
        for ($i = 0; $i < count($listGH); $i++)
        {
            if ($listGH[$i]->getIdFood() == $request->query('id'))
            {
                array_splice($listGH,$i,1);
            }
        }
        $request->session()->put("GioHang", $listGH);
        return redirect('GioHang/Index');
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
