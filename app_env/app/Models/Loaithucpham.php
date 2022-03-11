<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Loaithucpham
 * 
 * @property int $IdLoai
 * @property string|null $TenLoai
 * @property string|null $LinkHinhAnh
 * @property int|null $IdLoaiCha
 * 
 * @property Loaithucpham|null $loaithucpham
 * @property Collection|Loaithucpham[] $loaithucphams
 * @property Collection|Thucpham[] $thucphams
 *
 * @package App\Models
 */
class Loaithucpham extends Model
{
	protected $table = 'loaithucpham';
	protected $primaryKey = 'IdLoai';
	public $timestamps = false;

	protected $casts = [
		'IdLoaiCha' => 'int'
	];

	protected $fillable = [
		'TenLoai',
		'LinkHinhAnh',
		'IdLoaiCha'
	];

	public function loaithucpham()
	{
		return $this->belongsTo(Loaithucpham::class, 'IdLoaiCha');
	}

	public function loaithucphams()
	{
		return $this->hasMany(Loaithucpham::class, 'IdLoaiCha');
	}

	public function thucphams()
	{
		return $this->hasMany(Thucpham::class, 'IdLoai');
	}
}
