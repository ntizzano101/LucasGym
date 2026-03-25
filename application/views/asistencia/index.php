<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h3>Asistencias</h3>
        <a href="<?= base_url('asistencia/nuevo') ?>" class="btn btn-primary">Nueva Asistencia</a>
    </div>

<div class="card mb-3">
    <div class="card-body">

        <form method="get" class="row g-3">

            <div class="col-md-3">
                <label class="form-label">Fecha desde</label>
                <input type="date" name="desde" class="form-control"
                       value="<?= $desde ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Fecha hasta</label>
                <input type="date" name="hasta" class="form-control"
                       value="<?= $hasta ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control"
                       placeholder="Buscar por apellido"
                       value="<?= $apellido ?>">
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-primary w-100">Filtrar</button>
            </div>

        </form>

    </div>
</div>


    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Alumno</th>
                <th>Actividad</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($lista as $a): ?>
            <tr>
                <td><?= $a->id ?></td>
                <td><?= $a->apellido . ', ' . $a->nombre ?></td>
                <td><?= $a->actividad ?></td>
                <td><?= date("d/m/Y", strtotime($a->fecha)) ?></td>

                <td>
                    <a href="<?= base_url('asistencia/editar/'.$a->id) ?>" class="btn btn-warning btn-sm">Editar</a>

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
        title: "¿Eliminar asistencia?",
        text: "Esta acción no se puede deshacer",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?= base_url('asistencia/eliminar/') ?>" + id;
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
</script>
