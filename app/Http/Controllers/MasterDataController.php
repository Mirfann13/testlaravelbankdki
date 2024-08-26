<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function provinsi()
    {
        $provinsis = Provinsi::all();
        return response()->json($provinsis);
    }

    public function kabupaten($provinsi_id)
    {
        $kabupatens = Kabupaten::where('provinsi_id', $provinsi_id)->get();
        return response()->json($kabupatens);
    }

    public function kecamatan($kabupaten_id)
    {
        $kecamatans = Kecamatan::where('kabupaten_id', $kabupaten_id)->get();
        return response()->json($kecamatans);
    }

    public function kelurahan($kecamatan_id)
    {
        $kelurahans = Kelurahan::where('kecamatan_id', $kecamatan_id)->get();
        return response()->json($kelurahans);
    }
}