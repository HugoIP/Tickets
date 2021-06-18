<?php
class Cliente
{
	private $pdo;
    
    public $id;
    public $Nombre;
    public $ApellidoP;
    public $ApellidoM;
    public $Telefono;
    public $Estatus;
    public $Domicilio;
	public $FechaAlta;

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

			$stm = $this->pdo->prepare("SELECT * FROM clientes");
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
			          ->prepare("SELECT * FROM clientes WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM clientes WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE clientes SET 
						Nombre          = ?, 
						ApellidoP        = ?,
                        ApellidoM        = ?,
						Telefono         = ?,
                        Estatus         = ?, 
						Domicilio         = ?,
						FechaAlta = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Nombre, 
                        $data->ApellidoP,
                        $data->ApellidoM,
                        $data->Telefono,
                        $data->Estatus,
                        $data->Domicilio,
						$data->FechaAlta,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cliente $data)
	{
		try 
		{
		$sql = "INSERT INTO clientes (Nombre,ApellidoP,ApellidoM,Telefono,Estatus,Domicilio,FechaAlta) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Nombre,
                    $data->ApellidoP, 
                    $data->ApellidoM, 
                    $data->Telefono,
                    $data->Estatus,
                    $data->Domicilio,
                    date('Y-m-d')
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}