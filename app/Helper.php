<?php

namespace App;

use App\Models\Penilaian;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
	public static function nilai($alternatif, $kriteria)
	{
		$data = Penilaian::where('id_siswa', $alternatif)->where('id_kriteria', $kriteria)->orderBy('nilai', 'ASC')->get();
		foreach ($data as $key => $value) {
			return $value->nilai;
		}
	}

	public static function siswa($alternatif)
	{
		$data = Siswa::where('id', $alternatif)->get();
		foreach ($data as $key => $value) {
			return $value->siswa;
		}
	}
}
