<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">

    <div class="card shadow-lg border-0 p-4" style="max-width: 420px; width: 100%;">

        <div class="text-center mb-4">
            <i class="bi bi-list-check text-success" style="font-size: 3rem;"></i>
            <h3 class="fw-bold mt-2">Seleccionar Actividad</h3>
            <p class="text-muted">Elegí la actividad que vas a realizar</p>
        </div>

        <?php if (empty($actividades)): ?>
            <script>
            Swal.fire("Sin actividades", "No tenés actividades pagas este mes.", "info");
            </script>
        <?php endif; ?>

        <form method="post" action="<?= base_url('asistenciaweb/registrar') ?>">

            <input type="hidden" name="dni" value="<?= $dni ?>">

            <label class="form-label fw-semibold">Actividad</label>
            <div class="input-group input-group-lg mb-3">
                <span class="input-group-text bg-success text-white">
                    <i class="bi bi-bicycle"></i>
                </span>
                <select name="id_actividad" class="form-select" required>
                    <option value="">Seleccione...</option>
                    <?php foreach ($actividades as $a): ?>
                        <option value="<?= $a->id ?>"><?= $a->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button class="btn btn-success btn-lg w-100">
                Registrar Asistencia
                <i class="bi bi-check-circle ms-2"></i>
            </button>

        </form>

    </div>

</div>
