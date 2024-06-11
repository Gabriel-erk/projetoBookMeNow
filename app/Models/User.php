<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /* 
    * recebe qual tabela ela deve consultar (no caso, usuarios, q é a tabela que preciso atingir, já que no meu db existe usuarios, nao User) 
    * aqui veio "User" no nome do arquivo, porém, não possuo a tabela "User" no meu db, apenas usuarios
    * utilizando este método é possivel redirecionar para a tabela correta, no caso, usuários
    * ao criar um arquivo de model em laragon, deve-se coloca-lo no singular, pois ele já faz a busca automaticamente da tabela e facilita a nossa vida
    */
    protected $table = "usuarios";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // quais campos não serão retornados/trazidos na hora da consulta (quando consultar, eles não irão retornar)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
