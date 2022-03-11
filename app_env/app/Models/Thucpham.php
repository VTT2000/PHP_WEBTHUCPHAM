<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Thucpham
 * 
 * @property int $IdThucPham
 * @property string|null $TenThucPham
 * @property int|null $SoLuongTrenMotSanPham
 * @property string|null $DonViTinh
 * @property int|null $GiaMua
 * @property int|null $GiaBan
 * @property int|null $IdNSX
 * @property Carbon|null $NgayTao
 * @property string|null $TrangThai
 * @property int|null $IdLoai
 * @property int|null $IdKhuyenMai
 * @property string|null $LinkHinhAnh
 * 
 * @property Khuyenmai|null $khuyenmai
 * @property Loaithucpham|null $loaithucpham
 * @property Nhasanxuat|null $nhasanxuat
 * @property Collection|Chitiethoadonkhachhang[] $chitiethoadonkhachhangs
 * @property Collection|Theodoithucpham[] $theodoithucphams
 *
 * @package App\Models
 */
class Thucpham extends Model
{
	protected $table = 'thucpham';
	protected $primaryKey = 'IdThucPham';
	public $timestamps = false;

	protected $casts = [
		'SoLuongTrenMotSanPham' => 'int',
		'GiaMua' => 'int',
		'GiaBan' => 'int',
		'IdNSX' => 'int',
		'IdLoai' => 'int',
		'IdKhuyenMai' => 'int'
	];

	protected $dates = [
		'NgayTao'
	];

	protected $fillable = [
		'TenThucPham',
		'SoLuongTrenMotSanPham',
		'DonViTinh',
		'GiaMua',
		'GiaBan',
		'IdNSX',
		'NgayTao',
		'TrangThai',
		'IdLoai',
		'IdKhuyenMai',
		'LinkHinhAnh'
	];

	public function khuyenmai()
	{
		return $this->belongsTo(Khuyenmai::class, 'IdKhuyenMai');
	}

	public function loaithucpham()
	{
		return $this->belongsTo(Loaithucpham::class, 'IdLoai');
	}

	public function nhasanxuat()
	{
		return $this->belongsTo(Nhasanxuat::class, 'IdNSX');
	}

	public function chitiethoadonkhachhangs()
	{
		return $this->hasMany(Chitiethoadonkhachhang::class, 'IdThucPham');
	}

	public function theodoithucphams()
	{
		return $this->hasMany(Theodoithucpham::class, 'IdFood');
	}
}
