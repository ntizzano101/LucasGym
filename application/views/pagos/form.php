<div class="container mt-4">

    <h3><?= isset($pago) ? 'Editar Pago' : 'Nuevo Pago' ?></h3>

    <form method="post" action="<?= isset($pago) ? base_url('pagos/actualizar/'.$pago->id) : base_url('pagos/guardar') ?>">

        <div class="mb-3">
            <label class="form-label">Alumno</label>
            <select name="dni" class="form-control" required>
                <option value="">Seleccione...</option>
                <?php foreach ($alumnos as $a): ?>
                    <option value="<?= $a->dni ?>"
                        <?= isset($pago) && $pago->dni == $a->dni ? 'selected' : '' ?>>
                        <?= $a->apellido . ', ' . $a->nombre ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Actividad</label>
            <select name="id_actividad" id="id_actividad" class="form-control" required>
                <option value="">Seleccione...</option>
                <?php foreach ($actividades as $act): ?>
                    <option value="<?= $act->id ?>"
                        <?= isset($pago) && $pago->id_actividad == $act->id ? 'selected' : '' ?>>
                        <?= $act->nombre ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" required
                   value="<?= isset($pago) ? $pago->fecha : date('Y-m-d') ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Importe</label>
			<input type="number" step="0.01" name="importe" id="importe" class="form-control" required
                   value="<?= isset($pago) ? $pago->importe : '' ?>">
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="<?= base_url('pagos') ?>" class="btn btn-secondary">Volver</a>

    </form>
</div>
<script>
document.getElementById('id_actividad').addEventListener('change', function() {

    let id = this.value;

    if (id === "") return;

    fetch("<?= base_url('pagos/obtener_importe/') ?>" + id)
        .then(response => response.json())
        .then(data => {
            if (data && data.importe) {
                document.getElementById('importe').value = data.importe;
            }
        });
});
</script>
