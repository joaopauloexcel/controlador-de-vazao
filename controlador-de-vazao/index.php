<!DOCTYPE html>
<html lang='pt-br'>
	<head>
		<meta charset='UTF-8'>
		<title>Controle | Sistema</title>
		<script src='js/jquery-3.1.1.min.js'></script>
		<link href='css/bootstrap.min.css' rel='stylesheet' media='screen'>
		<link href='css/estilos_teste.css' rel='stylesheet' media='screen'>
		<script type="text/javascript">

		var inicia = function () {
        	var Grava = document.querySelector(".confirmar")
                Grava.onclick = function () {
                	$.ajax({
				    url: "//192.168.0.106/"+document.getElementById('valor').value
				  	});
                	document.getElementById('valor').value=0;
                	alert("Requisição enviada com suceso, peço que aguarde, por favor!")
                	Desabilita()
                	setTimeout(Habilita, 5000);
                }
        }
        function Desabilita(){
        	document.getElementById('confirmar').disabled = true;
        }
        function Habilita(){
        	document.getElementById('confirmar').disabled = false;
        }
		window.onload = function () {
                inicia()
            }
		
	 	</script>
	</head>
	<body>
		<div class='container-fluid'>
				<nav class='navbar'>
				  <div class='container-fluid'>
					  <div class='row'>
						  <div class='col-6 col-md-3 col-sm-3 topo'>
							</div>
							<div class='col-5 col-md-6 col-sm-6 titulo'>
								<br>
								<h1 class="titulo">Sistema de Controle</h1>
							</div>
							<div class='col-6 col-sm-3 col-md-3'>
									
							</div>
						</div>
					</div>
			</nav>
		</div>
		<div class='corpo'>
				<div class="div_sub_titulo">
					<br>
					<b class="sub_titulo">Principal</b>
					<br>
					<br>
				</div>
			<div class='corpo col-12 col-sm-12 col-md-12 col-lg-12'>
				<br>
				<br>
				<div class="row">
					<div class='col-2 col-sm-3 col-md-4 col-lg-4'>
					</div>
					<div class='col-8 col-sm-6 col-md-4 col-lg-4 centro'>
						<br>
						<br>
						<div class="row">
							<div class='col-10 col-sm-10 col-md-10 col-lg-10 centro_temperatura'>
								<br>
								<div class="row">
									<h6 class="sub_titulo_2">Digite o valor desejado em Mililitros!</h6>
								</div>
								<div class="row">
									<div class="sub_titulo_2 col-12 col-sm-12 col-md-12 col-lg-12">
										<input type="text" id="valor" maxlength="3" value="0" required pattern="[0-9]+$" />
									</div>
								</div>
								<br>						
							</div>
						</div>
						<br>
						<br>
						<div class="row">
							<div class='col-11 col-sm-11 col-md-11 col-lg-11 centro_botao'>
								<button id="confirmar" class='btn btn-primary confirmar' type="button" >Confirmar</button>
							</div>
						</div>
						<br>
						<br>
					</div>
					<br>
					<div class='col-2 col-sm-3 col-md-4 col-lg-4'>
					</div>
				</div>
				<br>
				<br>
				<br>
			</div>
			<div class='pre_rodape'>
			<br>
			<br>
			<br>
			</div>
			<div class='pre_rodape col-xs-12 col-sm-12 col-md-12 col-lg-12'>
				<br>
				<br>
				<br>
			</div>
			<footer class="rodape col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<br>
				<br>
				&copy Copyright 2018
				<br>
				<br>
				<br>
			</footer>				
		</div>
		<script type="text/javascript">
			
		</script>
	</body>
</html>