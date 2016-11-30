<?php
require_once '../model/usuario.php';

class UsuarioController{

	private $model;

    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }

    public function login($username,$password){
    	echo 'login';
    	if($username!="" && $password!=""){
    	$usu= new Usuario();
    	$usu=$this->model->validar($username);
    	if($username==$usu->username && $password==$usu->password){
    	$_SESSION['codigo']=$usu->empleado;
    	$_SESSION['login']=TRUE;
    	header('location:../view/matricula.php');
    	}else{
    		echo ("<script type='text/javascript'>");
    		echo ("alert('Error Usuario o Contraseña Incorrecto')");
    		echo ("</script>");
    	}
      }
    }
}
?>