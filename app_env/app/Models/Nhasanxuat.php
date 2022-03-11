<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nhasanxuat
 * 
 * @property int $IdNSX
 * @property string $TenNSX
 * @property string|null $DiaChi
 * @property string|null $SoDienThoai
 * 
 * @property Collection|Thucpham[] $thucphams
 *
 * @package App\Models
 */
class Nhasanxuat extends Model
{
	protected $table = 'nhasanxuat';
	protected $primaryKey = 'IdNSX';
	public $timestamps = false;

	protected $fillable = [
		'TenNSX',
		'DiaChi',
		'SoDienThoai'
	];

	public function thucphams()
	{
		return $this->hasMany(Thucpham::class, 'IdNSX');
	}
}
