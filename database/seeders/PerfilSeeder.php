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
        Perfil::factory()->create(['descricao' => 'Editor e Marketing']);
        Perfil::factory()->create(['descricao' => 'Consultor FGTS']);
        Perfil::factory()->create(['descricao' => 'Gestor FGTS']);
        Perfil::factory()->create(['descricao' => 'Administrativo']);
        Perfil::factory()->create(['descricao' => 'Estagiário']);
        Perfil::factory()->create(['descricao' => 'Promotor de Crédito']);
        Perfil::factory()->create(['descricao' => 'Diretoria']);
        Perfil::factory()->create(['descricao' => 'Promotor de INSS']);
        Perfil::factory()->create(['descricao' => 'Líder de produto']);
        Perfil::factory()->create(['descricao' => 'Líder de INSS']);
        Perfil::factory()->create(['descricao' => 'Colaborador']);
        Perfil::factory()->create(['descricao' => 'Consultor']);
        Perfil::factory()->create(['descricao' => 'Líder de CREFAZ']);
    }
}
