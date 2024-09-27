<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama'=> $nama,
            'kelas'=> $kelas,
            'npm'=> $npm,
        ];
        return view('profile', $data);
    }

    public function create()
    {
        return view('create_user', [
            'kelas' => Kelas::all(),
        ]);
    }

    public function store(UserRequest $request)
    {
        $validatedData = $request->validated();

        $user = UserModel::create($validatedData);

        $user->load('kelas');

        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        ]);
    }
}