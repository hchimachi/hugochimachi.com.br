<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 50);
            $table->foreignId('categoria_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->text('conteudo');
            $table->string('foto', 255);
            $table->foreignId('detuser_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->dateTime('datapublica');
            $table->string('artslug', 100);
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
        Schema::dropIfExists('artigos');
    }
}
