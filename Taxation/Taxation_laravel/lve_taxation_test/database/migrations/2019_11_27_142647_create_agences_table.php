<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agences', function (Blueprint $table) {
          $table->charset = 'utf8';
          $table->collation = 'utf8_general_ci';
            $table->string('AGENCE_COD');
            $table->string('AGENCE_LIB');
            $table->string('AGENCE_ADRESSE');
            $table->string('AGENCE_TEL');
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
        Schema::dropIfExists('agences');
    }
}