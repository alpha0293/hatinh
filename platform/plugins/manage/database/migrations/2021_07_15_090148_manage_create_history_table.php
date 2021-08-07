<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ManageCreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('image')->nullable();
            $table->longText('content')->nullable();
            $table->integer('parish_id')->references('id')->on('parishes')->onDelete('cascade');
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
        Schema::dropIfExists('histories');
    }
}
