<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarteiraAcoes extends Migration
{
    protected $table = 'carteira';

    public function up()
    {
        Schema::create('carteira', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->string('valor');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carteira');
    }
}
