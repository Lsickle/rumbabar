<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

        /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'UsuarioId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'UsuarioName',
        'UsuarioEmail',
        'UsuarioPassword',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuarios';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
