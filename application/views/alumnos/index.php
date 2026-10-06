<div class="container mt-4">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h3>Alumnos</h3>
        <a href="<?= base_url('alumnos/nuevo') ?>" class="btn btn-primary">Nuevo Alumno</a>
    </div>
<form method="get" action="<?= base_url('alumnos') ?>" class="mb-3">

    <div class="input-group" style="max-width: 400px;">
        <input 
            type="text" 
            name="apellido" 
            class="form-control" 
            placeholder="Buscar por apellido..." 
            value="<?= isset($apellido) ? $apellido : '' ?>"
        >
        <button class="btn btn-primary">
            Buscar
        </button>
    </div>

</form>

    <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>DNI</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Emergencia</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($lista as $a): ?>
            <tr>
                <td><?= $a->dni ?></td>
                <td><?= $a->apellido ?></td>
                <td><?= $a->nombre ?></td>
                <td><?= $a->direccion ?></td>
                <td><?= $a->email ?></td>
                <td><?= $a->cel ?></td>
                <td><?= $a->emergencia ?></td>

                <td>
                    <a href="<?= base_url('alumnos/editar/'.$a->dni) ?>" class="btn btn-warning btn-sm mb-1">Editar</a>

                    <button class="btn btn-danger btn-sm mb-1" onclick="eliminar(<?= $a->dni ?>)">Eliminar</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>

<script>
function eliminar(dni) {
    Swal.fire({
        title: "¿Eliminar alumno?",
        text: "Esta acción no se puede deshacer",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?= base_url('alumnos/eliminar/') ?>" + dni;
        }
    });
}

<?php if ($this->session->flashdata('ok')): ?>
Swal.fire({
    icon: 'success',
    title: 'Éxito',
    text: '<?= $this->session->flashdata('ok') ?>'
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
