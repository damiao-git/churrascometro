<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'name' => 'Damião Teste',
            'endereco' => 'casa da esquina',
            'email' => 'damiao@gmail.com',
            'telefone' => '61994298263',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        Usuario::create([
            'name' => 'Maria Teste',
            'endereco' => 'casa da maria',
            'email' => 'maria@gmail.com',
            'telefone' => '61994298263',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        Usuario::create([
            'name' => 'Thalia Teste',
            'endereco' => 'casa da Thalia',
            'email' => 'thalia@gmail.com',
            'telefone' => '61994298263',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
    }
}
