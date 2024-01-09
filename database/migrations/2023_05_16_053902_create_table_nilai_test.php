<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNilaiTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_test', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_siswa');
            $table->integer('dasar_komputer');
            $table->integer('analogi');
            $table->integer('penalaran');
            $table->integer('numerik');
            $table->integer('intelegensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_nilai_test');
    }
}
