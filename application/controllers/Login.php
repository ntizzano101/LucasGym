<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->view('login');
    }

   public function ingresar() {

    // Destruir cualquier sesión previa
    $this->session->sess_destroy();
    session_start(); // reiniciar sesión limpia

    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));

    $this->load->model('Usuario_model');
    $user = $this->Usuario_model->login($username, $password);

    if ($user) {
        $this->session->set_userdata([
            'id' => $user->id,
            'nombre' => $user->nombre,
            'apellido' => $user->apellido,
            'categoria' => $user->categoria,
            'logueado' => TRUE
        ]);
        redirect('dashboard');
    } else {
        $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos');
        redirect('login');
    }
}

    public function salir() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
