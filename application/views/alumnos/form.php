<div class="container mt-4">

    <h3><?= isset($alumno) ? 'Editar Alumno' : 'Nuevo Alumno' ?></h3>

    <form method="post" action="<?= isset($alumno) ? base_url('alumnos/actualizar/'.$alumno->dni) : base_url('alumnos/guardar') ?>">

        <?php if (!isset($alumno)): ?>
        <div class="mb-3">
            <label class="form-label">DNI</label>
            <input type="number" name="dni" class="form-control" required>
        </div>
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" required
                   value="<?= isset($alumno) ? $alumno->apellido : '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required
                   value="<?= isset($alumno) ? $alumno->nombre : '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control"
                   value="<?= isset($alumno) ? $alumno->direccion : '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control"
                   value="<?= isset($alumno) ? $alumno->email : '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Celular</label>
            <input type="text" name="cel" class="form-control"
                   value="<?= isset($alumno) ? $alumno->cel : '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Contacto de Emergencia</label>
            <input type="text" name="emergencia" class="form-control"
                   value="<?= isset($alumno) ? $alumno->emergencia : '' ?>">
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="<?= base_url('alumnos') ?>" class="btn btn-secondary">Volver</a>

    </form>
</div>
