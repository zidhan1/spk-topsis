<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\NilaiTest;
use App\Models\Penilaian;
use App\Imports\NilaiImport;
use Illuminate\Http\Request;
use App\DataTables\SiswaDataTable;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class PenilaianController extends Controller
{
    public function view(SiswaDataTable $dataTable)
    {
        $siswa = Siswa::join('penilaian', 'penilaian.id_siswa', '=', 'siswa.id')->get();
        $tahun = Siswa::all();
        return $dataTable->render('admin.alternatif', compact('siswa', 'tahun'));
    }

    public function detail($id)
    {
        $nilai = Penilaian::where('id_siswa', '=', $id)->get();
        $siswa = Siswa::where('id', '=', $id)->first();

        return view('admin.detailNilai', compact('nilai', 'siswa'));
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        // dd($file);

        // Baca data dari file excel
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();

        // Baca data dari file excel
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();

        // Dapatkan indeks kolom terakhir
        $lastColumnIndex = $sheet->getHighestColumn();
        $lastColumnNumber = Coordinate::columnIndexFromString($lastColumnIndex);



        // Mendapatkan nilai dari seluruh siswa from import excel
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 1; $j < $lastColumnNumber; $j++) {
                $nilai_siswa[$i][$j] = $data[$i][$j];
            }
        }

        // Array untuk menyimpan nilai rata-rata per kolom
        $rata_rata_per_kolom = [];

        // Looping kolom
        for ($j = 1; $j < $lastColumnNumber; $j++) {
            $nilai_kolom = [];

            // Looping baris data
            for ($i = 0; $i < count($data); $i++) {
                $nilai_kolom[] = $data[$i][$j];
            }

            // Hitung nilai rata-rata kolom
            $rata_rata = array_sum($nilai_kolom) / count($nilai_kolom);

            // Simpan nilai rata-rata ke array
            $rata_rata_per_kolom[$j] = $rata_rata;
        }



        function konversiNilai($nilai, $rata_rata)
        {
            // Lakukan konversi nilai berdasarkan nilai rata-rata
            $toleransi = 10.1;
            if (($rata_rata >= 110.3571429) <= $toleransi) {
                if ($nilai <= 30) {
                    return '1';
                } elseif ($nilai <= 60) {
                    return '2';
                } elseif ($nilai <= 90) {
                    return '3';
                } elseif ($nilai <= 120) {
                    return '4';
                } elseif ($nilai <= 150) {
                    return '5';
                } else {
                    return '5';
                }
            } else {
                if ($nilai <= 70) {
                    return '1';
                } elseif ($nilai <= 140) {
                    return '2';
                } elseif ($nilai <= 210) {
                    return '3';
                } elseif ($nilai <= 280) {
                    return '4';
                } elseif ($nilai <= 350) {
                    return '5';
                } else {
                    return '5';
                }
            }
        }

        // Looping baris data
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 1; $j < $lastColumnNumber; $j++) {
                $nilai_siswa[$i][$j] = konversiNilai($data[$i][$j], $rata_rata_per_kolom[$j]);
            }
        }

        // Excel::import(new NilaiImport, $file);

        $kriteria = Kriteria::all();
        foreach ($kriteria as $key => $value) {
            $id_kriteria[] = $value['id_kriteria'];
        }

        $data = Siswa::where('siswa.tahun_masuk', '=', $request->tahun_masuk)->get();

        foreach ($data as $value) {
            $id_siswa[] = $value['id'];
        }

        // dd($nilai_siswa);
        // Memasukkan Kedalam database
        for ($i = 0; $i < count($data); $i++) {
            $idSiswa = $id_siswa[$i]; // Ambil id siswa dari kolom pertama (misalnya kolom indeks 0)

            // Looping kolom nilai
            for ($j = 1; $j < $lastColumnNumber; $j++) {
                $idKriteria = $id_kriteria[$j - 1]; // Ambil id kriteria dari array kriteria
                $nilai = $nilai_siswa[$i][$j]; // Ambil nilai siswa

                // Simpan data ke dalam tabel penilaian
                DB::table('penilaian')->insert([
                    'id_siswa' => $idSiswa,
                    'id_kriteria' => $idKriteria,
                    'nilai' => $nilai,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Data imported successfully.');
    }

    public function insert($id)
    {
        $siswa = Siswa::find($id);
        $kriteria = Kriteria::all();
        $penilaian = Penilaian::where('id_siswa', '=', $id)->get();
        $nilai_test = NilaiTest::where('id_siswa', '=', $id)->get();
        // dd($penilaian);
        return view('admin.insertalternatif', compact('siswa', 'kriteria', 'penilaian', 'nilai_test'));
    }

    public function delete($id)
    {
        // Menggunakan Query Builder
        // DB::table('penilaian')->whereIn('id_siswa', $id)->delete();
        $data = Penilaian::where('id_siswa', $id)->get();
        foreach ($data as $item) {
            $item->delete();
        }

        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
