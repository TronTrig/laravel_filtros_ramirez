<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;


class Marca extends Model
{
    use HasFactory;


    protected $fillable = [

        'nombre'

    ];

    public function modelo()
    {
        return $this->hasMany(Modelo::class);
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
