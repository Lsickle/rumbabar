<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Permiso extends Model
{
    use SoftDeletes;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'PermisoId';


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
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The roles that belong to the permiso.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Rol', 'permiso_rol', 'fk_permiso', 'fk_rol');
    }
}
