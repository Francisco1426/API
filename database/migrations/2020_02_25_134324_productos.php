<?php
use App\producto;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function(Blueprint $table){
        $table->increments('id');
        $table->string('nombre');
        $table->string('descripcion');
        $table->integer('cantidad');
        $table->float('costo');
        $table->rememberToken();
        $table->timestamps();
        $table->softDeletes();
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
        Schema::dropIfExists('productos');
    }
}
