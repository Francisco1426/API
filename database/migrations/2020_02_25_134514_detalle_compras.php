<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
    Schema::create('detalle_compras', function (Blueprint $table) {  //es el nombre de la tabla
      $table->integer('id_cliente')->unsigned();
      $table->integer('id_producto')->unsigned();
      $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
      $table->foreign('id_producto')->references('id_producto')->on('productos');
        $table->rememberToken();
        $table->timestamps();
        $table->softDeletes();
       });
        //
    }

    public function down()
    {
       Schema::dropIfExists('detalle_compras');
    }
}
