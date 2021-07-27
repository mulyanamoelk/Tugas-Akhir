<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Data Pengguna';
        $data['q'] = $request->q;
        $data['rows'] = User::where('nama_pengguna', 'like', '%' . $request->q . '%')->get();
        return view('comment.index', $data);
    }
     public function create(Request $request)
    {
        $data['title'] = 'Tambah User';
        $data['levels'] = ['admin' => 'Admin', 'user' => 'User'];
        return view('pengguna.create', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'email' => 'required|unique:tb_pengguna',
            'password' => 'required',
            'level' => 'required',
        ]);

        $pengguna = new User();
        $pengguna->nama_pengguna = $request->nama_pengguna;
        $pengguna->email = $request->email;
        $pengguna->password = Hash::make($request->password);
        $pengguna->level = $request->level;
        $pengguna->save();
        return redirect('pengguna')->with('success', 'Tambah Data Berhasil');
    }
     public function show(User $pengguna)
    {
    }
    public function edit(User $pengguna)
    {
        $data['title'] = 'Ubah User';
        $data['row'] = $pengguna;
        $data['levels'] = ['admin' => 'Admin', 'user' => 'User'];
        return view('pengguna.edit', $data);
    }
    public function update(Request $request, User $pengguna)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'email' => 'required',
            'level' => 'required',
        ]);

        $pengguna->nama_pengguna = $request->nama_pengguna;
        $pengguna->email = $request->email;
        if ($request->password)
            $pengguna->password = Hash::make($request->password);
        $pengguna->level = $request->level;
        $pengguna->save();
        return redirect('pengguna')->with('success', 'Ubah Data Berhasil');
    }
     public function destroy(User $pengguna)
    {
        $pengguna->delete();
        return redirect('pengguna')->with('success', 'Hapus Data Berhasil');
    }

}
