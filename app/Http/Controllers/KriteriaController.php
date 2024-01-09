<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    // Melihat data kriteria
    public function view()
    {
        $data = Kriteria::all();
        return view('admin.kriteria', compact('data'));
    }

    // Menyimpan data kriteria
    public function store(Request $request)
    {
        $data = new Kriteria;
        $data->nama_kriteria = $request->nama_kriteria;
        $data->bobot = $request->bobot;
        $data->atribut = $request->atribut;
        $data->save();
        return redirect('kriteria');
    }

    // Menghapus data kriteria
    public function delete($id)
    {
        $data = Kriteria::find($id);
        $data->delete();
        return redirect('kriteria');
    }

    public function update($id, Request $request)
    {
        $data = Kriteria::findOrFail($id);
        $data->nama_kriteria = $request->nama_kriteria;
        $data->bobot = $request->bobot;
        $data->atribut = $request->atribut;
        $data->update();
        return redirect('kriteria');
    }
}
