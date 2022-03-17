<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDerivedVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('derived_variables', function (Blueprint $table) {
            $table->id();
            $table->integer('turvar_id')->unique();
            $table->string('turvar');
            $table->integer('group_turvar_id')->nullable();
            $table->string('name_group_turvar')->nullable();
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
        Schema::dropIfExists('derived_variables');
    }
}
