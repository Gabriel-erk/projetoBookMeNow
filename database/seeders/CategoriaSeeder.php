<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');
        // geradno um array de categorias
        $categorias = [
            'Tecnologia',
            'Mecânico',
            'Eletricista',
            'Pintor',
            'Pedreiro',
            'Jardineiro'
        ];

        // utilizando foreach pois é um array que estou percorrendo (e será jogado dentro de $categoria)
        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert([
                'titulo' => $categoria,
                'imagem' => asset('img/categoria-carro.jpg'),
                'descricao' => $faker->sentence()
            ]);
        }
    }
}
