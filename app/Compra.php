<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Compra extends Model
{
    use SoftDeletes;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'CompraId';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CompraStatus',
        'CompraSaldo',
        'CompraTotal',
        'fk_user',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'compras';
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
        return $this->belongsToMany('App\Producto', 'compra_producto', 'fk_compra', 'fk_producto')->withPivot('compraCantidad')->withTimestamps();
	}

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor', 'ProveedorId', 'fk_proveedor');
	}
	/**
     * The roles that belong to the permiso.
     */
    public function comprador()
    {
        return $this->hasOne('App\User', 'id', 'fk_user');
    }
}
