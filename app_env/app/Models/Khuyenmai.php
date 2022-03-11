<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Khuyenmai
 * 
 * @property int $IdKhuyenMai
 * @property Carbon|null $NgayBatDau
 * @property Carbon|null $NgayKetThuc
 * @property string|null $MoTaKhuyenMai
 * @property int|null $PhanTramKhuyenMai
 * 
 * @property Collection|Thucpham[] $thucphams
 *
 * @package App\Models
 */
class Khuyenmai extends Model
{
	protected $table = 'khuyenmai';
	protected $primaryKey = 'IdKhuyenMai';
	public $timestamps = false;

	protected $casts = [
		'PhanTramKhuyenMai' => 'int'
	];

	protected $dates = [
		'NgayBatDau',
		'NgayKetThuc'
	];

	protected $fillable = [
		'NgayBatDau',
		'NgayKetThuc',
		'MoTaKhuyenMai',
		'PhanTramKhuyenMai'
	];

	public function thucphams()
	{
		return $this->hasMany(Thucpham::class, 'IdKhuyenMai');
	}
}
