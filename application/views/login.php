<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap.min.css') ?>">
    <script src="<?= base_url('assets/vendor/sweetalert.min.js') ?>"></script>
	
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header text-center">
                <h4>Ingreso al Sistema</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('login/ingresar') ?>">
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label>Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-primary w-100 mt-3">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if ($this->session->flashdata('error')): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Error',
    text: '<?= $this->session->flashdata('error') ?>'
});
</script>
<?php endif; ?>

</body>
</html>
