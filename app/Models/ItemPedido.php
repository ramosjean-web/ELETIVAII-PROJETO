<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $table = 'itens_pedidos';

    protected $fillable = [
        'quantidade',
        'observacao',
        'subtotal',
        'preco_vendido',
        'pedidos_id',
        'produtos_id'
    ];

    public $timestamps = false;

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedidos_id');
    }

    public function produto()
    {
        return $this->belongsTo(Produtos::class, 'produtos_id');
    }
}