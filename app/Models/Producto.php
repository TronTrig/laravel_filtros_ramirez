<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Marca;
use App\Models\Modelo;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [

        'sku',
        'id_sistema_administrativo',
        'nombre',
        'subcategoria_id',
        'categoria_id',
        'descripcion',
        'caracteristicas',
        'peso',
        'dimensiones',
        'precio',
        'promocionado',
        'modelo_id',
        'marca_id'

    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function vehiculos()
    {
        return $this->belongsToMany(Vehiculo::class, 'vehiculo_producto');
    }    
}
