<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function index()
    {
        $pekerjaans = Pekerjaan::all();
        return view('pekerjaan.index', compact('pekerjaans'));
    }

    public function create()
    {
        return view('pekerjaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:pekerjaans',
        ]);

        Pekerjaan::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('pekerjaan.index')->with('success', 'Pekerjaan berhasil ditambahkan.');
    }

    public function edit(Pekerjaan $pekerjaan)
    {
        return view('pekerjaan.edit', compact('pekerjaan'));
    }

    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:pekerjaans,nama,' . $pekerjaan->id,
        ]);

        $pekerjaan->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('pekerjaan.index')->with('success', 'Pekerjaan berhasil diperbarui.');
    }

    public function destroy(Pekerjaan $pekerjaan)
    {
        $pekerjaan->delete();

        return redirect()->route('pekerjaan.index')->with('success', 'Pekerjaan berhasil dihapus.');
    }
}
