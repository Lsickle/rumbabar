<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ClienteNombre', 'ClienteDocumento',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clientes';
}
