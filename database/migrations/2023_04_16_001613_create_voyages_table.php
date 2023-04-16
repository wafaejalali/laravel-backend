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
        Schema::create('voyages', function (Blueprint $table) {
            
            $table->unsignedBigInteger('id_voyage')->primary();
            $table->string('destination');
            $table->string('date_depart');
            $table->string('date_arrive');
            $table->string('duree');
            $table->string('consommation');
            $table->string('date_programmer');

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
        Schema::dropIfExists('voyages');
    }
};
