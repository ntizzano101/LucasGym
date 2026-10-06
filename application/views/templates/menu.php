<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <div class="container-fluid">
  <a class="navbar-brand" href="<?= base_url('dashboard') ?>">Gimnasio</a>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal"
          aria-controls="menuPrincipal" aria-expanded="false" aria-label="Abrir menú">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="menuPrincipal">
    <ul class="navbar-nav me-auto">

      <li class="nav-item"><a class="nav-link" href="<?= base_url('actividades') ?>">Actividades</a></li>
      <li class="nav-item"><a class="nav-link" href="<?= base_url('alumnos') ?>">Alumnos</a></li>
      <li class="nav-item"><a class="nav-link" href="<?= base_url('asistencia') ?>">Asistencia</a></li>
      <li class="nav-item"><a class="nav-link" href="<?= base_url('pagos') ?>">Pagos</a></li>
      <li class="nav-item"><a class="nav-link" href="<?= base_url('usuarios') ?>">Usuarios</a></li>

    </ul>

    <span class="navbar-text text-white me-3 d-block my-2 my-lg-0">
        <?= $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido') ?>
    </span>

    <a href="<?= base_url('login/salir') ?>" class="btn btn-danger btn-sm mb-2 mb-lg-0">Salir</a>
  </div>
 </div>
</nav>
