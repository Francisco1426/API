<!DOCTYPE html>
<html>
  <head>
    <title>Formulario Clientes</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script type="text/javascript">
      function revisar(elemento){
        if(elemento.value==''){
          elemento.className='error';
        }else{
          elemento.className='input';
        }
      }
      
      function revisaNumero(elemento){
        if(elemento.value!==''){
          var data = elemento.value;
          if(isNaN(data)){
            elemento.className='error';
          }else{
            elemento.className='input';
          }
        }
      }
      
      function revisaLongitud(elemento, min){
        if(elemento.value!==''){ 
          var data = elemento.value;
          if(data.length<min){
            elemento.className='error';
          }else{
            elemento.className='input';
          }
        }
      }
      
      function revisarEmail(elemento){
        if(elemento.value!==''){
          var data = elemento.value;
          var exp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          if(!exp.test(data)){
            elemento.className='error';
          }else{
            elemento.className='input';
          } 
        }
      }
      
      function validar(){
        var datosCorrectos=true;
        var error="";
        if(document.getElementById("nombre").value==""){
          datosCorrectos=false;
          error="\n El Nombre Esta Vacio";
        }
        
        if(document.getElementById("telefono").value==""){
          datosCorrectos=false;
          error="\n Debes Poner Un Tenelefono";
        }
        
        if(isNaN(document.getElementById("telefono").value)){
          datosCorrectos=false;
          error="\n El Telefono Solo Debe Tener Numeros";
        }
        
        var exp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!exp.test(document.getElementById("email").value)){
          datosCorrectos=false;
          error="\n Email Invalido";
        }
        
        if(document.getElementById("password").value.length<6){
          datosCorrectos=false;
          error="\n El Mensaje Debe Ser Mayor A 6 Caracteres";
        }
        
        if(!datosCorrectos){
          alert('Hay Errores En El formulario'+error);
        }
        
        return datosCorrectos;
        
      }
      
      
    </script>
  </head>
  <body>
    <div id="contenedor-form">
      <form action="#" method="post" onsubmit="return validar()">
        <p class="nombre">
          <input type="text" class="input" placeholder="Nombre" id="nombre" name="nombre" onblur="revisar(this)" onkeyup="revisar(this)" autocomplete="off" required>
        </p>

         <p class="apellidos">
          <input type="text" class="input" placeholder="Apellidos" id="apellidos" name="apellidos" onblur="revisar(this)" onkeyup="revisar(this)" autocomplete="off" required>
        </p>

         <p class="ubicacion">
          <input type="text" class="input" placeholder="Ubicacion" id="ubicacion" name="ubicacion" onblur="revisar(this)" onkeyup="revisar(this)" autocomplete="off" required>
        </p>
        
        <p class="email">
          <input type="text" class="input" placeholder="Email*" id="email" name="email" onblur="revisar(this); revisarEmail(this)" onkeyup="revisar(this); revisarEmail(this)" autocomplete="off" required>
        </p>
        
        
       <p class="password">
          <input type="text" class="input" placeholder="password*" id="password" name="password" onblur="revisar(this); revisaNumero(this)" onkeyup="revisar(this); revisaNumero(this)" autocomplete="off" required>
        </p>

         <p class="telefono">
          <input type="text" class="input" placeholder="Telefono*" id="telefono" name="telefono" onblur="revisar(this); revisaNumero(this)" onkeyup="revisar(this); revisaNumero(this)" autocomplete="off" required>
        </p>
        
        <div class="enviar">
          <input type="submit" value="ENVIAR" id="enviar"/>
          <div class="transicion"></div>
        </div>
      </form>
    </div>
  </body>
</html