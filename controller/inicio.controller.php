<?php
require_once 'model/inicio.php';

class InicioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Inicio();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/inicio/inicio.php';
        require_once 'view/footer.php';
    }
    /*
    public function Crud(){
        $alm = new Cliente();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/inicio/inicio-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Inicio();
        
        $alm->id = $_REQUEST['id'];
        $alm->Nombre = $_REQUEST['Nombre'];
        $alm->ApellidoP = $_REQUEST['ApellidoP'];
        $alm->ApellidoM = $_REQUEST['ApellidoM'];
        $alm->Telefono = $_REQUEST['Telefono'];
        $alm->Estatus = $_REQUEST['Estatus'];
        $alm->Domicilio = $_REQUEST['Domicilio'];
        $alm->FechaAlta = $_REQUEST['FechaAlta'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
    */
}