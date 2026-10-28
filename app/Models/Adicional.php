<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
    protected $table = 'adicional';

    protected $fillable = [
        'preco_extra',
        'ingredientes_id'
    ];

    public $timestamps = false;

    public function ingrediente()
    {
        return $this->belongsTo(
            Ingrediente::class,
            'ingredientes_id'
        );
    }
}