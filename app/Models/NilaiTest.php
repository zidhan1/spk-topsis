<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTest extends Model
{
    use HasFactory;
    protected $table = 'nilai_test';
    protected $primaryKey = 'id';
    protected $fillable = ['id_siswa', 'dasar_komputer', 'analogi', 'penalaran', 'numerik', 'intelegensi'];
}
