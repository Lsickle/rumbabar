<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
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
}
