<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'data_hora',
        'status',
        'tipo_pagamento',
        'total',
        'tipo_recebimento',
        'numero_mesa',
        'taxa_entrega',
        'clientes_id',
        'funcionarios_registro'
    ];

    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }

    public function funcionario()
    {
        return $this->belongsTo(
            Funcionario::class,
            'funcionarios_registro',
            'registro'
        );
    }
}