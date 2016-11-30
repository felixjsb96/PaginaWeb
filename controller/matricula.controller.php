<?php
require_once '../model/matricula.php';

class MatriculaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Matricula();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/alumno/alumno.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Matricula();
        
        if(isset($_REQUEST['codigo'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
            //require_once '../view/agregar.php':
        }
        
        
    }
    
    public function Guardar(){
        $mat = new Matricula();
        
        $mat->Alumno = $_REQUEST['alumno'];
        $mat->Fecha = date("y-m-d");
        $mat->Grado = $_REQUEST['grado'];
        $mat->Empleado="00001";
        $mat->Registrar($mat);
        header('Location: ../view/matricula.php');
    }
    public function Listar(){
		$mat = new Matricula();
        $lista= $mat->Listar();
		return $lista;
	   // include_once '../view/registrar_matricula.php';
		
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
?>