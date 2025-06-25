<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pessoa;
use App\Models\Perfil;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pessoa = Pessoa::create([
            'nome' => 'João',
            'idade' => 25,
            'cpf' => '12345678900',
        ]);

        Perfil::create([
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'pessoa_id' => 1,
        ]);

        // $pessoa->perfil()->create([
        //     'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        // ]);

        // Pessoa::create([
        //     'nome' => 'João',
        //     'idade' => 25,
        //     'cpf' => '12345678900',
        // ])->perfil()->create([
        //     'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        // ]);

        // $pessoa = Pessoa::find(1);
        // $perfil = $pessoa->perfil;

        // $pessoa = Pessoa::create([
        //     'nome' => 'João',
        //     'idade' => 30,
        //     'cpf' => '123.456.789-00',
        // ]);

        // $pessoa->perfil()->create([
        //     'bio' => 'Desenvolvedor Laravel',
        // ]);
    }
}
