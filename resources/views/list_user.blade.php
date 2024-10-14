@extends('layouts.app')

@section('content')
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

<div class="blur-background"></div>

<div class="mb-3 mt-2 m-3">
    <a href="{{ route('user.create') }}" class="btn btn-success">Tambah User</a>
</div>

<div class="table-container mt-3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">NPM</th>
                <th scope="col">Kelas</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['nama'] }}</td>
                <td>{{ $user['npm'] }}</td>
                <td>{{ $user['nama_kelas'] }}</td>
                <td>
                    <img src="{{asset('upload/img/'. $user->foto)}}" alt="Foto User" width="100">
                </td>
                <td>
                    <a href="{{route('user.show', $user->id) }}" class=btn btn-warning mb-3>Detail</a>
                    <a href="{{route('user.edit', $user['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{route('user.destroy', $user['id']) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type = "submit" class = "btn btn-danger btn-sm" 
                        onclick= "return confirm('Apakah anda yakin ingin menghpus user ini?')">Delete</button> 
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
