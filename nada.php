<?php
   echo '<link href="style/style.css" media="screen" rel="stylesheet" type="text/css" />';
   echo '<link href="style/iconic.css" media="screen" rel="stylesheet" type="text/css" />';
   echo '<link rel="stylesheet" href="style/responsive-tables.min.css" type="text/css">';
include('seguridad.php');
   include("db_mysql.php");
	$cnn= new DB_mysql;
	$cnn->conectar("db_colegio","localhost","root","");	
    $data=$cnn->consulta("Select * from empleado where id_empleado='".$_SESSION['codigo']."'");
	echo "<table class='respond' border='0px' WIDTH='940x' align='center'>";
	while($fila=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>Bienvenido: ".$fila["nombre"]." ".$fila["apellido"]."</td>";
	echo "</tr>";
	}
?> 