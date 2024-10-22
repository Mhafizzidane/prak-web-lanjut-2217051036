<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

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

        // Mengambil data kelas menggunakan method getKelas
        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'jurusan' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:8', 
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $fotoPath = $foto->move(public_path('upload/img'), $filename);
        } else {
            $filename = null;
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'jurusan' => $request->input('jurusan'), 
            'semester' => $request->input('semester'),
            'foto' => $filename,
        ]);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id)
    {
        $user = UserModel::findOrFail($id);
        $kelas = Kelas::find($user->kelas_id);

        $title = 'Detail ' . $user->nama;
        return view('profile', compact('user', 'kelas', 'title'));
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'jurusan' => 'required|string|max:255', 
            'semester' => 'required|integer|min:1|max:8', 
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $filename = time() . '_' . $request->foto->extension();
            $request->foto->move(public_path('upload/img'), $filename);
            $user->foto = $filename;
        }

        $user->nama = $request->input('nama');
        $user->npm = $request->input('npm');
        $user->kelas_id = $request->input('kelas_id');
        $user->jurusan = $request->input('jurusan'); 
        $user->semester = $request->input('semester'); 

        $user->save();

        return redirect()->to('/user')->with('success', 'User berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('/user/')->with('success', 'User berhasil dihapus');
    }
}
