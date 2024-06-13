<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        DB::table('servicos')->insert(
            [
                'titulo' => 'Formatação de Computador',
                'descricao' => $faker->sentence(),
                'total_votos' => 10,
                'qntde_votos' => 5,
                'valor' => 30.00,
                'telefone' => '140837252',
                'celular' => '149837324',
                'endereco' => 'Rua Paraíba',
                'numero' => '125',
                'bairro' => 'Centro',
                'cidade' => 'Maríia',
                'estado' => 'SP',
                'cep' => '17512800',
                'complemento' => '1',
                'usuario_id' => rand(1, 10),
                'categoria_id' => rand(1, 6),
            ],
        );
        DB::table('servicos')->insert(
            [
                'titulo' => 'Formatação de Computador',
                'descricao' => 'Computador lento? Nós resolvemos!',
                'total_votos' => 35,
                'qntde_votos' => 20,
                'valor' => 50.00,
                'telefone' => '140837252',
                'celular' => '149837324',
                'endereco' => 'Rua Paraíba',
                'numero' => '125',
                'bairro' => 'Centro',
                'cidade' => 'Marília',
                'estado' => 'SP',
                'cep' => '17512800',
                'complemento' => '3',
                'usuario_id' => 1,
                'categoria_id' => 2,
            ],
        );
        DB::table('servicos')->insert(
            [
                'titulo' => 'Instalação de Software',
                'descricao' => 'Instalamos qualquer tipo de software.',
                'total_votos' => 42,
                'qntde_votos' => 28,
                'valor' => 40.00,
                'telefone' => '140837253',
                'celular' => '149837325',
                'endereco' => 'Rua Amazonas',
                'numero' => '126',
                'bairro' => 'Jardim',
                'cidade' => 'São Paulo',
                'estado' => 'SP',
                'cep' => '04567001',
                'complemento' => '2',
                'usuario_id' => 2,
                'categoria_id' => 3,
            ],
        );
        DB::table('servicos')->insert(
            [
                'titulo' => 'Reparo de Hardware',
                'descricao' => 'Concertamos todos os tipos de hardware.',
                'total_votos' => 55,
                'qntde_votos' => 33,
                'valor' => 70.00,
                'telefone' => '140837254',
                'celular' => '149837326',
                'endereco' => 'Rua Rio Grande',
                'numero' => '127',
                'bairro' => 'Industrial',
                'cidade' => 'Campinas',
                'estado' => 'SP',
                'cep' => '13050001',
                'complemento' => '5',
                'usuario_id' => 3,
                'categoria_id' => 1,
            ],
        );
        DB::table('servicos')->insert(
            [
                'titulo' => 'Limpeza de Computador',
                'descricao' => 'Limpeza completa do seu PC.',
                'total_votos' => 25,
                'qntde_votos' => 18,
                'valor' => 30.00,
                'telefone' => '140837255',
                'celular' => '149837327',
                'endereco' => 'Rua Maranhão',
                'numero' => '128',
                'bairro' => 'Vila',
                'cidade' => 'Ribeirão Preto',
                'estado' => 'SP',
                'cep' => '14085001',
                'complemento' => '55',
                'usuario_id' => 4,
                'categoria_id' => 5,
            ],
        );
        DB::table('servicos')->insert( 
            [
                'titulo' => 'Upgrade de Computador',
                'descricao' => 'Atualizamos seu computador para melhorar o desempenho.',
                'total_votos' => 48,
                'qntde_votos' => 27,
                'valor' => 80.00,
                'telefone' => '140837256',
                'celular' => '149837328',
                'endereco' => 'Rua Bahia',
                'numero' => '129',
                'bairro' => 'Norte',
                'cidade' => 'Bauru',
                'estado' => 'SP',
                'cep' => '17030001',
                'complemento' => '10',
                'usuario_id' => 5,
                'categoria_id' => 4,
            ],
        );
        DB::table('servicos')->insert( 
            [
                'titulo' => 'Backup de Dados',
                'descricao' => 'Realizamos backup seguro dos seus dados.',
                'total_votos' => 37,
                'qntde_votos' => 22,
                'valor' => 45.00,
                'telefone' => '140837257',
                'celular' => '149837329',
                'endereco' => 'Rua Paraná',
                'numero' => '130',
                'bairro' => 'Sul',
                'cidade' => 'Piracicaba',
                'estado' => 'SP',
                'cep' => '13420001',
                'complemento' => '12',
                'usuario_id' => 6,
                'categoria_id' => 3,
            ],
        );
        DB::table('servicos')->insert( 
            [
                'titulo' => 'Remoção de Vírus',
                'descricao' => 'Removemos vírus e malwares do seu computador.',
                'total_votos' => 52,
                'qntde_votos' => 29,
                'valor' => 60.00,
                'telefone' => '140837258',
                'celular' => '149837330',
                'endereco' => 'Rua Santa Catarina',
                'numero' => '131',
                'bairro' => 'Oeste',
                'cidade' => 'Santos',
                'estado' => 'SP',
                'cep' => '11075001',
                'complemento' => '15',
                'usuario_id' => 7,
                'categoria_id' => 1,
            ],
        );

        DB::table('servicos')->insert(
            [
                'titulo' => 'Consultoria de TI',
                'descricao' => 'Oferecemos consultoria para melhorar sua infraestrutura de TI.',
                'total_votos' => 65,
                'qntde_votos' => 40,
                'valor' => 90.00,
                'telefone' => '140837259',
                'celular' => '149837331',
                'endereco' => 'Rua Goiás',
                'numero' => '132',
                'bairro' => 'Leste',
                'cidade' => 'São José do Rio Preto',
                'estado' => 'SP',
                'cep' => '15030001',
                'complemento' => '19',
                'usuario_id' => 8,
                'categoria_id' => 2,
            ],
        ); 
        DB::table('servicos')->insert(
            [
                'titulo' => 'Montagem de Computadores',
                'descricao' => 'Montamos computadores personalizados conforme sua necessidade.',
                'total_votos' => 60,
                'qntde_votos' => 35,
                'valor' => 85.00,
                'telefone' => '140837260',
                'celular' => '149837332',
                'endereco' => 'Rua Rio de Janeiro',
                'numero' => '133',
                'bairro' => 'Centro',
                'cidade' => 'Sorocaba',
                'estado' => 'SP',
                'cep' => '18030001',
                'complemento' => '20',
                'usuario_id' => 9,
                'categoria_id' => 4,
            ],
        ); 
        DB::table('servicos')->insert(
            [
                'titulo' => 'Recuperação de Dados',
                'descricao' => 'Recuperamos dados perdidos de seu computador ou HD.',
                'total_votos' => 73,
                'qntde_votos' => 45,
                'valor' => 100.00,
                'telefone' => '140837261',
                'celular' => '149837333',
                'endereco' => 'Rua Minas Gerais',
                'numero' => '134',
                'bairro' => 'Jardim Paulista',
                'cidade' => 'São Carlos',
                'estado' => 'SP',
                'cep' => '13560001',
                'complemento' => '13',
                'usuario_id' => 10,
                'categoria_id' => 6,
            ],
        );
        
    }
}