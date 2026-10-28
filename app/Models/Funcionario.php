<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';

    protected $primaryKey = 'registro';

    protected $fillable = [
        'eh_admin',
        'usuarios_id'
    ];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarios_id');
    }
}