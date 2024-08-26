@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar User Terblokir</h2>

    @if($blockedUsers->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            Tidak ada data
        </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blockedUsers as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('unblock.user', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-primary">Buka Blokir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
