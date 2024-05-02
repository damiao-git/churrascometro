<?php

namespace Database\Seeders;

use App\Models\Churrasco;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChurrascoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Churrasco::create([
            'data' => '2024-04-15',
            'local' => 'casa da esquina',
            'qnt_pessoas' => '5',
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
    }
}
