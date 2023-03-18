<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Apoderado
 * 
 * @property int $idapoderado
 * @property string|null $nombre
 * 
 * @property Collection|Estudiante[] $estudiantes
 *
 * @package App\Models
 */
class Apoderado extends Model
{
	protected $table = 'apoderados';
	protected $primaryKey = 'idapoderado';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function estudiantes()
	{
		return $this->hasMany(Estudiante::class, 'apoderados_idapoderado');
	}

	// relacinon uno a uno polimorfica
	public function image(){
		return $this->morphOne(Image::class, 'imageable');
	}
	
	// relacinon uno a uno polimorfica
	public function file(){
		return $this->morphOne(File::class, 'fileable');
	}
}
