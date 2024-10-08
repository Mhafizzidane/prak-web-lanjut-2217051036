@extends('layouts.app')

@section('content')
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

<div class="blur-background"></div>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 24rem;">

        <!-- Tambahkan enctype multipart/form-data -->
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama :</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Nama">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="npm" class="form-label">NPM :</label>
                <input type="text" name="npm" class="form-control @error('npm') is-invalid @enderror" value="{{ old('npm') }}" placeholder="NPM">
                @error('npm')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas :</label>
                <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                    @foreach($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                            {{ $kelasItem->nama_kelas }}
                        </option>
                    @endforeach
                </select>
                @error('kelas_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tambahkan input untuk foto -->
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input class="form-control" type="file" id="foto" name="foto">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
