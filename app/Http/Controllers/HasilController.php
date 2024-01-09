<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Hasil;
use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Support\ValidatedData;

class HasilController extends Controller
{
    //
    public function view(Request $request)
    {

        $validatedData = $request->validate([
            'tahun_masuk' => ['required'],
            'jml_siswa' => ['required',],
        ]);

        $jml_siswa = $request->jml_siswa;
        $param = $request->tahun_masuk;
        // Menginisiasi variabel
        $isi_alternatif = Siswa::where('tahun_masuk', '=', $param)->get();
        foreach ($isi_alternatif as $keyT => $dataT) {
            $id_siswa[] = $dataT->id;
        }
        $isi_kriteria = Kriteria::all();
        foreach ($isi_kriteria as $keyK => $dataK) {
            $id_kriteria[] = $dataK->id_kriteria;
            $bobot[] =  $dataK->bobot;
            $atribut[] = $dataK->atribut;
        }

        $kriteria = Kriteria::count();
        $alternatif = Siswa::where('tahun_masuk', '=', $param)->count();

        // Menentukan Pembagi Setiap Kriteria
        for ($baris = 0; $baris < $kriteria; $baris++) {
            for ($kolom = 0; $kolom < $alternatif; $kolom++) {
                $nilai[$baris][$kolom] = pow(\App\Helper::nilai($id_siswa[$kolom], $id_kriteria[$baris]), 2);
            }
            $pembagi[$baris] = sqrt(array_sum($nilai[$baris]));
            // $pembagi[$baris];
        }

        // TAHAP 1 MEMBUAT MATRIKS KEPUTUSAN TERNORMALISASI
        for ($baris = 0; $baris < $kriteria; $baris++) {
            for ($kolom = 0; $kolom < $alternatif; $kolom++) {
                $nilai[$baris][$kolom] = \App\Helper::nilai($id_siswa[$kolom], $id_kriteria[$baris]);
                $nilai[$baris][$kolom] = $nilai[$baris][$kolom] / $pembagi[$baris];
                $ternormalisasi[$baris][$kolom] = $nilai[$baris][$kolom];
            }
        }

        // dd($pembagi);
        // dd($ternormalisasi);

        // TAHAP 2 MENGHITUNG MATRIKS KEPUTUSAN TERNORMALISASI DAN TERBOBOT
        for ($baris = 0; $baris < $kriteria; $baris++) {
            for ($kolom = 0; $kolom < $alternatif; $kolom++) {
                $nilai[$baris][$kolom] = $nilai[$baris][$kolom] * $bobot[$baris];
                $terbobot[$baris][$kolom] = $nilai[$baris][$kolom];
            }
        }
        // dd($terbobot);

        // TAHAP 3 MENCARI NILAI SOLUSI IDEAL POSITIF (MAKS) DAN SOLUSI IDEAL NEGATIF (MIN)
        for ($baris = 0; $baris < $kriteria; $baris++) {
            for ($kolom = 0; $kolom < $alternatif; $kolom++) {
                if ($atribut[$baris] == 1) {
                    $maks[$baris] = max($nilai[$baris]);
                    $min[$baris] = min($nilai[$baris]);
                } elseif ($atribut[$baris] == 2) {
                    $maks[$baris] = min($nilai[$baris]);
                    $min[$baris] = max($nilai[$baris]);
                }
            }
        }

        // TAHAP 4 MENCARI D+ DAN D- UNTUK SETIAP ALTERNATIF
        for ($baris = 0; $baris < $alternatif; $baris++) {
            for ($kolom = 0; $kolom < $kriteria; $kolom++) {
                $d_plus_1[$baris][$kolom] = pow($maks[$kolom] - $nilai[$kolom][$baris], 2);
                $d_min_1[$baris][$kolom] = pow($nilai[$kolom][$baris] - $min[$kolom], 2);
            }
            $d_plus_2[] = sqrt(array_sum($d_plus_1[$baris]));
            $d_min_2[] = sqrt(array_sum($d_min_1[$baris]));
        }
        // dd($d_plus_1);


        // TAHAP 5 MENCARI HASIL PREFERENSI
        for ($i = 0; $i < $alternatif; $i++) {
            $hasil[$i] = $d_min_2[$i] / ($d_min_2[$i] + $d_plus_2[$i]);

            $data = Hasil::firstOrNew(array('id_siswa' => $id_siswa[$i]));
            $data['id_siswa'] = $id_siswa[$i];
            $data['hasil'] = $hasil[$i];
            $data->save();
        }


        // Urutkan preferensi dari terbesar ke terkecil
        $preferensi = Hasil::join('siswa', 'siswa.id', '=', 'hasils.id_siswa')->where('siswa.tahun_masuk', $param)
            ->select('hasils.id_hasil', 'hasils.id_siswa', 'hasils.hasil', 'hasils.keterangan')->orderBy('hasil', 'desc')->take($jml_siswa)->get();

        foreach ($preferensi as $value) {
            Hasil::where('id_hasil', $value['id_hasil'])->update([
                'id_siswa' => $value->id_siswa,
                'hasil' => $value->hasil,
                'keterangan' => 'onproses'
            ]);
        }


        // MERANGKING ALTERNATIF
        $rangking = Hasil::join('siswa', 'siswa.id', '=', 'hasils.id_siswa')->where('siswa.tahun_masuk', $param)->orderBy('hasil', 'desc')->get();
        return view('admin.detailhasil', compact('rangking', 'isi_alternatif', 'isi_kriteria', 'kriteria', 'alternatif', 'ternormalisasi', 'terbobot', 'maks', 'min', 'd_plus_2', 'd_min_2'));
    }

    public function rangking(Request $request)
    {

        $tahun = Siswa::select('tahun_masuk')->distinct()->get();
        $rangking = Hasil::join('siswa', 'siswa.id', '=', 'hasils.id_siswa')
            ->where('siswa.tahun_masuk', '=', $request->tahun_masuk)
            ->where(function ($query) {
                $query->where('hasils.keterangan', '=', 'valid')
                    ->orWhere('hasils.keterangan', '=', 'onproses');
            })
            ->orderBy('hasil', 'desc')
            ->get();
        return view('admin.hasil', compact('rangking', 'tahun'));
    }

    public function viewtahun()
    {
        $tahun = Siswa::select('tahun_masuk')->distinct()->get();
        return view('admin.hasil2', compact('tahun'));
    }

    public function isLulus(Request $request, $id)
    {
        $data = Hasil::find($id);
        // dd($id);
        $data->keterangan = $request->keterangan;
        $data->update();
        return redirect('/hasil');
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
        return redirect('/hasil');
    }

    public function delete($id)
    {
        $data = Hasil::find($id);
        $data->delete();
        return redirect('/hasil');
    }

    public function generatePDF($tahun)
    {
        // Data yang ingin dicetak
        $data = Hasil::join('siswa', 'siswa.id', '=', 'hasils.id_siswa')
            ->where('siswa.tahun_masuk', '=', $tahun)
            ->where(function ($query) {
                $query->where('hasils.keterangan', '=', 'valid')
                    ->orWhere('hasils.keterangan', '=', 'onproses');
            })
            ->get();


        $pdfView = view('admin.hasilpdf', compact('data'))->render();

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load the HTML content into Dompdf
        $dompdf->loadHtml($pdfView);

        // (Optional) Set the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML content to PDF
        $dompdf->render();

        // Output the generated PDF to the browser
        $dompdf->stream('file.pdf');
    }
}
