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


    public function create(){
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
        'foto' =>
        'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('foto')) {

        $foto = $request->file('foto');
        $filename = time(). '_' . $foto->getClientOriginalName();
        $fotoPath = $foto->move(public_path('upload/img'), $filename);
    } else {
        $fotoPath = null;
    }

    $this->userModel->create([
        'nama' => $request->input('nama'),
        'npm' => $request->input('npm'),
        'kelas_id' => $request->input('kelas_id'),
        'foto' => $filename,    
    ]);
    return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id){
        $user = $this-> userModel-> getUser($id);

        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];

        return view('profile', $data);
    }

    public function edit($id){
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel -> getKelas();
        $title = 'Edit.user';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id){
        $user = UserModel::findOrFail($id);

        $user->nama=$request ->nama;
        $user->npm=$request ->npm;
        $user->kelas_id=$request ->kelas_id;

        if($request->hasFile('foto')){
            $filename=time() . '_' . $request ->foto->extension();
            $request ->foto->move(public_path('upload/img'), $filename);
            $user->foto = $filename;
        }

        $user->save();

        return redirect()->to('/user')->with('success', 'User Update Successfully');
    }

    public function destroy($id){
        $user=UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('user/')->with('success', 'User has been delete successfully');
    }
}