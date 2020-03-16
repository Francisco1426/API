<!DOCTYPE html>
<html>
	<head>
		<title>Formulario Productos</title>
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
			
			function revisarcantida(elemento){
				if(elemento.value!==''){
					var data = elemento.value;
					var exp = ((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}]);
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
				
				if(document.getElementById("descripcion").value.length<30){
					datosCorrectos=false;
					error="\n El Mensaje Debe Ser Mayor A 30 Caracteres";
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

				<p class="descripcion">
					<textarea class="input" id="descripcion" placeholder="Descripcion" name="descripcion" onblur="revisar(this); revisaLongitud(this, 30)" onkeyup="revisar(this); revisaLongitud(this, 30)" autocomplete="off" required></textarea>
				</p>
				
				
				<p class="cantidad">
					<input type="text" class="input" placeholder="Cantidad*"id="cantidad" name="cantidad" onblur="revisar(this); revisaNumero(this)" onkeyup="revisar(this); revisaNumero(this)" autocomplete="off" required>
				</p>

				<p class="costo">
					<input type="text" class="input" placeholder="Costo*"id="costo" name="costo" onblur="revisar(this); revisaNumero(this)" onkeyup="revisar(this); revisaNumero(this)" autocomplete="off" required>
				</p>
				
				
				<div class="guardar">
					<input type="submit" value="GUARDAR" id="guardar"/>
					<div class="transicion"></div>
				</div>
			</form>
		</div>
	</body>
</html>