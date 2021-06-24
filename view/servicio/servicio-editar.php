<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Servicio'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Servicio">Servicios</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Servicio'; ?></li>
</ol>

<form id="frm-servicio" action="?c=Servicio&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $alm->Nombre; ?>" class="form-control" placeholder="Ingrese nombre" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Descripcion del servicio</label>
        <input type="text" name="Descripcion" value="<?php echo $alm->Descripcion; ?>" class="form-control" placeholder="Ingrese descripcion del servicio" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Costo del servicio</label>
        <input type="text" name="Costo" value="<?php echo $alm->Costo; ?>" class="form-control" placeholder="Ingrese costo del servicio" data-validacion-tipo="requerido" />
    </div>
    <div class="form-group">
        <label>Periodo</label>
        <input type="number" name="Periodo" value="<?php echo $alm->Periodo; ?>" class="form-control" placeholder="Ingrese numero de unidades" />
    </div>
    <div class="form-group">
        <label>Unidad  periodo</label>
        <select name="UnidadPeriodo" class="form-control">
            <option <?php echo $alm->UnidadPeriodo == 1 ? 'selected' : ''; ?> value="1">dias</option>
            <option <?php echo $alm->UnidadPeriodo == 2 ? 'selected' : ''; ?> value="2">meses</option>
        </select>
    </div>
    <div class="form-group">
        <label>Fecha de alta</label>
        <input type="text" name="FechaAlta" value="<?php echo $alm->FechaAlta; ?>" class="form-control datepicker" data-validacion-tipo="requerido" />
    </div>
    <div class="form-group">
        <label>Limite de garantia</label>
        <input type="text" name="FechaLimit" value="<?php echo $alm->FechaLimit; ?>" class="form-control datepicker" data-validacion-tipo="requerido" />
    </div>
    <div class="form-group">
        <label>Estatus</label>
        <select name="Estatus" class="form-control">
            <option <?php echo $alm->Estatus == 1 ? 'selected' : ''; ?> value="1">Activo</option>
            <option <?php echo $alm->Estatus == 2 ? 'selected' : ''; ?> value="2">Inactivo</option>
        </select>
    </div>
 
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-servicio").submit(function(){
            return $(this).validate();
        });
    })
</script>