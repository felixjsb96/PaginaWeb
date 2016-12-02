<?php
session_start();
if(!$_SESSION['login']){
session_destroy();
header('location: ../view/login.html');
}
include_once '../model/database.php';
include_once '../controller/alumno.controller.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<title>Alumno</title>
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
	<table class="#" border="0" align ="center">
	<tr><td>Codigo: </td><td><input type="text" name="code"/>
	<td><input id="button" class="button:before" type="submit" value="Buscar"/></td>
	</tr>
	</table>
	</div>
 	
	<div class="wrap">	
	<table class='respond' border='2px' WIDTH='100'>
    <tr><td>Codigo</td><td>Nombre</td><td>Apellido</td><td>DNI</td><td>Sexo</td><td>Fecha de nacimiento</td></tr>
	<?php
	$mat= new AlumnoController();
	$lista=$mat->Listar();
	foreach($lista as $columna){
		echo ("<tr>");
		echo("<td>".$columna->Codigo."</td>");
		echo("<td>".$columna->Nombre."</td>");
		echo("<td>".$columna->Apellido."</td>");
		echo("<td>".$columna->DNI."</td>");
		echo("<td>".$columna->Sexo."</td>");
		echo("<td>".$columna->Fecha_nacimiento."</td>");
		
	}
	?>
	</TABLE>
	</div>
	<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>		

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
<script src="../assets/js/jquery.responsive-tables.min.js"></script>
<script src="../assets/js/app.js"></script>
</body>

</html>