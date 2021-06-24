<h1 class="page-header">Contratos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Contrato&a=Crud">Crear Contrato</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre  de cliente</th>
            <th>Descripcion de servicio</th>
            <th>Costo</th>
            <th style="width:120px;">Fecha de inicio</th>
            <th style="width:120px;">Fecha de corte</th>
            <th style="width:180px;">Dispositivos</th>
            <th style="width:180px;">Estatus</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->NombreCliente; ?></td>
            <td><?php echo $r->NombreServicio; ?></td>
            <td><?php echo $r->CostoServicio; ?></td>
            <td><?php echo $r->FechaInicioServicio; ?></td>
            <td><?php echo $r->FechaCorteServicio;  ?></td>
            <td><?php echo $r->ListaDispositivos; ?></td>
            <td><?php echo $r->Estatus == 1 ? 'Activo' : 'Inactivo'; ?></td>
            <td>
                <a href="?c=Contrato&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Contrato&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
