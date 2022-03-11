<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitiethoadonkhachhang
 * 
 * @property int $IdInvoiceCT
 * @property int|null $IdInvoice
 * @property int|null $IdThucPham
 * @property int|null $IdLoHang
 * @property int|null $SoLuong
 * @property int|null $GiaTien
 * 
 * @property Hoadonkhachhang|null $hoadonkhachhang
 * @property Lohang|null $lohang
 * @property Thucpham|null $thucpham
 *
 * @package App\Models
 */
class Chitiethoadonkhachhang extends Model
{
	protected $table = 'chitiethoadonkhachhang';
	protected $primaryKey = 'IdInvoiceCT';
	public $timestamps = false;

	protected $casts = [
		'IdInvoice' => 'int',
		'IdThucPham' => 'int',
		'IdLoHang' => 'int',
		'SoLuong' => 'int',
		'GiaTien' => 'int'
	];

	protected $fillable = [
		'IdInvoice',
		'IdThucPham',
		'IdLoHang',
		'SoLuong',
		'GiaTien'
	];

	public function hoadonkhachhang()
	{
		return $this->belongsTo(Hoadonkhachhang::class, 'IdInvoice');
	}

	public function lohang()
	{
		return $this->belongsTo(Lohang::class, 'IdLoHang');
	}

	public function thucpham()
	{
		return $this->belongsTo(Thucpham::class, 'IdThucPham');
	}
}
