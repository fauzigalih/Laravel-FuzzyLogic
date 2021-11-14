<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('write_low');
            $table->integer('write_low_mid');
            $table->integer('write_high_mid');
            $table->integer('write_high');

            $table->integer('practice_low');
            $table->integer('practice_low_mid');
            $table->integer('practice_high_mid');
            $table->integer('practice_high');

            $table->integer('graduate_low');
            $table->integer('graduate_high_mid');
            $table->integer('graduate_low_mid');
            $table->integer('graduate_high');

            $table->string('graduate_not', 20);
            $table->string('graduate_yes', 20);
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
        Schema::dropIfExists('settings');
    }
}
