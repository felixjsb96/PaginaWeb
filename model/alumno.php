<?php
class Alumno
{
	private $pdo;
    
    public $id;
    public $Nombre;
    public $Apellido;
    public $dni;
    public $Sexo;
    public $FechaNacimiento;


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

			$stm = $this->pdo->prepare("SELECT id_alumno as Codigo, nombre as Nombre, apellido as Apellido, 
			dni as DNI, sexo as Sexo, fecha_nac as Fecha_nacimiento 
			FROM alumno order by id_alumno");
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
			          ->prepare("SELECT * FROM alumnos WHERE id_alumno = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM alumnos WHERE id_alumno = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Alumno $data)
	{
		try 
		{
			$sql = "UPDATE alumnos SET 
						nombre          = ?, 
						apellido        = ?,
                        dni        = ?,
						Sexo            = ?, 
						fecha_nac = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Nombre,                         
                        $data->Apellido,
                        $data->dni,
                        $data->Sexo,
                        $data->FechaNacimiento,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Alumno $data)
	{
		try 
		{
		$sql = "INSERT INTO alumnos (id_alumno,nombre,apellido,dni,Sexo,fecha_nac) 
		        VALUES (?, ?, ?, ?, ?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->id,
                    $data->Nombre,
                    $data->Apellido, 
                    $data->DNI, 
                    $data->Sexo,
                    $data->FechaNacimiento                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
} 