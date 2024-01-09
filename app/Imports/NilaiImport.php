<?php

namespace App\Imports;

use App\Models\NilaiTest;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;

class NilaiImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {


        foreach ($rows as $row) {
            // dd($row[0]);
            $siswa = Siswa::where('nama', $row[0])->first();
            // dd($siswa->id);
            $idSiswa = $siswa ? $siswa->id : null;

            NilaiTest::firstOrCreate([
                'id_siswa' => $idSiswa,
                'dasar_komputer' => $row[1],
                'analogi' => $row[2],
                'penalaran' => $row[3],
                'numerik' => $row[4],
                'intelegensi' => $row[5],
                // Tambahkan kolom lainnya sesuai dengan struktur file Excel dan model Anda
            ]);
        }
    }
}
