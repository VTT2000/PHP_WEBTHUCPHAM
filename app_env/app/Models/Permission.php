<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * 
 * @property int $IdPermission
 * @property string|null $Ten
 * 
 * @property Collection|Nhanvien[] $nhanviens
 *
 * @package App\Models
 */
class Permission extends Model
{
	protected $table = 'permission';
	protected $primaryKey = 'IdPermission';
	public $timestamps = false;

	protected $fillable = [
		'Ten'
	];

	public function nhanviens()
	{
		return $this->hasMany(Nhanvien::class, 'IdPermission');
	}
}
