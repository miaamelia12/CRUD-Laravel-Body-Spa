<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTreatment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_treatment', 50);
            $table->timestamps();
        });

        Schema::table('reservation', function(Blueprint $table) {
            $table->foreign('id_treatment')
            ->references('id')
            ->on('treatment')
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
            $table->dropForeign('reservation_id_treatment_foreign');
        });
        Schema::dropIfExists('treatment');
    }
}
