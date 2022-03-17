<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTListDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('t_list_data', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kategori');
            $table->integer('id_sub_kategori');
            $table->integer('id_sumber_data');
            $table->string('nama_data');
            $table->string('url_data');
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::connection('mysql')->dropIfExists('t_list_data');
    }
}
