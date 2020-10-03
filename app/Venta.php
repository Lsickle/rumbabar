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
}
