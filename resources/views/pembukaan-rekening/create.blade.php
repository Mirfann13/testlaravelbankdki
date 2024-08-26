@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Tambah Pengajuan Pembukaan Rekening</div>
            <div class="card-body">
                <form method="POST" action="{{ route('pembukaan-rekening.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') }}" required>
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan_id" class="form-label">Pekerjaan</label>
                        <select id="pekerjaan_id" name="pekerjaan_id" class="form-select @error('pekerjaan_id') is-invalid @enderror" required>
                            <option value="">Pilih Pekerjaan</option>
                            @foreach ($pekerjaans as $pekerjaan)
                                <option value="{{ $pekerjaan->id }}" {{ old('pekerjaan_id') == $pekerjaan->id ? 'selected' : '' }}>{{ $pekerjaan->nama }}</option>
                            @endforeach
                        </select>
                        @error('pekerjaan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="provinsi_id" class="form-label">Provinsi</label>
                        <select id="provinsi_id" name="provinsi_id" class="form-select @error('provinsi_id') is-invalid @enderror" required>
                            <option value="">Pilih Provinsi</option>
                            @foreach ($provinsis as $provinsi)
                                <option value="{{ $provinsi->id }}" {{ old('provinsi_id') == $provinsi->id ? 'selected' : '' }}>{{ $provinsi->nama }}</option>
                            @endforeach
                        </select>
                        @error('provinsi_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kabupaten_id" class="form-label">Kabupaten</label>
                        <select id="kabupaten_id" name="kabupaten_id" class="form-select @error('kabupaten_id') is-invalid @enderror" required>
                            <option value="">Pilih Kabupaten</option>
                        </select>
                        @error('kabupaten_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kecamatan_id" class="form-label">Kecamatan</label>
                        <select id="kecamatan_id" name="kecamatan_id" class="form-select @error('kecamatan_id') is-invalid @enderror" required>
                            <option value="">Pilih Kecamatan</option>
                        </select>
                        @error('kecamatan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kelurahan_id" class="form-label">Kelurahan</label>
                        <select id="kelurahan_id" name="kelurahan_id" class="form-select @error('kelurahan_id') is-invalid @enderror" required>
                            <option value="">Pilih Kelurahan</option>
                        </select>
                        @error('kelurahan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_jalan" class="form-label">Nama Jalan</label>
                        <input type="text" id="nama_jalan" name="nama_jalan" class="form-control @error('nama_jalan') is-invalid @enderror" value="{{ old('nama_jalan') }}">
                        @error('nama_jalan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="rt" class="form-label">RT</label>
                        <input type="text" id="rt" name="rt" class="form-control @error('rt') is-invalid @enderror" value="{{ old('rt') }}">
                        @error('rt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="rw" class="form-label">RW</label>
                        <input type="text" id="rw" name="rw" class="form-control @error('rw') is-invalid @enderror" value="{{ old('rw') }}">
                        @error('rw')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nominal_setor" class="form-label">Nominal Setor</label>
                        <input type="number" id="nominal_setor" name="nominal_setor" class="form-control @error('nominal_setor') is-invalid @enderror" value="{{ old('nominal_setor') }}" step="0.01" required>
                        @error('nominal_setor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const provinsiSelect = document.getElementById('provinsi_id');
                const kabupatenSelect = document.getElementById('kabupaten_id');
                const kecamatanSelect = document.getElementById('kecamatan_id');
                const kelurahanSelect = document.getElementById('kelurahan_id');

                provinsiSelect.addEventListener('change', function() {
                    const provinsiId = this.value;
                    kabupatenSelect.innerHTML = '<option value="">Pilih Kabupaten</option>'; // Clear options
                    kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>'; // Clear options
                    kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>'; // Clear options

                    if (provinsiId) {
                        fetch(`/api/kabupaten/${provinsiId}`)
                            .then(response => response.json())
                            .then(data => {
                                data.forEach(item => {
                                    kabupatenSelect.innerHTML += `<option value="${item.id}">${item.nama}</option>`;
                                });
                            });
                    }
                });

                kabupatenSelect.addEventListener('change', function() {
                    const kabupatenId = this.value;
                    kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>'; // Clear options
                    kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>'; // Clear options

                    if (kabupatenId) {
                        fetch(`/api/kecamatan/${kabupatenId}`)
                            .then(response => response.json())
                            .then(data => {
                                data.forEach(item => {
                                    kecamatanSelect.innerHTML += `<option value="${item.id}">${item.nama}</option>`;
                                });
                            });
                    }
                });

                kecamatanSelect.addEventListener('change', function() {
                    const kecamatanId = this.value;
                    kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>'; // Clear options

                    if (kecamatanId) {
                        fetch(`/api/kelurahan/${kecamatanId}`)
                            .then(response => response.json())
                            .then(data => {
                                data.forEach(item => {
                                    kelurahanSelect.innerHTML += `<option value="${item.id}">${item.nama}</option>`;
                                });
                            });
                    }
                });
            });
        </script>
    @endpush
@endsection
