<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // basicamente: rode no banco de dados a tabela: UsuarioSeeder
        $this->call(UsuarioSeeder::class);
        $this->call(CategoriaSeeder::class);
    }
}
