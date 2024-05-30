<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// chamando dependência que dá acesso ao nosso banco de dados
use Illuminate\Support\Facades\DB;
// dependencia que gera dados "falsos" - que vai preencher o conteudo dos campos da tabela
use Faker\Factory as Faker;
// dependência de criptografia de senhas aparentemente
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // configuração da dependência faker

        // dizendo a linguagem que quero os meus dados 
        $faker = Faker::create('pt_BR');

        // dizendo que quero 10 registros
        for ($i = 0; $i <= 10; $i++) {
            // 
            DB::table('usuarios')->insert([
                'nome' => $faker->name(),
                // dizendo que quero um email unico e que nao tenha repeteição entre os campos de email
                'email' => $faker->unique()->safeEmail(),
                // now() dizendo que quero a data e a hora de hoje
                'email_verified_at' => now(),
                // utilizando a dependencia hash, para criptografar a senha (sera gerado um texto enorme e feito o processo de criptografia, na senha que estou passando no parâmetro, no caso '1234' - que será aplicado para todos os usuários)
                'password' => Hash::make('1234'),
                // atributos que o proprio laravel cria
                'created_at' => now(),
                'updated_at' => now(),


            ]);
        }
    }
}
