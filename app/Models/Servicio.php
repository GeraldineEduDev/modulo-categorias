<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Servicio extends Model
{
    use HasFactory;

    public $fillable = [
        'nombre',
        'descripcion',
        'categoria_id'
    ];

    // Relación muchos a uno
    public function categoria() {
        return $this->belongsTo(categoria::class,'categoria_id');
    }
}
