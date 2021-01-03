<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Constellation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('constellation', function (Blueprint $table) {
            $table->id();
            $table->string('Today');
            $table->string('constellation_name');
            $table->string('total');
            $table->string('total_content');
            $table->string('love');
            $table->string('love_content');
            $table->string('work');
            $table->string('work_content');
            $table->string('money');
            $table->string('money_content');
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
        //
    }
}
