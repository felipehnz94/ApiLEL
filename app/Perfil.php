<?php

namespace Api4LEL;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //
	protected $table = "perfiles";

    protected $fillable = ['id_estudiante', 'id_categoria'];
}
