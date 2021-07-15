<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ManageCreateDeaneryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deaneries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('lmquanhat');
            $table->integer('numberofparish');
            $table->integer('numberofmember');
            $table->string('address');
            $table->string('status', 60)->default('published');
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
        Schema::dropIfExists('deaneries');
    }
}
