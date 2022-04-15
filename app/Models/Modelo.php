<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;


class Modelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'marca_id'
    ];
    public function ano()
    {
        return $this->hasMany(Ano::class);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}
