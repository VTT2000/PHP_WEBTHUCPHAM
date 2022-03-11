<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lohang
 * 
 * @property int $IdLoHang
 * @property int|null $IdThucPham
 * @property int|null $SoLuong
 * @property Carbon|null $NgaySanXuat
 * @property Carbon|null $NgayHetHan
 * @property Carbon|null $NgayNhapLoHang
 * 
 * @property Collection|Chitiethoadonkhachhang[] $chitiethoadonkhachhangs
 *
 * @package App\Models
 */
class Lohang extends Model
{
	protected $table = 'lohang';
	protected $primaryKey = 'IdLoHang';
	public $timestamps = false;

	protected $casts = [
		'IdThucPham' => 'int',
		'SoLuong' => 'int'
	];

	protected $dates = [
		'NgaySanXuat',
		'NgayHetHan',
		'NgayNhapLoHang'
	];

	protected $fillable = [
		'IdThucPham',
		'SoLuong',
		'NgaySanXuat',
		'NgayHetHan',
		'NgayNhapLoHang'
	];

	public function chitiethoadonkhachhangs()
	{
		return $this->hasMany(Chitiethoadonkhachhang::class, 'IdLoHang');
	}
}
