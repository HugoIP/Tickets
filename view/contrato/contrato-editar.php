<h1 class="page-header">
    <?php echo $alm->id != null ? "Editar" : 'Nuevo Contrato'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Contrato">Contratos</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->NombreCliente."  ".$alm->NombreServicio : 'Nuevo Contrato'; ?></li>
</ol>

<form id="frm-contrato" action="?c=Contrato&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Cliente</label>
        <select name="idCliente" class="form-control">
        <?php foreach($cli->ListarClientes() as $r): ?>
            <?php 
            $isSelected=($alm->idCliente == $r->id ? 'selected' : '');
            $fullName=''.$r->Nombre.' '.$r->ApellidoP.' '.$r->ApellidoM;
            ?>
            <option <?php echo($isSelected); ?> value="<?php echo ($r->id); ?>"><?php echo ($fullName); ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Descripcion del servicio</label>
        <select name="idServicio" class="form-control">
        <?php foreach($ser->ListarServicios() as $r): ?>
            <?php 
            $isSelectedServ=($alm->idServicio == $r->id ? 'selected' : '');
            $fullServ=''.$r->Nombre.' $'.$r->Costo;
            ?>
           <option <?php echo($isSelectedServ); ?> value="<?php echo ($r->id); ?>"><?php echo ($fullServ); ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Lista de dispositivos</label>
        <textarea name="ListDispositivos" rows="3" cols="50">00:00:00:00:00:00, 255.255.255.255, 1.1.1.1, MARCA</textarea>
    </div>
    <div class="form-group">
        <label>Fecha de inicio</label>
        <input type="text" name="FechaInicioServicio" value="<?php echo $alm->FechaInicioServicio; ?>" class="form-control datepicker" data-validacion-tipo="requerido" />
    </div>
    <div class="form-group">
        <label>Fecha de corte</label>
        <input type="text" name="FechaCorteServicio" value="<?php echo $alm->FechaCorteServicio; ?>" class="form-control datepicker" data-validacion-tipo="requerido" />
    </div>
    <div class="form-group">
        <label>Modalidad</label>
        <select name="Modalidad" class="form-control">
            <option <?php echo $alm->Modalidad == 0 ? 'selected' : ''; ?> value="0">No definido</option>
            <option <?php echo $alm->Modalidad == 1 ? 'selected' : ''; ?> value="1">Postpago</option>
            <option <?php echo $alm->Modalidad == 2 ? 'selected' : ''; ?> value="2">Prepago</option>
        </select>
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