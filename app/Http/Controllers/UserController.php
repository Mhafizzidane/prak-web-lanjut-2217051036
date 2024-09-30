<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }

    public function create()
    {
        $kelasModel = new Kelas();

        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(UserRequest $request)
    {
    $validatedData = $request->validated();

    $this->userModel->create([
        'nama' => $validatedData['nama'],
        'npm' => $validatedData['npm'],
        'kelas_id' => $validatedData['kelas_id'],
    ]);

    return redirect()->to('/user')->with('success', 'Data berhasil disimpan!');
    }
}