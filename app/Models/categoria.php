<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;

    public $fillable = [

        'nombreCategoria'
    ];

    // Relación de uno a muchos
    public function servicios() {
        return $this->hasMany('App\Models\Servicio');
    }
}
