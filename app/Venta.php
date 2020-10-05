<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'VentaId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'VentaSaldo',
        'VentaTotal',
        'fk_user',
        'fk_mesa',
        'fk_cliente',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ventas';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The roles that belong to the permiso.
     */
    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'producto_venta', 'fk_venta', 'fk_producto')->withPivot('ventaCantidad')->withTimestamps();
    }
}
