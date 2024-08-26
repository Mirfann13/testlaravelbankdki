<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembukaanRekening extends Model
{
    protected $fillable = [
        'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'pekerjaan_id',
        'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'kelurahan_id',
        'nama_jalan', 'rt', 'rw', 'nominal_setor', 'status', 'created_by', 'approved_by',
    ];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}