<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'MesaId';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MesaPuestos',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mesas';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
