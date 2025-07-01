<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nome' => 'Dr. Ricardo Almeida',
                'email' => 'ricardo.almeida@advocacia.com',
                'password' => Hash::make('senha123'),
                'telefone' => '(41) 99999-0001',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Dra. Juliana Torres',
                'email' => 'juliana.torres@escritoriojuridico.com',
                'password' => Hash::make('senha123'),
                'telefone' => '(41) 98888-0002',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Dr. Felipe Castro',
                'email' => 'felipe.castro@direitoempresarial.com',
                'password' => Hash::make('senha123'),
                'telefone' => '(41) 97777-0003',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Dra. Camila Rocha',
                'email' => 'camila.rocha@advogados.com',
                'password' => Hash::make('senha123'),
                'telefone' => '(41) 96666-0004',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Dr. André Nogueira',
                'email' => 'andre.nogueira@jurisconsultoria.com',
                'password' => Hash::make('senha123'),
                'telefone' => '(41) 95555-0005',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Dra. Bianca Fernandes',
                'email' => 'bianca.fernandes@advocaciafamiliar.com',
                'password' => Hash::make('senha123'),
                'telefone' => '(41) 94444-0006',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
