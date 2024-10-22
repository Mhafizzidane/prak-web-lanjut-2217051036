@extends('layouts.app')

@section('content')
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

<div class="blur-background"></div>

<div class="mb-3 mt-2 m-3">
    <a href="{{ route('user.create') }}" class="btn btn-success">Tambah User</a>
</div>

<div class="d-flex flex-wrap justify-content-center">
    @foreach ($users as $user)
    <div class="card m-3" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('upload/img/' . $user->foto) }}" alt="Foto {{ $user->nama }}" style="height: 200px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title">{{ $user->nama }}</h5>
            <p class="card-text">
                <strong>NPM:</strong> {{ $user->npm }}<br>
                <strong>Kelas:</strong> {{ $user->kelas->nama_kelas ?? 'Kelas Tidak Ditemukan' }}<br>
                <strong>Jurusan:</strong> {{ $user->jurusan ?? 'Tidak ada data' }}<br>
                <strong>Semester:</strong> {{ $user->semester ?? 'Tidak ada data' }}<br>
            </p>
            <a href="{{route('user.show', $user->id) }}" class=btn btn-warning mb-3>Detail</a>
            <a href="{{route('user.edit', $user['id']) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{route('user.destroy', $user['id']) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

@endsection
