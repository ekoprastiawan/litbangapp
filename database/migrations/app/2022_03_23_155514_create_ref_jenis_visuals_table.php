<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefJenisVisualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('ref_jenis_visuals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis_visual');
            $table->string('tipe');
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
        Schema::connection('mysql')->dropIfExists('ref_jenis_visuals');
    }
}
