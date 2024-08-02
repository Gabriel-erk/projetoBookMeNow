<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        // hasMany quer dizer que a relação com a tabela fotos é de 1:n - um para muitos, a tabela servico tem muitas fotos da tabela foto (fotos, no plural, na declaração da função, pois são muitas fotos q a tabela recebe, e para deixar mais automatizado e o laravel entender, deixa-se no plural)
        return $this->hasMany(Foto::class);
    }

    // laravel sabe que tem uma relaçao com a tabela usuario ao fazer isto
    public function usuario(){
        // belongsTo, quando se refere a uma relação 1:1, um serviço possui 1 usuário
        return $this->BelongsTo(User::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
