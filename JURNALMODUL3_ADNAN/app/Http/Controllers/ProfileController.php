<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
# 1. Import model User agar dapat digunakan di dalam controller.
use App\Models\User;
class ProfileController extends Controller
{

    public function index()
    {
        $mahasiswa = User::first();
        return view('profil', compact('mahasiswa'));
    }

}
