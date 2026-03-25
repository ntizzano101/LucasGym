<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= base_url('dashboard') ?>">Gimnasio</a>

  <div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item"><a class="nav-link" href="<?= base_url('actividades') ?>">Actividades</a></li>
      <li class="nav-item"><a class="nav-link" href="<?= base_url('alumnos') ?>">Alumnos</a></li>
      <li class="nav-item"><a class="nav-link" href="<?= base_url('asistencia') ?>">Asistencia</a></li>
      <li class="nav-item"><a class="nav-link" href="<?= base_url('pagos') ?>">Pagos</a></li>
      <li class="nav-item"><a class="nav-link" href="<?= base_url('usuarios') ?>">Usuarios</a></li>

    </ul>

    <span class="navbar-text text-white me-3">
        <?= $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido') ?>
    </span>

    <a href="<?= base_url('login/salir') ?>" class="btn btn-danger btn-sm">Salir</a>
  </div>
</nav>
