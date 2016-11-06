<?PHP
include('seguridad.php');
$numero="";
$alumno="";
$fecha="";
$grado="";
if(isset($POST["alumno"])){
	$alumno=$_POST["alumno"];
}else if(isset($_POST["grado"])){
	$grado=$_POST["grado"];
}
$fecha=$_SESSION['fecha'];
if($cnn->consulta("insert into ficha_matricula values(null,'".$fecha."','".$grado."','".$alumno."','".$_SESSION["codigo"]."')")){
	echo "Registro Exitoso";
	header("location:menu.php");
}
?>