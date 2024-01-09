<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\DataTables\SiswaDataTable;

class SiswaController extends Controller
{
    // Melihat data siswa
    public function view(SiswaDataTable $dataTable)
    {
        $data =  Siswa::orderBy('tahun_masuk', 'asc')->orderBy('nama', 'asc')->get();
        $date = date('md H:i:s');
        $newDateFormat = \Carbon\Carbon::createFromFormat('md H:i:s', $date)->format('mY');
        return $dataTable->render('admin.siswa', compact('data', 'newDateFormat'));
    }

    // Menambah data siswa
    public function store(Request $request)
    {
        $data = new Siswa;
        $data->nama = $request->nama;
        $data->agama = $request->agama;
        $data->alamat = $request->alamat;
        $data->tahun_masuk = $request->tahun_masuk;
        $data->nomor_pendaftaran = $request->nomor_pendaftaran;
        $data->save();

        $login = [
            'name' => $request->nama,
            'email' => null,
            'username' => $request->nomor_pendaftaran,
            'password' => Hash::make($request->nomor_pendaftaran),
            'role' => '0',
        ];
        User::create($login);

        return redirect('/siswa');
    }

    // Mengupdate data siswa
    public function update(Request $request, $id)
    {
        $data = Siswa::find($id);
        $data->nama = $request->nama;
        $data->agama = $request->agama;
        $data->alamat = $request->alamat;
        $data->nomor_pendaftaran = $request->nomor_pendaftaran;
        $data->tahun_masuk = $request->tahun_masuk;
        $data->update();
        return redirect('/siswa');
    }

    // Menghapus data siswa
    public function delete($id)
    {
        $data = Siswa::find($id);
        $data->delete();

        User::where('username', '=', $data->nomor_pendaftaran)->delete();
        return redirect('/siswa');
    }
}
