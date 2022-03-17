<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDerivedPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('derived_periods', function (Blueprint $table) {
            $table->id();
            $table->integer('turth_id')->unique();
            $table->string('turth');
            $table->integer('group_turth_id')->nullable();
            $table->string('name_group_turth')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('derived_periods');
    }
}
