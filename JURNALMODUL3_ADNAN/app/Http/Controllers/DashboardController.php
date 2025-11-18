<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
# 1. Import model User agar dapat digunakan di dalam controller.
use App\Models\User;
class DashboardController extends Controller
{

    public function index()
    {
        $mahasiswa = User::first();
        $hours = date('H');
        $tanggal = $this->getTanggal();
        $salam = match (true) {
            $hours >= 5 && $hours < 12 => "Selamat Pagi",
            $hours >= 12 && $hours < 5 => "Selamat Siang ",
            $hours >= 5 && $hours <18 => "Selamat Sore",
            default => "Selamat Malam"
        };

        $accessTime = date("H:i:s");
        return view('dashboard', compact('mahasiswa', 'tanggal', 'salam', 'accessTime'));
    }
    # 7. Buat method private getTanggal() untuk menghasilkan tanggal saat ini dalam format dd-mm-yyyy.
    private function getTanggal() 
    {
        return date('d-m-Y');
    }
}
