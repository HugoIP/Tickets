<h1 class="page-header">Servicios</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Servicio&a=Crud">Agregar Servicio</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th>Descripcion</th>
            <th>Costo</th>
            <th style="width:120px;">Periodo</th>
            <th style="width:120px;">UnidadPeriodo</th>
            <th style="width:180px;">Fecha de alta</th>
            <th style="width:180px;">Garantia</th>
            <th style="width:180px;">Estatus</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Descripcion; ?></td>
            <td><?php echo $r->Costo; ?></td>
            <td><?php echo $r->Periodo; ?></td>
            <td><?php echo $r->UnidadPeriodo == 1 ? 'dia' : 'mes';  ?></td>
            <td><?php echo $r->FechaAlta; ?></td>
            <td><?php echo $r->FechaLimit; ?></td>
            <td><?php echo $r->Estatus == 1 ? 'Activo' : 'Inactivo'; ?></td>
            <td>
                <a href="?c=Servicio&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Servicio&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
