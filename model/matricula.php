<?php
class Matricula
{
	private $pdo;
    
    public $Numero;
    public $Fecha;
    public $Grado;
    public $Alumno;
    public $Empleado;


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

			$stm = $this->pdo->prepare("select m.numero as codigo_matricula, m.fecha as fecha, dg.descripcion as Grado, 
			a.nombre as nombre, a.apellido as apellido, e.Nombres as nombre_empleado, e.Apellidos as apellido_empleado  
			from ficha_matricula m,alumno a,empleado e,detalle_grado dg, grado g where (m.id_alumno=a.id_alumno 
			and m.id_grado=g.id_grado and g.id_grado=dg.id_grado and m.id_empleado=e.id_empleado) order by m.numero");
			//$stm = $this->pdo->prepare("SELECT * FROM ficha_matricula");
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
			          ->prepare("SELECT * FROM ficha_matricula WHERE Numero = ?");
			          

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
		/*try 
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
		}*/
	}

	public function Registrar(Matricula $data)
	{
		try 
		{
		$sql = "INSERT INTO ficha_matricula (numero,fecha,id_grado,id_alumno,id_empleado) 
		        VALUES (null, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Fecha,
                    $data->Grado, 
                    $data->Alumno, 
                    $data->Empleado                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
} 
	

?>
