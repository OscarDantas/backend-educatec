<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lei extends Model
{
	protected $table = 'lei';

	protected $fillable = [
		'ds_lei', 'dt_lei', 'st_registro_ativo',
	];

    public function editals(){
    	return $this->hasMany('App\Models\Edital', 'id_lei');
    }
}