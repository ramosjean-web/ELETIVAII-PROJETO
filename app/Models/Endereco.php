<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';

    protected $fillable = [
        'logradouro',
        'numero',
        'bairro',
        'cep',
        'cidade',
        'uf',
        'clientes_id'
    ];

    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }
}