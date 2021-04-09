<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Venta extends Model
{
    use SoftDeletes;
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
        'VentaStatus',
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
    public $timestamps = true;

    /**
     * The roles that belong to the permiso.
     */
    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'producto_venta', 'fk_venta', 'fk_producto')->withPivot(['ventaCantidad', 'ventaSubtotal']);
	}

	/**
     * The roles that belong to the permiso.
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'fk_cliente', 'ClienteId');
    }

    	/**
     * The roles that belong to the permiso.
     */
    public function mesa()
    {
        return $this->belongsTo('App\Mesa', 'fk_mesa', 'MesaId');
    }
}
