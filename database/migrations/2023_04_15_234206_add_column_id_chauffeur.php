<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vahicules', function (Blueprint $table) {
            $table->unsignedBigInteger('id_chauffeur');
            $table->foreign('id_chauffeur')->references('id_chauffeur')->on('chauffeurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vahicules', function (Blueprint $table) {
            $table->unsignedBigInteger('id_chauffeur');
            $table->foreign('id_chauffeur')->references('id_chauffeur')->on('chauffeurs');
        });
    }
};
