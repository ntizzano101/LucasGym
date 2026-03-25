<div class="container mt-4">

    <!-- SECCIÓN 1: Presentes últimas 2 horas -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Alumnos presentes (últimas 2 horas)
        </div>
        <div class="card-body">

            <?php if (empty($presentes)): ?>
                <p class="text-muted">No hay alumnos presentes en las últimas 2 horas.</p>
            <?php else: ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Fecha y hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($presentes as $p): ?>
                        <tr>
                            <td><?= $p->nombre . ' ' . $p->apellido ?></td>
                           <td><?= date("d/m/Y H:i", strtotime($p->fecha)) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </div>
    </div>

    <!-- SECCIÓN 2: Pagos últimos 10 días -->
    <div class="card">
        <div class="card-header bg-success text-white">
            Total cobrado últimos 10 días
        </div>
        <div class="card-body">

            <?php if (empty($pagos)): ?>
                <p class="text-muted">No hay pagos registrados en los últimos 10 días.</p>
            <?php else: ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Día</th>
                            <th>Total cobrado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pagos as $p): ?>
                        <tr>
                            <td><?= date("d/m/Y", strtotime($p->dia)) ?></td>
                            <td>$ <?= number_format($p->total, 2, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </div>
    </div>

</div>
