<?php

namespace Api4LEL;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';

    protected $fillable = ['id', 'id_colegio', 'nombre', 'apellidos', 'grado', 'correo', 'password', 'api_token'];

    protected $hidden = ['password'];

    public function setApiTokenAttribute($value)
    {
        $this->attributes['api_token'] = \Crypt::encrypt($value);
    }

    public function setPasswordAttribute($value)
    {
    	$this->attributes['password'] = \Crypt::encrypt($value);
    }

    public function getPasswordAttribute()
    {
    	return \Crypt::decrypt($this->attributes['password']);
    }
}
