<?php
include("seguridad.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<title>--Menu--</title>
		<link href="style/style.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="style/iconic.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="prefix-free.js"></script>
		<script src="js/jquery.responsive-tables.min.js"></script>
        <script src="js/app.js"></script>
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
	<div >
	<form method="POST" action="#">
	<table class='respond' border="0px" WIDTH='100'>
	<tr><td>Codigo: </td><td class="respond"><input type="text" name ="alumno"/></td></tr>
	<tr><td>Hora de Inicio: </td><td class="respond"><select name="hora">
											<option value="8">8:00o am</option>
											<option value="9">9:00 am</option>
											<option value="10">10:00 am</option>
											<option value="11">11:00 am</option>
											<option value="12">12:00 am</option>
											<option value="1">1:00 pm</option>
											</select></td></tr>
	<tr><td>Dia: </td><td class="respond"><select name="dia">
											<option value="lunes">Lunes</option>
											<option value="martes">Martes</option>
											<option value="miercoles">Miercoles</option>
											<option value="jueves">Jueves</option>
											<option value="viernes">Viernes</option>
											</select></td></tr>
	<tr><td>Grado: </td><td class="respond"><select name="grado">
											<option value="G0001">Primer Grado</option>
											<option value="G0002">Segundo Grado</option>
											<option value="G0003">Tercer Grado</option>
											<option value="G0004">Cuarto Grado</option>
											<option value="G0005">Quinto Grado</option>
											<option value="G0006">Sexto Grado</option>
											</select></td></tr>
	<tr><td>Curso: </td><td class="respond"><select name="curso">
											<option value="C0001">Fisica</option>
											</select></td></tr>
											<tr><td align ="center" colspan="2"><input id="button"type="submit" value="Agregar"/></td></tr>	
	</table>
	</form>
	</div>
	<div>
	<table class='respond' border='1px' WIDTH='500'>
    <tr><td>Numero</td><td>Docente</td><td>Curso</td><td>Grado</td><td>Hora Inicio</td><td>Hora fin</td><td>Dia</td></tr>

	</div>
	</body>
		</html>