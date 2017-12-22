<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
	protected $table = 'edital';

	protected $fillable = [
		'id_lei', 'ds_titulo', 'dt_edital', 'st_edital', 'ds_link', 'st_registro_ativo',
	];

	public function lei(){
    	return $this->belongsTo('App\Models\Lei', 'id_lei');
    }
}