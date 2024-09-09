<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'documento',
        'email',
        'telefono',
        'direccion',
        'sexo',
        'password',
        'tipoDocumento',
        'rol_id'
    ];

    public function rol() {
        return $this->belongsTo('App\Models\Rol');
    }
}
