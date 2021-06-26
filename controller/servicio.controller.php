<?php
require_once 'model/servicio.php';

class ServicioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Servicio();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/servicio/servicio.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Servicio();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/servicio/servicio-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Servicio();
        
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
        
        header('Location: index.php?c=servicio');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php?c=servicio');
    }
}