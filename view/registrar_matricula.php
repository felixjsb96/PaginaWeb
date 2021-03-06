<?php
session_start();
if(!$_SESSION['login']){
session_destroy();
header('location: ../view/login.html');
}
include_once '../model/database.php';
include_once '../controller/matricula.controller.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<title>--Menu--</title>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<link href="../assets/style/style.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="../assets/style/iconic.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../assets/js/prefix-free.js"></script>
		<script src="../assets/js/jquery.responsive-tables.min.js"></script>
        <script src="../assets/js/app.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<style type="text/css">
			#button {
					border: none;
					background: #3a7999;
					color: #f2f2f2;
					padding: 10px;
					font-size: 18px;
					border-radius: 5px;
					position: relative;
					box-sizing: border-box;
					transition: all 500ms ease;
					}
				
    table {
        width: 100%;
        margin: 1em 0 2em;
        border-collapse: collapse;
		
    }

    caption {
        margin: 1em 0 .7em 0;
        text-align: left;
        font-weight: bold;
        font-size: 120%;
        letter-spacing: .5px;
        color: #444;
    }

    th {
		background-color:#33FF9F;
		font-family:Arial, Helvetica, sans-serif;
		font-size:12px;
		color:#993300;
        text-align: left;
        padding: .5em .5em;
        font-weight: bold;
        border-top: solid 3px #ccc;
        border-bottom: solid 1px #ccc;
    }

    td {
		
		font-family:Arial, Helvetica, sans-serif;
		font-size:12px;
		color:#4B1313;
        padding: .5em .5em;
        border-bottom: solid 1px #ccc;
    }
				
	</style>	

	</head>

<body>
	<div class="container">
	<div >
	<form method="POST" action="../controller/controller.php">
	<table class="table table-striped" border="0px" WIDTH='100'>
	
	<tr><td>Alumno: </td><td class="respond"><input type="text" name ="alumno"/></td></tr>
	<tr><td>Grado: </td><td class="respond"><select name="grado">
											<option value="00001">Primer Grado</option>
											<option value="00002">Segundo Grado</option>
											<option value="00003">Tercer Grado</option>
											<option value="00004">Cuarto Grado</option>
											<option value="00005">Quinto Grado</option>
											<option value="00006">Sexto Grado</option>
											</select></td></tr>
	<tr><td align ="center" colspan="2"><input id="button"type="submit" value="Registrar"/></td></tr>	
	</table>
	</form>
	</div>
	<div class="wrap">
	
	<table class="table table-hover" border='2px' WIDTH='100'>
	<thead>
    <tr><td>Numero</td><td>Fecha</td><td>Grado</td><td>Nombre del Alumno</td><td>Apellido del Alumno</td><td colspan="2">Encargado de matricula</td></tr>
	</thead>
	<?php
	$mat= new MatriculaController();
	$lista=$mat->Listar();
	foreach($lista as $columna){
		echo ("<tbody>");
		echo ("<tr>");
		echo("<td>".$columna->codigo_matricula."</td>");
		echo("<td>".$columna->fecha."</td>");
		echo("<td>".$columna->Grado."</td>");
		echo("<td>".$columna->nombre."</td>");
		echo("<td>".$columna->apellido."</td>");
		echo("<td>".$columna->nombre_empleado."</td>");
		echo("<td>".$columna->apellido_empleado."</td>");
		echo ("</tr>");
		echo ("</tbody>");
	}
	?>
	</TABLE>
	</div>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>		

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
<script src="../assets/js/jquery.responsive-tables.min.js"></script>
<script src="../assets/js/app.js"></script>
	</body>

</html>