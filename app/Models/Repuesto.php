<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    protected $fillable = [
        'nombre',
        'stock',
        'precio',
        'proveedor',
    ];

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'servicio_repuesto')
            ->withPivot('cantidad')
            ->withTimestamps();
    }
}