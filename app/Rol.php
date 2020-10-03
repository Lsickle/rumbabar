<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'RolId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'RolNombre',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The roles that belong to the permiso.
     */
    public function permisos()
    {
        return $this->belongsToMany('App\Permiso', 'permiso_rol', 'fk_rol', 'fk_permiso');
    }
}
