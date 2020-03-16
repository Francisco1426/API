<?php

use App\User;
use App\cliente;
use App\producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
     public function run()
    {
        /**se desactivan las llaves foreaneas que halla en las tablas creadas  */
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); 
        /** */
        cliente::truncate();
        producto::truncate();
        User::truncate();

        DB::table('detalle_compras')->truncate();

        cliente::flushEventListeners();
        producto::flushEventListeners();
        User::flushEventListeners();
/**definimos los datos que se van a insertr en las tablas  */
        $cantidadclientes = 10;
        $cantidadproductos = 10;
        $cantidadUsuarios = 10;
        

/**hacemos la llamda de factpry y utlizamos el methodo creat lo qu ehace es crearlos a nivel FDb */
        factory(cliente::class, $cantidadclientes)->create();   

        factory(producto::class, $cantidadproductos)->create();
        
        factory(User::class, $cantidadUsuarios)->create();   
        
    }
}
