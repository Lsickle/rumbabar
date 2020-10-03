<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ProveedorId';

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
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
