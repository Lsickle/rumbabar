<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ProveedorNombre',
        'ProveedorNit',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proveedores';
}
