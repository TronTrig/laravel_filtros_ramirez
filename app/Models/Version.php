<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Version extends Model
{
    use HasFactory;

    protected $fillable = [

        'nombre',
        'ano_id'

    ];

    public function ano()
    {
        return $this->belongsTo(Ano::class);
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
