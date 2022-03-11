<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Theodoithucpham
 * 
 * @property int $IdTheoDoi
 * @property int|null $IdKH
 * @property int|null $IdFood
 * 
 * @property Khachhang|null $khachhang
 * @property Thucpham|null $thucpham
 *
 * @package App\Models
 */
class Theodoithucpham extends Model
{
	protected $table = 'theodoithucpham';
	protected $primaryKey = 'IdTheoDoi';
	public $timestamps = false;

	protected $casts = [
		'IdKH' => 'int',
		'IdFood' => 'int'
	];

	protected $fillable = [
		'IdKH',
		'IdFood'
	];

	public function khachhang()
	{
		return $this->belongsTo(Khachhang::class, 'IdKH');
	}

	public function thucpham()
	{
		return $this->belongsTo(Thucpham::class, 'IdFood');
	}
}
