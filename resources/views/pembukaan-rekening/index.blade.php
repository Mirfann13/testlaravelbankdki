@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('pembukaan-rekening.create') }}" class="btn btn-primary">Tambah Pengajuan</a>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">Daftar Pengajuan Pembukaan Rekening</div>
            <div class="card-body">
                @if ($rekenings->isEmpty())
                    <p>Tidak ada data untuk ditampilkan.</p>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekenings as $rekening)
                                <tr>
                                    <td>{{ $rekening->nama }}</td>
                                    <td>{{ $rekening->tempat_lahir }}</td>
                                    <td>
                                        @if ($rekening->tanggal_lahir)
                                            {{ \Carbon\Carbon::parse($rekening->tanggal_lahir)->format('Y-m-d') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $rekening->jenis_kelamin }}</td>
                                    <td>{{ $rekening->status }}</td>
                                    <td>
                                        <a href="{{ route('pembukaan-rekening.show', $rekening) }}" class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
