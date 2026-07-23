<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'nombre',
        'descripcion',
        'vehiculo_id',
        'precio',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
    public function repuestos()
{
    return $this->belongsToMany(Repuesto::class, 'servicio_repuesto')
        ->withPivot('cantidad')
        ->withTimestamps();
}
}