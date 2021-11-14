<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConjunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conjunctions', function (Blueprint $table) {
            $table->id();
            $table->integer('nip');
            $table->double('write_low', 4);
            $table->double('write_mid', 4);
            $table->double('write_high', 4);
            $table->double('practice_low', 4);
            $table->double('practice_mid', 4);
            $table->double('practice_high', 4);
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
        Schema::dropIfExists('conjunctions');
    }
}
