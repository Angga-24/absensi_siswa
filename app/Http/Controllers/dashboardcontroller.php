<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function dashboard()
    {
         return view('admin.dashboard',[
        'menu' => 'home'
         ]);
}
}