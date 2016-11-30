<?php
class Empleado{
	private $pdo;

	public $id;
	public $nombre;
	public $apellido;
	public $dni;
	public $sexo;
	public $fecha_nac;
	public $tipo;
	public $curso;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
		{
			try
			{
				$result = array();

				$stm = $this->pdo->prepare("SELECT e.id_empleado as a, e.Nombres as b, 
				e.Apellidos as c, e.DNI as d, te.Descripcion as e, c.nombre as f 
				FROM empleado e, tipo_empleado te, curso c where (e.id_tipo=te.id_tipo and e.id_curso=c.id_curso) order by id_empleado");
				$stm->execute();

				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM empleado WHERE id_empleado = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}
?>