<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitFlightsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('code', 3)->unique();
            $table->double('lat');
            $table->double('lng');
        });

        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->char('code_departure', 3);
            $table->char('code_arrival', 3);
            $table->decimal('price', 9, 2);

            /*
            $table->foreign('code_departure')->references('code')->on('airports')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('code_arrival')->references('code')->on('airports')
                  ->onDelete('cascade')->onUpdate('cascade');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('flights');
        Schema::drop('airports');
    }
}
