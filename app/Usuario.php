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
        'fk_rol',
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

        /**
     * The roles that belong to the permiso.
     */
    public function rol()
    {
        return $this->belongsTo('App\Rol', 'roles', 'fk_rol', 'RolId');
    }

    public function getAuthPassword()
    {
        return $this->UsuarioPassword;
    }

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
