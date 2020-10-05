<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
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
        'ProveedorNombre',
        'ProveedorNit',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proveedores';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The proveedor that has Many producto.
     */
    public function productos()
    {
        return $this->hasMany('App\Producto', 'fk_proveedor', 'ProveedorId');
    }
}
