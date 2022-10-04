<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', '15');
            $table->tinyInteger('position_id');
            $table->Integer('height');
            $table->tinyInteger('weight');
            $table->tinyInteger('age');
            $table->tinyInteger('sex');
            $table->string('from', '15')->nullable;
            $table->text('video');
            $table->text('comment')->nullable;
            $table->tinyInteger('del_flg')->default(0);
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
        Schema::dropIfExists('players');
    }
}
