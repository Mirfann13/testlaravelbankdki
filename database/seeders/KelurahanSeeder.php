<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelurahanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'kecamatan_id' => 1, 'nama' => 'Pondok Pinang'],
            ['id' => 2, 'kecamatan_id' => 1, 'nama' => 'Ciputat Timur'],
            ['id' => 3, 'kecamatan_id' => 2, 'nama' => 'Bintaro'],
            ['id' => 4, 'kecamatan_id' => 3, 'nama' => 'Serang'],
            ['id' => 5, 'kecamatan_id' => 4, 'nama' => 'Gandaria'],
            ['id' => 6, 'kecamatan_id' => 5, 'nama' => 'Kelapa Gading Barat'],
        ];

        DB::table('kelurahans')->insert($data);
    }
}
