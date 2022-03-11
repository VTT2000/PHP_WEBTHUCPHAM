<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hoadonkhachhang
 * 
 * @property int $IdInvoice
 * @property int|null $IdKH
 * @property Carbon|null $NgayDat
 * @property Carbon|null $NgayGiao
 * @property int|null $TongTien
 * @property string|null $PhuongThucThanhToan
 * @property string|null $TrangThai
 * @property int|null $IdNV
 * @property string|null $DiaChiNhanHang
 * 
 * @property Khachhang|null $khachhang
 * @property Nhanvien|null $nhanvien
 * @property Collection|Chitiethoadonkhachhang[] $chitiethoadonkhachhangs
 *
 * @package App\Models
 */
class Hoadonkhachhang extends Model
{
	protected $table = 'hoadonkhachhang';
	protected $primaryKey = 'IdInvoice';
	public $timestamps = false;

	protected $casts = [
		'IdKH' => 'int',
		'TongTien' => 'int',
		'IdNV' => 'int'
	];

	protected $dates = [
		'NgayDat',
		'NgayGiao'
	];

	protected $fillable = [
		'IdKH',
		'NgayDat',
		'NgayGiao',
		'TongTien',
		'PhuongThucThanhToan',
		'TrangThai',
		'IdNV',
		'DiaChiNhanHang'
	];

	public function khachhang()
	{
		return $this->belongsTo(Khachhang::class, 'IdKH');
	}

	public function nhanvien()
	{
		return $this->belongsTo(Nhanvien::class, 'IdNV');
	}

	public function chitiethoadonkhachhangs()
	{
		return $this->hasMany(Chitiethoadonkhachhang::class, 'IdInvoice');
	}
}
