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
        text-align: left;
        padding: .5em .5em;
        font-weight: bold;
        border-top: solid 3px #ccc;
        border-bottom: solid 1px #ccc;
    }

    td {
        padding: .5em .5em;
        border-bottom: solid 1px #ccc;
    }
				
	</style>	

	</head>

<body>

	<div>
	<table class="#" border="0" align ="center" WIDTH='50'>
	<tr><td align=right WIDTH='25%'>Numero de ficha de matricula:</td><td  WIDTH='50%'><input type="text" name="code"size=50 /></td>
	<td WIDTH='25%'><input id="button" class="button:before" type="submit" value="Buscar"/></td>
	</tr>
	</table>
	</div>
	
	<div class="wrap">
	
	<table class='respond' border='2px' WIDTH='100'>
    <tr><td>Numero</td><td>Fecha</td><td>Grado</td><td>Nombre del Alumno</td><td>Apellido del Alumno</td><td colspan="2">Encargado de matricula</td></tr>
	<?php
	$mat= new MatriculaController();
	$lista=$mat->Listar();
	foreach($lista as $columna){
		echo ("<tr>");
		echo("<td>".$columna->codigo_matricula."</td>");
		echo("<td>".$columna->fecha."</td>");
		echo("<td>".$columna->Grado."</td>");
		echo("<td>".$columna->nombre."</td>");
		echo("<td>".$columna->apellido."</td>");
		echo("<td>".$columna->nombre_empleado."</td>");
		echo("<td>".$columna->apellido_empleado."</td>");
	}
	?>
	</TABLE>
	</div>
</body>

</html>