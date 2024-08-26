@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="text-center">Welcome to Bank DKI - Sistem Pembukaan Rekening</h3>
    </div>
    <div class="card-body">
        <p class="text-center">Hello, {{ Auth::user()->name }}. Welcome to your dashboard.</p>
        <p class="text-center">Use the navigation menu to manage account openings or approve applications.</p>
    </div>
</div>
@endsection
