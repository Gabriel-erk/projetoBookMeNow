<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    // permite alterações nestes 2 campos
    protected $fillable = [ 
        'imagem',
        'servico_id'
    ];

    public function servico(){
        return $this->belongsTo(Servico::class);
    }
 
}
