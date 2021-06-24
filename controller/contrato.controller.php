<?php
require_once 'model/contrato.php';
require_once 'model/cliente.php';
require_once 'model/servicio.php';
class ContratoController{
    
    private $model;
    private $clienteModel;
    private $servicioModel;

    public function __CONSTRUCT(){
        $this->model = new Contrato();
        $this->clienteModel = new Cliente();
        $this->servicioModel = new Servicio();
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
        $alm = new Contrato();
        
        $alm->id = $_REQUEST['id'];
        $alm->Nombre = $_REQUEST['Nombre'];
        $alm->Descripcion = $_REQUEST['Descripcion'];
        $alm->Costo = $_REQUEST['Costo'];
        $alm->Periodo = $_REQUEST['Periodo'];
        $alm->UnidadPeriodo = $_REQUEST['UnidadPeriodo'];
        $alm->FechaAlta = $_REQUEST['FechaAlta'];
        $alm->FechaLimit = $_REQUEST['FechaLimit'];
        $alm->Estatus = $_REQUEST['Estatus'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}