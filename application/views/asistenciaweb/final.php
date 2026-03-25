<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
    .card {
        border-radius: 15px;
    }
    .btn {
        border-radius: 10px;
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">

    <div class="card shadow-lg border-0 p-4 text-center" style="max-width: 420px; width: 100%;">

        <?php if ($tipo == "success"): ?>
            <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
        <?php else: ?>
            <i class="bi bi-x-circle-fill text-danger" style="font-size: 4rem;"></i>
        <?php endif; ?>

        <h3 class="fw-bold mt-3">
            <?= ($tipo == "success") ? "¡Listo!" : "Atención" ?>
        </h3>

        <p class="text-muted fs-5"><?= $mensaje ?></p>

        <a href="<?= base_url('asistenciaweb') ?>" class="btn btn-primary btn-lg w-100 mt-3">
            Volver al inicio
            <i class="bi bi-arrow-repeat ms-2"></i>
        </a>

    </div>

</div>
