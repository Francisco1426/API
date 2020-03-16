<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('clientes', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nombre', 50);
      $table->string('apellidos', 50);
      $table->string('ubicacion', 60);
      $table->string('email');
      $table->string('password');
      $table->string('telefono', 15);
      $table->rememberToken();
      $table->timestamps();
      $table->softDeletes();
    });
  }


  public function down()
  {
    Schema::dropIfExists('clientes');
  }
}
