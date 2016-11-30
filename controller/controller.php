<?php
session_start();
include_once '../model/database.php';
include_once 'usuario.controller.php';

if(isset($_POST['username']) && isset($_POST['password'])){
echo ('here');
$user=$_POST['username'];
$password=$_POST['password'];
$usu=new UsuarioController();
$usu->login($user,$password);
}

if(isset($_GET['option'])){
	$option=$_GET['option'];
	if($option=="matricula" || $option=='MATRICULA'){
		header('location: ../view/agregar.php');
}
}

if(isset($_POST['alumno']) && $_POST['alumno']!=""){
	include_once 'matricula.controller.php';
	$matri=new MatriculaController();
	$matri->Guardar();
} 
 if(isset($_GET['cerrar'])){
 	session_destroy();
 	header('location: ../view/matricula.php');
 }
?>