<html lang="en">
	<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<title>--Menu--</title>
		<link href="style/style.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="style/iconic.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="prefix-free.js"></script>
			
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
<?php
include('seguridad.php');
$option="";
$code="";
if(isset($_GET["option"])){
$option=$_GET["option"];
}
if(isset($_POST["code"])){
	$code=$_POST["code"];
}
if(isset($_POST["option"])){
	$option=$_POST["option"];
}
?>

	<div>
	<form method="POST" action="agregar.php">
	<input type="hidden" name="option" value=<?PHP echo "'".$option."'"?>>
	<table class="#" border="0" align ="center">
	<tr><td  >Codigo: </td><td><input type="text" name="code"/>
	<td><input id="button" class="button:before" type="submit" value="Buscar"/></td>
	</tr>
	</table>
	</form>
    
	<?PHP
     include("db_mysql.php");
	$cnn= new DB_mysql;
	
	$cnn->conectar("db_colegio","localhost","root","");	
	
	if(strcasecmp($option,"docente")==0){
	if(isset($code) || $code!=""){	
	$data=$cnn->consulta("select * from empleado e, curso c where e.id_curso=c.id_curso and e.id_tipo='00001'");
	}else{
	$data=$cnn->consulta("select * from empleado e, curso c where e.id_curso=c.id_curso and e.id_empleado='".$code."'");	
	}
	echo "<table class='respond' border='1px' WIDTH='940x'>";
	echo "<tr>";
	echo "<td>Codigo</td>";
	echo "<td>Nombre</td>";
	echo "<td>Apellido</td>";
	echo "<td>DNI</td>";
	echo "<td>Sexo</td>";
	echo "<td>Fecha de Nacimiento</td>";
	echo "<td>Curso</td>";
	echo "<td colspan='2'>Editar</td>";
	echo "</tr>";
		
	while($fila=mysql_fetch_array($data)){
		echo "<tr>";
		echo "<td> ".$fila["id_empleado"]."</td>";
		echo "<td>".$fila["Nombres"]."</td>";
		echo "<td>".$fila["Apellidos"]."</td>";
		echo "<td>".$fila["DNI"]."</td>";
		echo "<td>".$fila["Sexo"]."</td>";
		echo "<td>".$fila["Fecha_nacim"]."</td>";
		echo "<td>".$fila[9]."</td>";
		echo "<td align = 'center'><a href='#'><img src='img/b_edit.png'/></a></td>";
		echo "<td align = 'center'><a href='#'><img src='img/agregar.png'/></a></td>";
		echo "</tr>";
	}
	
        echo "</table>";
	}else if(strcasecmp($option,"alumno")==0){
		if(isset($code) || $code!=""){
		$data=$cnn->consulta("select * from alumno");	
	}else{
		$data=$cnn->colsulta("select * from alumno a.id_alumno='".$code."'");
	}
	echo "<table class='respond' border='1px' WIDTH='940x'>";
	echo "<tr>";
	echo "<td>Codigo</td>";
	echo "<td>Nombre</td>";
	echo "<td>Apellido</td>";
	echo "<td>DNI</td>";
	echo "<td>Sexo</td>";
	echo "<td>Fecha de Nacimiento</td>";
	echo "<td colspan='2'>Editar</td>";
	echo "</tr>";
	
	while($fila=mysql_fetch_array($data)){
		echo "<tr>";
		echo "<td>".$fila["id_alumno"]."</td>";
		echo "<td>".$fila["nombre"]."</td>";
		echo "<td>".$fila["apellido"]."</td>";
		echo "<td>".$fila["dni"]."</td>";
		echo "<td>".$fila["sexo"]."</td>";
		echo "<td>".$fila["fecha_nac"]."</td>";
		echo "<td align ='center'><a href='#'><img src='img/b_edit.png'/></a></td>";
		echo "<td align = 'center'><a href='#'><img src='img/agregar.png'/></a></td>";
		echo "</tr>";
	}
	echo "</table>";
	}else if(strcasecmp($option,"matricula")==0){
     if(isset($code)|| $code!=""){
	 $data=$cnn->consulta("select * from ficha_matricula f, grado g, alumno a, empleado e where f.id_grado=g.id_grado and f.id_alumno=a.id_alumno and e.id_empleado=f.id_empleado");
	 }else{
		 $data=$cnn->consulta("select * from ficha_matricula f, grado g, alumno a, empleado e where f.id_grado=g.id_grado and f.id_alumno=a.id_alumno and e.id_empleado=f.id_empleado 
		 and a.id_alumno='".$code."'");
		 }
	echo "<table class='respond' border='1px' WIDTH='940x'>";
	echo "<tr>";
	echo "<td>Numero</td><td>Fecha</td><td>Grado</td><td>Empleado</td><td>Alumno</td><td colspan='2'>Accion</td></tr>";
	while($fila=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$fila[0]."</td>";
	echo "<td>".$fila[1]."</td>";
	echo "<td>".$fila[8]."</td>";
	echo "<td>".$fila[16]." ".$fila[17]."</td>";
	echo "<td>".$fila[10]." ".$fila[11]."</td>";
	echo "<td align ='center'><a href='#'><img src='img/b_edit.png'/></a></td>";
	echo "<td align = 'center'><a href='#'><img src='img/agregar.png'/></a></td>";
	echo "</tr>";
	}
	echo "</table>";
	}
			?>	
		</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
<script src="js/jquery.responsive-tables.min.js"></script>
<script src="js/app.js"></script>	
</body>

</html>