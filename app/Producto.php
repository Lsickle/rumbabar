<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ProductoNombre',
        'ProductoDescripcion',
        'ProductoPrecio',
        'ProductoCantidad',
        'fk_proveedor',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'productos';
}
