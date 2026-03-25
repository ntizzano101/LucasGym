<div class="container mt-4">

    <h3><?= isset($actividad) ? 'Editar Actividad' : 'Nueva Actividad' ?></h3>

    <form method="post" action="<?= isset($actividad) ? base_url('actividades/actualizar/'.$actividad->id) : base_url('actividades/guardar') ?>">

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required
                   value="<?= isset($actividad) ? $actividad->nombre : '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Habilitada</label>
            <select name="habilitada" class="form-control">
                <option value="1" <?= isset($actividad) && $actividad->habilitada == 1 ? 'selected' : '' ?>>Sí</option>
                <option value="0" <?= isset($actividad) && $actividad->habilitada == 0 ? 'selected' : '' ?>>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Importe</label>
            <input type="number" step="0.01" name="importe" class="form-control" required
                   value="<?= isset($actividad) ? $actividad->importe : '' ?>">
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="<?= base_url('actividades') ?>" class="btn btn-secondary">Volver</a>

    </form>
</div>
