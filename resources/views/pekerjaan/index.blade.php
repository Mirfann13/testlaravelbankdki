@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pekerjaan</h2>
    <a href="{{ route('pekerjaan.create') }}" class="btn btn-primary mb-3">Tambah Pekerjaan</a>

    @if($pekerjaans->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            Tidak ada data
        </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pekerjaans as $pekerjaan)
                <tr>
                    <td>{{ $pekerjaan->nama }}</td>
                    <td>
                        <a href="{{ route('pekerjaan.edit', $pekerjaan) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pekerjaan.destroy', $pekerjaan) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
