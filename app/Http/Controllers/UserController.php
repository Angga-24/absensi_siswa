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
}
