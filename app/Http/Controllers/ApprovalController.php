<?php

namespace App\Http\Controllers;

use App\Models\PembukaanRekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PembukaanRekeningApproved;

class ApprovalController extends Controller
{
    public function index()
    {
        $rekenings = PembukaanRekening::where('status', 'Menunggu Approval')->get();
        return view('approval.index', compact('rekenings'));
    }

    public function approve(Request $request, $id)
    {
        $rekening = PembukaanRekening::findOrFail($id);
        $rekening->status = 'Disetujui';
        $rekening->approved_by = Auth::id();
        $rekening->save();

        // Kirim notifikasi ke CS
        $rekening->createdBy->notify(new PembukaanRekeningApproved($rekening));

        return redirect()->route('approval.index')->with('success', 'Pengajuan pembukaan rekening berhasil disetujui.');
    }
}