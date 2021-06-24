<?php
class Servicio
{
    private $pdo;

    public $id;
    public $Nombre;
    public $Descripcion;
    public $Costo;
    public $Periodo;//unidades de tiempo facturados
    public $UnidadPeriodo;//horas, dias, meses
    public $FechaAlta;
    public $FechaLimit;
    public $Estatus;
    /* Missing datos de facturacion */

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
            $result =array();

            $stm = $this->pdo->prepare("SELECT * FROM servicios");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    public function ListarServicios()
    {
        try
        {
            $result =array();

            $stm = $this->pdo->prepare("SELECT id, Nombre, Costo FROM servicios");
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
            $stm = $this->pdo->prepare("SELECT * FROM servicios WHERE id = ?");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try
        {
            $stm = $this->pdo->prepare("DELETE FROM servicios WHERE id = ?");
            $stm->execute(array($id));
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    public function Actualizar($data)
    {
        try 
		{
			$sql = "UPDATE servicios SET 
						Nombre          = ?, 
						Descripcion     = ?,
                        Costo           = ?,
						Periodo         = ?,
                        UnidadPeriodo   = ?, 
						FechaAlta       = ?,
                        FechaLimit      = ?,
                        Estatus         = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Nombre,
                        $data->Descripcion,
                        $data->Costo,
                        $data->Periodo,
                        $data->UnidadPeriodo,
                        $data->FechaAlta,
                        $data->FechaLimit,
                        $data->Estatus,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }
    public function Registrar(Servicio $data)
	{
		try 
		{
		$sql = "INSERT INTO servicios (Nombre,Descripcion,Costo,Periodo,UnidadPeriodo,FechaAlta,FechaLimit,Estatus) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Nombre,
                    $data->Descripcion, 
                    $data->Costo, 
                    $data->Periodo,
                    $data->UnidadPeriodo,
                    $data->FechaAlta,
                    $data->FechaLimit,
                    $data->Estatus
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>