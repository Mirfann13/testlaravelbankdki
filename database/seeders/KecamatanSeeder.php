<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'kabupaten_id' => 1, 'nama' => 'Ciputat'],
            ['id' => 2, 'kabupaten_id' => 1, 'nama' => 'Tangerang Selatan'],
            ['id' => 3, 'kabupaten_id' => 2, 'nama' => 'Serang Kota'],
            ['id' => 4, 'kabupaten_id' => 3, 'nama' => 'Kebayoran Baru'],
            ['id' => 5, 'kabupaten_id' => 4, 'nama' => 'Kelapa Gading'],
        ];

        DB::table('kecamatans')->insert($data);
    }
}
