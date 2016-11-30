<?php
class Usuario{
	private $pdo;

	public $id;
	public $username;
	public $password;
	public $empleado;

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


	public function validar($username){
			try {
			echo ('clase usuario');
			//$p=sha1(password);
			$stm=$this->pdo->prepare('SELECT * FROM users WHERE username=?');
			$stm->execute(array($username));						
			return $stm->fetch(PDO::FETCH_OBJ);
			} catch (Exception $e) {
			
			die($e->getMessage());

			}
			
	}	

}
?>