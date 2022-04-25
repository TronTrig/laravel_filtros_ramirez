<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca_id',
        'modelo_id',
        'tipo',
        'tipo_modelo',
        'cc',
        'modelo_motor',
        'kw',
        'cv',
        'ano_fabricacion'

    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'modelo_id');
    }

        public function productos()
    {
        return $this->belongsToMany(Producto::class, 'vehiculo_producto');
    }    
}
