@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Daftar Pengajuan Pembukaan Rekening Menunggu Approval</div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($rekenings->isEmpty())
                    <p>Tidak ada pengajuan menunggu approval.</p>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekenings as $rekening)
                                <tr>
                                    <td>{{ $rekening->nama }}</td>
                                    <td>{{ $rekening->tempat_lahir }}</td>
                                    <td>{{ \Carbon\Carbon::parse($rekening->tanggal_lahir)->format('Y-m-d') }}</td>
                                    <td>{{ $rekening->jenis_kelamin }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('approval.approve', $rekening) }}" style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                        </form>
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
