<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perfil;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perfil::factory()->create(['descricao' => 'Administrador']);
        Perfil::factory()->create(['descricao' => 'Vendedores e Colaboradores']);
        Perfil::factory()->create(['descricao' => 'Lider de Produto']);
    }
}
