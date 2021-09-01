<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csvs', function (Blueprint $table) {
            $table->id();
            $table->text('date');
            $table->text('trade_code');
            $table->float('high');
            $table->float('low');
            $table->float('open');
            $table->float('close');
            $table->double('volume');
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
        Schema::dropIfExists('csvs');
    }
}
