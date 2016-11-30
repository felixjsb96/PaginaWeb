<?php
session_start();
if(!$_SESSION['login']){
session_destroy();
header('location: ../view/login.html');
}
?>

<!DOCTYPE html>
<html lang="en">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0" name="viewport">
	<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<title>--Menu--</title>
		<link href="../assets/style/style.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="../assets/style/iconic.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="../assets/stylesheet" href="style/responsive-tables.min.css" type="text/css">
		<script src="../assets/js/prefix-free.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>   
		<script src="../assets/js/jquery.responsive-tables.min.js"></script>
        <script src="../assets/js/app.js"></script>
	</head>

<body>
	<div class="wrap">
	
	<nav>
		<ul class="menu">
			<li><a href="menu.php"><span class="iconic home"></span> Inicio</a></li>
			<li><a href="#"><span class="iconic plus-alt"></span> Mantenimiento</a>
				<ul>
					<li><a href="docente.php" target="test">Docente</a></li>
					<li><a href="alumno.php" target="test">Alumno</a></li>
					<li><a href="matricula_view.php" target="test">Matricula</a></li>
				</ul>
			</li>
			<li><a href="#"><span class="iconic map-pin"></span> Registrar</a>
				<ul>
					<li><a href="registrar_matricula.php" target="test">Registrar Matricula</a></li>
									</ul>
			</li>
			<li><a href="#"><span class="iconic mail"></span> Sesion</a>
				<ul>
					<li><a href="#">Modificar Datos</a></li>
					<li><a href="../controller/controller.php?cerrar=x12154xxlkio2654sTv">Cerrar Sesion</a></li>
				</ul>
			</li>
		</ul>
		<div class="clearfix"></div>
	</nav>
	</div>
	
	<div align="center" >
	<iframe name="test" width="1200" height="600" frameborder="0" align="center" src="nada.php">
	</iframe>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
<script src="../assets/js/jquery.responsive-tables.min.js"></script>
<script src="../assets/js/app.js"></script>
</body>

</html>