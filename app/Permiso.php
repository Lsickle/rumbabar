<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'PermisoNombre',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permisos';
}
