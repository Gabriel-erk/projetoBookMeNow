<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    // campos que poderão ser alterados
    protected $fillable = [
        'titulo',
        'descricao',
        'valor',
        'qntde_votos',
        'total_votos',
        'telefone',
        'celular',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'usuario_id',
        'categoria_id',
    ];

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
}
