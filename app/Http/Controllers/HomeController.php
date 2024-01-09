<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth = Auth::user()->username;
        $data = Siswa::join('hasils', 'siswa.id', '=', 'hasils.id_siswa')
            ->where('nomor_pendaftaran', '=', $auth)
            ->select('siswa.tahun_masuk')
            ->first();
        $rangking = Hasil::join('siswa', 'siswa.id', '=', 'hasils.id_siswa')
            ->where('siswa.tahun_masuk', $data->tahun_masuk)
            ->where('hasils.keterangan', 'onproses')
            ->orWhere('hasils.keterangan', 'valid')
            ->orderBy('hasil', 'desc')->get();
        return view('home', compact('rangking'));
    }

    public function result()
    {
        $auth = Auth::user()->username;
        $data = Siswa::join('hasils', 'siswa.id', '=', 'hasils.id_siswa')->where('nomor_pendaftaran', '=', $auth)->first();
        // dd($data);
        return view('user.result', compact('data'));
    }

    public function isLulus(Request $request, $id)
    {
        $data = Hasil::find($id);
        // dd($id);
        $data->keterangan = $request->keterangan;
        $data->update();
        return redirect('/result');
    }

    public function isTidak($id, Request $request)
    {
        $data = Hasil::find($id);
        $data->keterangan = $request->keterangan;
        $data->update();
        $preferensi = Hasil::join('siswa', 'siswa.id', '=', 'hasils.id_siswa')
            ->where('siswa.tahun_masuk', $request->tahun)
            ->where('hasils.keterangan', '0')
            ->select('hasils.id_hasil', 'hasils.id_siswa', 'hasils.hasil', 'hasils.keterangan')
            ->orderBy('hasil', 'desc')->take(1)->get();

        foreach ($preferensi as $value) {
            Hasil::where('id_hasil', $value['id_hasil'])->update([
                'id_siswa' => $value->id_siswa,
                'hasil' => $value->hasil,
                'keterangan' => 'onproses'
            ]);
        }
        return redirect('/result');
    }
}
