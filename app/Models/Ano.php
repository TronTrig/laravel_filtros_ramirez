<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Ano extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombre',
        'modelo_id'
    ];

    public function version()
    {
        return $this->hasMany(Version::class);
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }



}
