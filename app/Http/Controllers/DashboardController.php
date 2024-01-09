<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function view()
    {
        $data = Siswa::count();
        $hasil = Hasil::count();
        $kriteria = Kriteria::count();
        return view('admin.dashboard', compact('data', 'hasil', 'kriteria'));
    }
}
