<?php

namespace App\Http\Controllers;

use App\Models\PembukaanRekening;
use App\Models\Pekerjaan;
use App\Models\Provinsi;
use App\Rules\NamaNasabahRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembukaanRekeningController extends Controller
{
    public function index()
    {
        $rekenings = PembukaanRekening::with(['pekerjaan', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan'])
            ->where('created_by', Auth::id())
            ->get();
        return view('pembukaan-rekening.index', compact('rekenings'));
    }

    public function create()
    {
        $pekerjaans = Pekerjaan::all();
        $provinsis = Provinsi::all();
        return view('pembukaan-rekening.create', compact('pekerjaans', 'provinsis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'unique:pembukaan_rekenings', new NamaNasabahRule],
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pekerjaan_id' => 'required|exists:pekerjaans,id',
            'provinsi_id' => 'required|exists:provinsis,id',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'kelurahan_id' => 'required|exists:kelurahans,id',
            'nama_jalan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'nominal_setor' => 'required|numeric|min:0',
        ]);

        $rekening = new PembukaanRekening($request->all());
        $rekening->created_by = Auth::id();
        $rekening->save();

        return redirect()->route('pembukaan-rekening.index')->with('success', 'Pengajuan pembukaan rekening berhasil disimpan.');
    }

    public function show(PembukaanRekening $pembukaanRekening)
    {
        return view('pembukaan-rekening.show', compact('pembukaanRekening'));
    }
}