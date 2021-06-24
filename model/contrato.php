<?php
class Contrato
{
    private $pdo;

    public $id;
    public $idCliente;
    public $idServicio;
    public $ListDispositivos;//lista dispositivos
    public $Estatus;

    public $NombreCliente;
    public $NombreServicio;
    public $CostoServicio;
    public $FechaInicioServicio;
    public $FechaCorteServicio;
    //list dispositivos

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

            $stm = $this->pdo->prepare("SELECT * FROM contratos");
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
            $stm = $this->pdo->prepare("SELECT * FROM contratos WHERE id = ?");
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
            $stm = $this->pdo->prepare("DELETE FROM contratos WHERE id = ?");
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
			$sql = "UPDATE contratos SET 
						Estatus         = ?, 
						ListDispositivos    = ?,
                        NombreCliente           = ?,
						NombreServicio        = ?,
                        CostoServicio   = ?, 
						FechaInicioServicio       = ?,
                        FechaCorteServicio     = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Estatus,
                        $data->ListDispositivos,
                        $data->NombreCliente,
                        $data->NombreServicio,
                        $data->CostoServicio,
                        $data->FechaInicioServicio,
                        $data->FechaCorteServicio,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }
    public function Registrar(Contrato $data)
	{
		try 
		{
		
        $sql = "INSERT INTO contratos (idCliente,idServicio,listDispositivos,Estatus,NombreCliente,NombreServicio,CostoServicio,FechaInicioServicio,FechaCorteServicio) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                
		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->idCliente,
                    $data->idServicio, 
                    $data->listDispositivos, 
                    $data->Estatus,
                    $data->NombreCliente,
                    $data->NombreServicio,
                    $data->CostoServicio,
                    $data->FechaInicioServicio,
                    $data->FechaCorteServico
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>