<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use App\Models\Role;
use App\Models\Aluno;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        Aluno::create([
            'nome' => 'João Silva',
            'cpf' => '12345678900',
            'email' => 'joaozinho@ifpr.com',
            'telefone' => '40028922']);

        Role::create([
            'titulo' => 'Aluno']);
    }

    //   attach
    // $user->roles()->attach(1);

    // detach
    // $user->roles()->detach(1); // ou sem parâmetro remove todos

    // sync
    // $user->roles()->sync([1, 2]); // remove os que não são 1 e 2

    //  toggle
    // $user->roles()->toggle([1, 2]);

    //  syncWithoutDetaching
    // $user->roles()->syncWithoutDetaching([3]);
}
