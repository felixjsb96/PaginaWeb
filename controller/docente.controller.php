<?php
require_once '../model/empleado.php';
//require_once 'model/docente.php';
class DocenteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Empleado();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/docente/docente.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $doc = new Empleado();        

        if(isset($_REQUEST['codigo'])){
            $doc = $this->model->Obtener($_REQUEST['id']);
            //require_once '../view/agregar.php':
        }
        
    

        if(isset($_REQUEST['id'])){
            $doc = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/docente/docente-editar.php';
        require_once 'view/footer.php';

    }
    
    public function Guardar(){
        $doc = new Empleado();
        
        $doc->id = $_REQUEST['id'];
        $doc->Nombre = $_REQUEST['Nombre'];
        $doc->Apellido = $_REQUEST['Apellido'];
        $doc->Correo = $_REQUEST['Correo'];
        $doc->Sexo = $_REQUEST['Sexo'];
        $doc->FechaNacimiento = $_REQUEST['FechaNacimiento'];

        $doc->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
	
        public function Listar(){
		$doc = new Empleado();
        $lista= $doc->Listar();
		return $lista;
	   // include_once '../view/registrar_matricula.php';
		
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
?>