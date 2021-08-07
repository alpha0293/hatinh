<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ManageCreatePriestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('email')->nullable();
            $table->string('phonenumber')->nullable();
            $table->date('dob')->nullable();
            $table->date('dopriest')->nullable();
            $table->string('address')->nullable();
            $table->string('note')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('priests');
    }
}
