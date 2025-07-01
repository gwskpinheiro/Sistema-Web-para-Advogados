<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'nome' => 'João da Silva',
                'cpf_cnpj' => '123.456.789-00',
                'email' => 'joao.silva@email.com',
                'telefone' => '(41) 99999-0001',
                'endereco' => 'Rua das Flores, 123, Curitiba - PR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Maria Oliveira',
                'cpf_cnpj' => '987.654.321-00',
                'email' => 'maria.oliveira@email.com',
                'telefone' => '(41) 98888-0002',
                'endereco' => 'Av. Brasil, 456, Londrina - PR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Empresa XPTO Ltda',
                'cpf_cnpj' => '12.345.678/0001-99',
                'email' => 'contato@xpto.com.br',
                'telefone' => '(41) 97777-0003',
                'endereco' => 'Rod. BR-277, Km 10, Paranaguá - PR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Carlos Eduardo Martins',
                'cpf_cnpj' => '111.222.333-44',
                'email' => 'carlos.martins@email.com',
                'telefone' => '(41) 99888-1122',
                'endereco' => 'Rua Marechal Deodoro, 1010, Ponta Grossa - PR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Ana Paula Souza',
                'cpf_cnpj' => '555.666.777-88',
                'email' => 'ana.souza@email.com',
                'telefone' => '(41) 98765-4321',
                'endereco' => 'Rua Rio Grande do Sul, 800, Maringá - PR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Construtora Delta Engenharia',
                'cpf_cnpj' => '33.444.555/0001-88',
                'email' => 'delta@engenharia.com.br',
                'telefone' => '(41) 91234-5678',
                'endereco' => 'Av. das Indústrias, 1500, São José dos Pinhais - PR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Luciana Mendes',
                'cpf_cnpj' => '222.333.444-55',
                'email' => 'luciana.mendes@email.com',
                'telefone' => '(41) 92345-6789',
                'endereco' => 'Rua Antônio Prado, 45, Campo Largo - PR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Alimentos Bom Sabor ME',
                'cpf_cnpj' => '44.555.666/0001-77',
                'email' => 'contato@bomsabor.com',
                'telefone' => '(41) 93456-7890',
                'endereco' => 'Rua da Produção, 900, Araucária - PR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Fernanda Costa',
                'cpf_cnpj' => '999.888.777-66',
                'email' => 'fernanda.costa@email.com',
                'telefone' => '(41) 94567-8901',
                'endereco' => 'Rua Dom Pedro II, 321, Colombo - PR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Translog Transportes',
                'cpf_cnpj' => '77.888.999/0001-55',
                'email' => 'logistica@translog.com.br',
                'telefone' => '(41) 95678-9012',
                'endereco' => 'Rua dos Caminhoneiros, 200, Cascavel - PR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
