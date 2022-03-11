<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Khachhang
 * 
 * @property int $IdKH
 * @property string|null $Name
 * @property string|null $Email
 * @property string|null $SDT
 * @property string|null $DiaChi
 * @property string|null $MatKhau
 * @property Carbon|null $NgaySinh
 * 
 * @property Collection|Hoadonkhachhang[] $hoadonkhachhangs
 * @property Collection|Theodoithucpham[] $theodoithucphams
 *
 * @package App\Models
 */
class Khachhang extends Model
{
	protected $table = 'khachhang';
	protected $primaryKey = 'IdKH';
	public $timestamps = false;

	protected $dates = [
		'NgaySinh'
	];

	protected $fillable = [
		'Name',
		'Email',
		'SDT',
		'DiaChi',
		'MatKhau',
		'NgaySinh'
	];

	public function hoadonkhachhangs()
	{
		return $this->hasMany(Hoadonkhachhang::class, 'IdKH');
	}

	public function theodoithucphams()
	{
		return $this->hasMany(Theodoithucpham::class, 'IdKH');
	}
}
