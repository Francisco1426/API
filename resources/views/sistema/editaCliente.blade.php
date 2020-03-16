
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edita Clientes</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="row">
        {{Form::open(['route' => 'editaCliente','files' => 'true'])}}
        {{Form::token()}}
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">
                                        <center>Registro:</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <center>Clave Cliente</center>
                                    </td>
                                    <td>
                                        {{Form::text('idcliente',$consulta->idcliente,['readonly'])}}
                                    </td>
                                </tr>




                                <tr>
                                    <td>
                                        <center>Nombre</center>
                                    </td>
                                    <td>
                                        @if($errors->first('nombre'))
                                        <p class="text-danger"><i> {{ $errors->first('nombre') }}</i></p>
                                        @endif
                                        {{Form::text('nombre',$consulta->nombre,['class' => 'form-control'])}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <center>Apellidos</center>
                                    </td>
                                    <td>
                                        @if($errors->first('apellidos'))
                                        <p class="text-danger"><i> {{ $errors->first('apellidos') }}</i></p>
                                        @endif
                                        {{Form::text('apellidos',$consulta->apellidos,['class' => 'form-control'])}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <center>Ubicación</center>
                                    </td>
                                    <td>
                                        @if($errors->first('ubicacion'))
                                        <p class="text-danger"><i> {{ $errors->first('ubicacion') }}</i></p>
                                        @endif
                                        {{Form::text('ubicacion',$consulta->ubicacion,['class' => 'form-control'])}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <center>E-mail</center>
                                    </td>
                                    <td>
                                        @if($errors->first('email'))
                                        <p class="text-danger"><i> {{ $errors->first('email') }}</i></p>
                                        @endif
                                        {{Form::email('email',$consulta->email,['class' => 'form-control'])}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <center>Password</center>
                                    </td>
                                    <td>
                                        @if($errors->first('password'))
                                        <p class="text-danger"><i> {{ $errors->first('password') }}</i></p>
                                        @endif
                                        {{Form::text('password',$consulta->password,['class' => 'form-control'])}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <center>Telefono</center>
                                    </td>
                                    <td>
                                        @if($errors->first('telefono'))
                                        <p class="text-danger"><i> {{ $errors->first('telefono') }}</i></p>
                                        @endif
                                        {{Form::text('telefono',$consulta->telefono,['class' => 'form-control'])}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <center>{{Form::submit('Guardar',['class' => 'btn btn-primary'])}}</center>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</section>
