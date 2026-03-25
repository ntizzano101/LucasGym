<div class="container mt-4">


    <div class="d-flex justify-content-between mb-3">
        <h3>Actividades</h3>
        <a href="<?= base_url('actividades/nuevo') ?>" class="btn btn-primary">Nueva Actividad</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Habilitada</th>
                <th>Importe</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($lista as $a): ?>
            <tr>
                <td><?= $a->id ?></td>
                <td><?= $a->nombre ?></td>
                <td><?= $a->habilitada ? 'Sí' : 'No' ?></td>
                <td>$ <?= number_format($a->importe, 2) ?></td>
                <td>
                    <a href="<?= base_url('actividades/editar/'.$a->id) ?>" class="btn btn-warning btn-sm">Editar</a>

                    <button class="btn btn-danger btn-sm" onclick="eliminar(<?= $a->id ?>)">Eliminar</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function eliminar(id) {
    Swal.fire({
        title: "¿Eliminar actividad?",
        text: "Esta acción no se puede deshacer",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?= base_url('actividades/eliminar/') ?>" + id;
        }
    });
}

<?php $msg = $this->session->flashdata('ok'); ?>
<?php if ($msg): ?>

Swal.fire({
    icon: 'success',
    title: 'Éxito',
    text: '<?= $msg ?>'
});

<?php endif; ?>
<?php $msg = $this->session->flashdata('error'); ?>
<?php if ($msg): ?>
Swal.fire({
    icon: 'error',
    title: 'Error',
    text: '<?= $msg ?>'
});
<?php endif; ?>

</script>
