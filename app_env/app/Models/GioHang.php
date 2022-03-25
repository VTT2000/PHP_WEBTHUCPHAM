<?php
namespace App\Models;

class GioHang
{
    private $zIdFood;
    private $zNameFood;
    private $zLinkHinhAnh;
    private $zDonGia;
    private $zSoLuong;
    
    /*
    public function __construct($zIdFood, $zNameFood, $zLinkHinhAnh, $zDonGia, $zSoLuong) {
        $this->zIdFood = $zIdFood;
        $this->zNameFood = $zNameFood;
        $this->zLinkHinhAnh = $zLinkHinhAnh;
        $this->zDonGia = $zDonGia;
        $this->zSoLuong = $zSoLuong;
    }
    */

    public function getIdFood(){
        return $this->zIdFood;
    }

    public function getNameFood(){
        return $this->zNameFood;
    }

    public function getLinkHinhAnh(){
        return $this->zLinkHinhAnh;
    }

    public function getDonGia(){
        return $this->zDonGia;
    }

    public function getSoLuong(){
        return $this->zSoLuong;
    }

    public function getThanhTien(){
        return ($this->zDonGia * $this->zSoLuong);
    }

    public function setIdFood($zIdFood){
        $this->zIdFood = $zIdFood;
    }

    public function setNameFood($zNameFood){
        $this->zNameFood = $zNameFood;
    }

    public function setLinkHinhAnh($zLinkHinhAnh){
        $this->zLinkHinhAnh = $zLinkHinhAnh;
    }

    public function setDonGia($zDonGia){
        $this->zDonGia = $zDonGia;
    }

    public function setSoLuong($zSoLuong){
        $this->zSoLuong = $zSoLuong;
    }
}