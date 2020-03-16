


<center>
<!-- Main content -->
<table>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Reporte Clientes</h3>


          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Ubicación</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th class="text-right">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($consulta as $c)
                  <tr>
                    <td class="text-center">{{$c->idcliente}}</td>
                     <!-- Esto es para traer la imagen -->
                    <td>{{$c->nombre}}</td>
                    <td>{{$c->apellidos}}</td>
                    <td>{{$c->ubicacion}}</td>
                    <td>{{$c->email}}</td>
                    <td>{{$c->telefono}}</td>
                    <td class="td-actions text-right">
                      <div class="btn-group">

                        
                              <!--Si el campo activo es igual a Si se habilita el boton de ELIMINAR y MODIFICAR-->
                              <input type='button' class="btn btn-danger" value='Eliminar' onclick="location.href = '{{URL::action('ClientesController@eliminaCliente',['idcliente'=>$c->idcliente])}}'" /> <!-- Manda el idcliente de la consulta que esta en AS C y lo envia a ROUTES -->
                              


                        {{-- <a href="{{URL::action('ClientesController@eliminaCliente',['idcliente'=>$c->idcliente])}}">Eliminar</a> {{-- Opcional a la linea de arriba  --}}
                        <input type='button' class="btn btn-secondary" value='Modificar' onclick="location.href = '{{URL::action('ClientesController@modificaCliente',['idcliente'=>$c->idcliente])}}'" />
                        
                        <!-- si no el boton RESTAURAR se habilita para modificar el campo ACTIVO a SI -->
                        <input type='button' class="btn btn-warning" value='Restaurar' onclick="location.href = '{{URL::action('ClientesController@restauraCliente',['idcliente'=>$c->idcliente])}}'" />
                        

                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</table>
</center>

