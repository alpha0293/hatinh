<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ManageCreateParishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('address')->nullable();
            $table->string('phonenumber')->nullable();
            $table->integer('totalmember')->nullable();
            $table->integer('totalGiaoho')->nullable();
            $table->integer('deanery_id')->references('id')->on('deaneries')->onDelete('cascade');
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
        Schema::dropIfExists('parishes');
    }
}
