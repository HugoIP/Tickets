<h1 class="page-header">Clientes</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Cliente&a=Crud">Nuevo Cliente</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th>Apellido P</th>
            <th>Apellido M</th>
            <th style="width:120px;">Telefono</th>
            <th style="width:120px;">Estatus</th>
            <th style="width:180px;">Domicilio</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->ApellidoP; ?></td>
            <td><?php echo $r->ApellidoM; ?></td>
            <td><?php echo $r->Telefono; ?></td>
            <td><?php echo $r->Estatus == 1 ? 'Activo' : 'Inactivo'; ?></td>
            <td><?php echo $r->Domicilio; ?></td>
            <td>
                <a href="?c=Cliente&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Cliente&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
