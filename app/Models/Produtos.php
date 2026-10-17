<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'descricao',
        'preco_base',
        'categorias_id'
    ];
}