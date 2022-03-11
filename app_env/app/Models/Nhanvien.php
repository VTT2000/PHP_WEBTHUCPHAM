<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nhanvien
 * 
 * @property int $IdNV
 * @property string|null $Ten
 * @property string|null $SDT
 * @property string|null $Email
 * @property string|null $DiaChi
 * @property string|null $Username
 * @property string|null $Password
 * @property Carbon|null $NgaySinh
 * @property int|null $IdPermission
 * 
 * @property Permission|null $permission
 * @property Collection|Hoadonkhachhang[] $hoadonkhachhangs
 *
 * @package App\Models
 */
class Nhanvien extends Model
{
	protected $table = 'nhanvien';
	protected $primaryKey = 'IdNV';
	public $timestamps = false;

	protected $casts = [
		'IdPermission' => 'int'
	];

	protected $dates = [
		'NgaySinh'
	];

	protected $fillable = [
		'Ten',
		'SDT',
		'Email',
		'DiaChi',
		'Username',
		'Password',
		'NgaySinh',
		'IdPermission'
	];

	public function permission()
	{
		return $this->belongsTo(Permission::class, 'IdPermission');
	}

	public function hoadonkhachhangs()
	{
		return $this->hasMany(Hoadonkhachhang::class, 'IdNV');
	}
}
