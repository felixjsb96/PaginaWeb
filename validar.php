<?php
session_start();
require("db_mysql.php");
$user=null;
$password=null;
if(isset($_POST["username"]) && isset($_POST["password"])){
	$user=$_POST["username"];
	$password=$_POST["password"];
}
$cnn= new DB_mysql;
$cnn->conectar("db_colegio","localhost","root","");
$data=$cnn->consulta("select * from users where username='".$user."'");
while($fila=mysql_fetch_array($data)){
	if(strcmp($fila["password"],$password)==0){
		$_SESSION["fecha"]=date("Y-m-d");
		$_SESSION["login"]="si";
		$_SESSION["time"]=time();
		$_SESSION['codigo']=$fila[2];
		header('Location: menu.php');
		}
	}

?>