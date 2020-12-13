<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
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
    public $timestamps = false;

    /**
     * The roles that belong to the permiso.
     */
    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'compra_producto', 'fk_compra', 'fk_producto')->withPivot('compraCantidad')->withTimestamps();
	}

	/**
     * The roles that belong to the permiso.
     */
    public function comprador()
    {
        return $this->hasOne('App\User', 'id', 'fk_user');
    }
}
