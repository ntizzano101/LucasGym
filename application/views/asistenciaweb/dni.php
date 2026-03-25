<style>
    .card {
        border-radius: 15px;
    }
    .input-group-text {
        border-radius: 10px 0 0 10px;
    }
    .form-control {
        border-radius: 0 10px 10px 0;
    }
    button.btn {
        border-radius: 10px;
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">

    <div class="card shadow-lg border-0 p-4" style="max-width: 420px; width: 100%;">

        <div class="text-center mb-4">
            <i class="bi bi-person-check-fill text-primary" style="font-size: 3rem;"></i>
            <h3 class="fw-bold mt-2">Registro de Asistencia</h3>
            <p class="text-muted">Ingresá tu DNI para continuar</p>
        </div>

        <?php if (isset($error)): ?>
        <script>
        Swal.fire("Error", "<?= $error ?>", "error");
        </script>
        <?php endif; ?>

        <form method="post" action="<?= base_url('asistenciaweb/actividades') ?>">

            <label class="form-label fw-semibold">DNI</label>
            <div class="input-group input-group-lg mb-3">
                <span class="input-group-text bg-primary text-white">
                    <i class="bi bi-credit-card-2-front"></i>
                </span>
                <input type="number" name="dni" class="form-control" placeholder="Ej: 12345678" required>
            </div>

            <button class="btn btn-primary btn-lg w-100">
                Continuar
                <i class="bi bi-arrow-right-circle ms-2"></i>
            </button>

        </form>

    </div>

</div>
