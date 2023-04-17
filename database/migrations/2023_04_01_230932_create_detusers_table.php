<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detusers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade')->unique();
            $table->string('nomecompleto', 255);
            $table->string('rua',255);
            $table->string('numero',255);
            $table->string('bairro',255);
            $table->string('cidade',255);
            $table->string('CEP',11);
            $table->string('UF',2);
            $table->string('tel',15)->nullable();
            $table->string('cel',15)->nullable();
            $table->string('CPF',15)->nullable();
            $table->string('RG',50)->nullable();
            $table->string('facebook',255)->nullable();
            $table->string('twiter',255)->nullable();
            $table->string('instagram',255)->nullable();
            $table->string('youtube',255)->nullable();
            $table->string('tipousuario', 5);
            $table->softDeletes();
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
        Schema::dropIfExists('detusers');
    }
}
