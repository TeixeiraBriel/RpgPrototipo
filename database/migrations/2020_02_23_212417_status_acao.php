<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatusAcao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statusAcao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dificuldade')->nullable();
            $table->unsignedBigInteger('categories_id')->nullable()->default(null);
            $table->timestamps();
            $table->foreign('categories_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
