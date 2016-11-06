<?php

include('seguridad.php');
$alumno=null;
$inicio=null;
$fin=null;
$dia=null;
$grado=null;
$curso=null;
if(isset($_POST['alumno'])){
	$alumno=$_POST['alumno'];
}else if(isset($_POST['hora'])){
	$inicio=$_POST['hora'];
}else if(isset($_POST['dia'])){
	$dia=$_POST['dia'];
}else if(isset($_POST['grado'])){
	$grado=$_POST['grado'];
}else if(isset($_POST['grado'])){
	$curso=$_POST['grado'];
}


include("seguridad.php");
include("db_mysql.php");
	$cnn= new DB_mysql;
    $cnn->conectar("db_colegio","localhost","root","");	


	function cabecera(){
$cnn->consulta("insert into ficha_horario values('null','".$alumno."','".$_SESSION['fecha']."'");		
}

function detalle(){
	$fin=$inico+1;
$data=$cnn->consulta("select max(numero) from ficha_horario");	
$numero=mysql_fetch_array($data);
$cnn->consulta("insert into detalle_ficha values('".$numero[0]."','".$curso."','".$inicio.":00"."','".$fin.":00"."','".$dia."','".$grado."'");	
	header("location:menu.php");
}
function eliminar(){
	
}	
function cancelar(){
if(isset($_GET["codigo"])){
$codigo=$_GET["codigo"];
$cnn->consulta("detele from ficha_horario where='".$codigo."'");
}	
}
?>
