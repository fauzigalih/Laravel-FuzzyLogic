<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisjunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disjunctions', function (Blueprint $table) {
            $table->id();
            $table->integer('nip');
            $table->double('write_low');
            $table->double('write_mid');
            $table->double('practice_low');
            $table->double('practice_mid');
            $table->double('graduate_not');
            $table->double('graduate_yes');
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
        Schema::dropIfExists('disjunctions');
    }
}
