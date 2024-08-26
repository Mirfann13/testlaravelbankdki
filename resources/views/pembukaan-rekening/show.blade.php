@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Detail Pengajuan Pembukaan Rekening</div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nama:</strong>
                    <p>{{ $pembukaanRekening->nama }}</p>
                </div>

                <div class="mb-3">
                    <strong>Tempat Lahir:</strong>
                    <p>{{ $pembukaanRekening->tempat_lahir }}</p>
                </div>

                <div class="mb-3">
                    <strong>Tanggal Lahir:</strong>
                    <p> 
                        @if ($pembukaanRekening->tanggal_lahir)
                            {{ \Carbon\Carbon::parse($pembukaanRekening->tanggal_lahir)->format('d-m-Y') }}
                        @else
                            -
                        @endif
                    </p>
                </div>

                <div class="mb-3">
                    <strong>Jenis Kelamin:</strong>
                    <p>{{ $pembukaanRekening->jenis_kelamin }}</p>
                </div>

                <div class="mb-3">
                    <strong>Pekerjaan:</strong>
                    <p>{{ $pembukaanRekening->pekerjaan->nama }}</p>
                </div>

                <div class="mb-3">
                    <strong>Provinsi:</strong>
                    <p>{{ $pembukaanRekening->provinsi->nama }}</p>
                </div>

                <div class="mb-3">
                    <strong>Kabupaten:</strong>
                    <p>{{ $pembukaanRekening->kabupaten->nama }}</p>
                </div>

                <div class="mb-3">
                    <strong>Kecamatan:</strong>
                    <p>{{ $pembukaanRekening->kecamatan->nama }}</p>
                </div>

                <div class="mb-3">
                    <strong>Kelurahan:</strong>
                    <p>{{ $pembukaanRekening->kelurahan->nama }}</p>
                </div>

                <div class="mb-3">
                    <strong>Alamat:</strong>
                    <p>{{ $pembukaanRekening->alamat }}</p>
                </div>

                <div class="mb-3">
                    <strong>RT:</strong>
                    <p>{{ $pembukaanRekening->rt }}</p>
                </div>

                <div class="mb-3">
                    <strong>RW:</strong>
                    <p>{{ $pembukaanRekening->rw }}</p>
                </div>

                <div class="mb-3">
                    <strong>Nominal Setor:</strong>
                    <p>{{ number_format($pembukaanRekening->nominal_setor, 0, ',', '.') }}</p>
                </div>

                <a href="{{ route('pembukaan-rekening.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
