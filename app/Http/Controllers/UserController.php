<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', [
            'menu' => 'user',
            'title' => 'Data user',
            'user' => $user
        ]);
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.show', [
            'menu' => 'user',
            'title' => 'Detail Data user',
            'user' => $user
        ]);
    }

    public function create()
    {
        
        return view('admin.user.create', [
            'menu' => 'user',
            'title' => 'Tambah Data Siswa',
            
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([

            'username' => 'required',
            'password' => 'required',
            'level' => 'nullable'
        ], [
            
            'username.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            
        ]);

        $user = new User();
        $user->username = $validasi['username'];
        $user->password = bcrypt($validasi['password']);
        $user->level = 'admin'; 
        $user->save();

        return redirect(route('user.index'));
    }

    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect(route('user.index'));
    }
}
