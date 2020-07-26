<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_store', 50);
            $table->timestamps();
        });

        Schema::table('reservation', function (Blueprint $table) {
            $table->foreign('id_store')
            ->references('id')
            ->on('store')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservation', function (Blueprint $table) {
            $table->dropForeign('reservation_id_store_foreign');
        });
        Schema::dropIfExists('store');
    }
}
