<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumsToTableParishes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parishes', function (Blueprint $table) {
            $table->text('lmquanxu')->nullable();
            $table->text('lmpho')->nullable();
            $table->text('lmphutrach')->nullable();
            $table->text('note')->nullable();
            $table->longText('lmtungquan')->nullable();
            $table->longText('lmquehuong')->nullable();
            $table->longText('tusiquehuong')->nullable();
            $table->longText('chungsinh')->nullable();
            $table->longText('hoidonghiendien')->nullable();
            $table->text('image')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parishes', function (Blueprint $table) {
            $table->dropColumn(['lmquanxu','lmpho','lmphutrach','note','lmtungquan','lmquehuong','sotusiquehuong','sochungsinh','hoidonghiendien','image']);
        });
    }
}
