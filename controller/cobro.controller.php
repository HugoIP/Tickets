<?php
require_once 'model/contrato.php';
require_once 'model/cliente.php';
require_once 'model/servicio.php';
class CobroController{
    
    private $model;
    private $clienteModel;
    private $servicioModel;
    private $contratoModel;

    public function __CONSTRUCT(){
        $this->model = new Contrato();
        $this->clienteModel = new Cliente();
        $this->servicioModel = new Servicio();
        $this->contratoModel = new Contrato();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/contrato/contrato.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
    
        $cli = new Cliente();
        $cli = $this->clienteModel;

        $ser = new Servicio();
        $ser = $this->servicioModel;

        $alm= new Contrato();
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/contrato/contrato-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $cli = new Cliente();
        $cliTemp = $this->clienteModel->Obtener($_REQUEST['idCliente']);
        $ser = new Servicio();
        $serTemp = $this->servicioModel->Obtener($_REQUEST['idServicio']);

        $alm = new Contrato();
        
        $alm->id = $_REQUEST['id'];
        $alm->idCliente = $cliTemp->id;
        $alm->idServicio = $serTemp->id;
        $alm->ListDispositivos =  trim($_REQUEST['ListDispositivos']);
        $alm->NombreCliente = ($cliTemp->Nombre.' '.$cliTemp->ApellidoP.' '.$cliTemp->ApellidoM);
        $alm->NombreServicio = $serTemp->Nombre;
        $alm->CostoServicio = $serTemp->Costo;;
        $alm->FechaInicioServicio = $_REQUEST['FechaInicioServicio'];
        $alm->FechaCorteServicio = $_REQUEST['FechaCorteServicio'];
        $alm->Modalidad = $_REQUEST['Modalidad'];
        $alm->Estatus = $_REQUEST['Estatus'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php?c=contrato');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        //veryfy link or depencys
        header('Location: index.php?c=contrato');
    }
}