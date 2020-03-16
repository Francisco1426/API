<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cliente;

class ClientesController extends Controller
{
   public function Altaclientes()
   {
      $consulta = cliente::orderby('idcliente', 'desc')  //siempre se hace referencia al nombre del modelo de la tabla (NO A LA TABLA)
         ->take(1)
         ->get();
      $idsigue = $consulta[0]->idcliente + 1;

      return view('sistema.Altaclientes')
         ->with('idsigue', $idsigue);
   }

   //cuando da error es porque el id lo saca con una consulta y si no hay registros no marca nada y da date_get_last_errors
   //Deve tener minimo un registro la tabla para que pueda sacar el id sin errores



   public function Guardacliente(Request $request)
   {
      $idcliente = $request->idcliente;
      $nombre = $request->nombre;
      $apellidos = $request->apellidos;
      $ubicacion = $request->ubicacion;
      $email = $request->email;
      $password = $request->password;
      $telefono = $request->telefono;


      $this->validate($request, [
         'nombre' => ["regex:[A-Z][A-Za-z,Á,Ó,á,é,í,ó,ú, ]"],
         'apellidos' => ['regex:/^[A-Z][A-Za-z,Á,á,é,í,ó,ú,ñ ]*$/'],
         'ubicacion' => ['regex:/^[A-Z][A-Za-z,Á,Ó,á,é,í,ó,ú,#, ]*$/'],
         'email' => 'required|email',
         'password' => ['regex:/^[A-Za-z1-9][A-Za-z1-9,Á,á,é,í,ó,ú, ]*$/'],
         'telefono' => ['regex:/^[0-9]{10}$/'],
         
      ]);

      



      $client = new cliente;
      $client->idcliente = $request->idcliente;
      $client->nombre = $request->nombre;
      $client->apellidos = $request->apellidos;
      $client->ubicacion = $request->ubicacion;
      $client->email = $request->email;
      $client->password = $request->password;
      $client->telefono = $request->telefono;
      $client->save();

      $proceso = "ALTA DE CLIENTE";
      $mensaje = "El cliente $request->nombre $request->apellidos ha sido guardado";
      return view('sistema.mensaje')
         ->with('proceso', $proceso)
         ->with('mensaje', $mensaje);
   }


   //Hace una consulta donde selecciona todos los campos de la de la tabla y en la VIEW los recorre con un FOREACH
   public function ReporteClientes()
   {
      $consulta = \DB::select("SELECT c.idcliente, c.nombre, c.apellidos ,c.ubicacion, c.email, c.telefono
         FROM clientes AS c");

      return view('sistema.ReporteClientes')
         ->with('consulta', $consulta);
   }



   //esto es para la eliminacion logica
   public function eliminaCliente($idcliente)
   {
      cliente::find($idcliente)->delete();
     // $clientes= \DB:: UPDATE("update clientes where idcliente= $idcliente");
      $proceso = "CLIENTE DESACTIVADO ";
      $mensaje = "El cliente ha sido desactivado  (baja lógica)";
      return view('sistema.mensaje')
         ->with('proceso', $proceso)
         ->with('mensaje', $mensaje);
   }

   public function restauraCliente($idcliente)
   {
      $empresa = \DB::UPDATE("UPDATE cliente SET activo = 'Si' WHERE idcliente= $idcliente");
      $proceso = "ACTIVAR MAESTRO";
      $mensaje = "El cliente ha sido activado";
      return view('sistema.mensaje')
         ->with('proceso', $proceso)
         ->with('mensaje', $mensaje);
   }


   //Esto es para editar y modificar la informacion de cada cliente
   public function modificaCliente($idcliente)
   {
      //obtiene el ID del cliente desde la vista de reporteclientes 
      $consulta = cliente::where('idcliente', '=', $idcliente)->get();

      return view('sistema.editaCliente')
         ->with('consulta', $consulta[0]);
   }
 
   public function editaCliente(Request $request)
   {
      $idcliente = $request->idcliente;
      $nombre = $request->nombre;
      $apellidos = $request->apellidos;
      $ubicacion = $request->ubicacion;
      $email = $request->email;
      $password = $request->password;
      $telefono = $request->telefono;

      $this->validate($request, [
         'nombre' => ['regex:/^[A-Z][A-Za-z,Á,Ó,á,é,í,ó,ú, ]*$/'],
         'apellidos' => ['regex:/^[A-Z][A-Za-z,Á,á,é,í,ó,ú, ]*$/'],
         'ubicacion' => ['regex:/^[A-Z][A-Za-z,Á,Ó,á,é,í,ó,ú,#, ]*$/'],
         'email' => 'required|email',
         'password' => ['regex:/^[A-Za-z1-9][A-Za-z1-9,Á,á,é,í,ó,ú, ]*$/'],
         'telefono' => ['regex:/^[0-9]{10}$/'],
      ]);
      $client = cliente::find($idcliente);
      $client->idcliente = $request->idcliente;
      $client->nombre = $request->nombre;
      $client->apellidos = $request->apellidos;
      $client->ubicacion = $request->ubicacion;
      $client->email = $request->email;
      $client->password = $request->password;
      $client->telefono = $request->telefono;
      $client->save();

      $proceso = "CLIENTE MODIFICADO";
      $mensaje = "El cliente $request->nombre $request->apellidos ha sido modificado";
      return view('sistema.mensaje')
         ->with('proceso', $proceso)
         ->with('mensaje', $mensaje);
   }
}
