<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logueado')) redirect('login');
    }

    public function index() {
        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('usuarios/no_disponible');
        $this->load->view('templates/footer');
    }
}
