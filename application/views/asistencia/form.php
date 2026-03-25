<div class="container mt-4">

    <h3><?= isset($asistencia) ? 'Editar Asistencia' : 'Nueva Asistencia' ?></h3>

    <form method="post" action="<?= isset($asistencia) ? base_url('asistencia/actualizar/'.$asistencia->id) : base_url('asistencia/guardar') ?>">

        <div class="mb-3">
            <label class="form-label">Alumno</label>
          	<select name="dni" id="dni" class="form-control" required>
                <option value="">Seleccione...</option>
                <?php foreach ($alumnos as $al): ?>
                    <option value="<?= $al->dni ?>"
                        <?= isset($asistencia) && $asistencia->dni == $al->dni ? 'selected' : '' ?>>
                        <?= $al->apellido . ', ' . $al->nombre ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Actividad</label>
 <select name="id_actividad" id="id_actividad" class="form-control" required>
    <option value="">Seleccione...</option>
</select>

        </div>

        <div class="mb-3">
            <label class="form-label">Fecha</label>
         <input type="date" name="fecha" id="fecha" class="form-control" 
                   value="<?= isset($asistencia) ? $asistencia->fecha : date('Y-m-d') ?>" required>
        </div>
		
		
	



        <button class="btn btn-success">Guardar</button>
        <a href="<?= base_url('asistencia') ?>" class="btn btn-secondary">Volver</a>

    </form>
</div>
<script>
function cargarActividades() {
    let dni = document.getElementById('dni').value;
    let fecha = document.getElementById('fecha').value;

    if (dni === "" || fecha === "") return;

    fetch("<?= base_url('asistencia/actividades_por_pago') ?>", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "dni=" + dni + "&fecha=" + fecha
    })
    .then(response => response.json())
    .then(data => {
        let combo = document.getElementById('id_actividad');
        combo.innerHTML = "<option value=''>Seleccione...</option>";

        data.forEach(act => {
            combo.innerHTML += `<option value="${act.id}">${act.nombre}</option>`;
        });
    });
}

// Cuando cambia el alumno o la fecha, recargar actividades
document.getElementById('dni').addEventListener('change', cargarActividades);
document.getElementById('fecha').addEventListener('change', cargarActividades);
</script>
