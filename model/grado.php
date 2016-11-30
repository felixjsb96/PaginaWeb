<?php
class Grado{
	private $pdo;

	public $id;
	public $turno;
	public $seccion:
	public $aula;

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

	
}
?>