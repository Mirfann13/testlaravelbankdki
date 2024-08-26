<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'provinsi_id' => 1, 'nama' => 'Tangerang'],
            ['id' => 2, 'provinsi_id' => 1, 'nama' => 'Serang'],
            ['id' => 3, 'provinsi_id' => 2, 'nama' => 'Jakarta Selatan'],
            ['id' => 4, 'provinsi_id' => 2, 'nama' => 'Jakarta Utara'],
        ];

        DB::table('kabupatens')->insert($data);
    }
}
