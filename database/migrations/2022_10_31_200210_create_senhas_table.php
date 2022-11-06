<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senhas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',8)->index();
            $table->dateTime('datemi')->index();
            $table->dateTime('datcha')->nullable()->index();
            $table->dateTime('datexi')->nullable()->index();
            $table->dateTime('datfin')->nullable();
            $table->string('codset',6)->references('codigo')->on('setores');
            $table->string('atiset',2);
            $table->char('tipate',1);
            $table->tinyInteger('guiche')->nullable()->index();
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
        Schema::dropIfExists('senhas');
    }
}
