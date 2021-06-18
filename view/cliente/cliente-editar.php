<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Cliente'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Cliente">Clientes</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Cliente'; ?></li>
</ol>

<form id="frm-cliente" action="?c=Cliente&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $alm->Nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Apellido Paterno</label>
        <input type="text" name="ApellidoP" value="<?php echo $alm->ApellidoP; ?>" class="form-control" placeholder="Ingrese su apellido paterno" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Apellido Materno</label>
        <input type="text" name="ApellidoM" value="<?php echo $alm->ApellidoM; ?>" class="form-control" placeholder="Ingrese su apellido materno" data-validacion-tipo="requerido|min:10" />
    </div>
    <div class="form-group">
        <label>Telefono</label>
        <input type="text" name="Telefono" value="<?php echo $alm->Telefono; ?>" class="form-control" placeholder="Ingrese numero de contacto" data-validacion-tipo="requerido|min:10" />
    </div>
    <div class="form-group">
        <label>Estatus</label>
        <select name="Estatus" class="form-control">
            <option <?php echo $alm->Estatus == 1 ? 'selected' : ''; ?> value="1">Activo</option>
            <option <?php echo $alm->Estatus == 2 ? 'selected' : ''; ?> value="2">Inactivo</option>
        </select>
    </div>
    
    <div class="form-group">
        <label>Domicilio</label>
        <input type="text" name="Domicilio" value="<?php echo $alm->Domicilio; ?>" class="form-control" placeholder="Ingrese domicilio" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Fecha de alta</label>
        <input type="text" name="FechaAlta" value="<?php echo $alm->FechaAlta; ?>" class="form-control datepicker" data-validacion-tipo="requerido" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>