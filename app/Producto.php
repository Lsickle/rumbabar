<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Producto extends Model
{
    use SoftDeletes;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ProductoId';

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
        'ProductoCodigo',
        'ProductoImage',
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
    public $timestamps = true;

    /**
     * The roles that belong to the permiso.
     */
    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor', 'fk_proveedor', 'ProveedorId');
    }

    /**
     * The roles that belong to the permiso.
     */
    public function compras()
    {
        return $this->belongsToMany('App\Compra', 'compra_producto', 'fk_producto', 'fk_compra')->withPivot('compraCantidad')->withTimestamps();
    }

    /**
     * The roles that belong to the permiso.
     */
    public function ventas()
    {
        return $this->belongsToMany('App\Venta', 'compra_producto', 'fk_producto', 'fk_venta')->withPivot('ventaCantidad')->withTimestamps();
    }
}
