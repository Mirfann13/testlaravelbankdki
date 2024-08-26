<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'nama' => 'Banten'],
            ['id' => 2, 'nama' => 'Jakarta'],
        ];

        DB::table('provinsis')->insert($data);
    }
}
